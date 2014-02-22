<?
class CashSett {
  private $db;
  private $usr;

  public function __construct($_db, $_usr) {
    $this->db = $_db;
    $this->usr = $_usr;
  }

  public function getDbs() {
    $this->db->escape_res = true;
    $sql = "SELECT id, name FROM db";
    return $this->db->select($sql);
  }

  public function getUsrs($db_id = 0 ) {
    if(!$this->usr->canSetting()) return array();
    $this->db->escape_res = true;
    $sql = "SELECT id, bd_id, login, '***' as pasw, `read` as s_read, `write` as s_write, analiz as s_analiz, setting as s_setting, oper_date FROM users WHERE bd_id = ?";
    return $this->db->select($sql, intval($db_id) );
  }

  public function getUsrNames($db_id = 0 ) {
    $this->db->escape_res = true;
    $sql = "SELECT id, login as name FROM users WHERE ( bd_id = ? OR 0 = ? )";
    return $this->db->select($sql, intval($db_id), intval($db_id) );
  }

  public function addDB($name) {
    if(!$this->usr->canSetting()) return "Ошибка доступа";
    $this->db->start_tran();
    $this->db->exec("INSERT INTO db(name) VALUES(?)", $name);
    $id = $this->db->last_id();
    $this->db->commit();
    return $id;
  }

  public function delDB($id) {
    if(!$this->usr->canSetting()) return "Ошибка доступа";
    if( intval($id) == 1 ) return "Нельзя удалять основную БД";

    $cnt = $this->db->element("SELECT COUNT(id) cnt from cashes WHERE bd_id = ? AND visible = 1", $id);
    if(intval($cnt) > 0) {
      return "Невозможно удалить БД. Активных записей ". $cnt;
    }
    $cnt = $this->db->element("SELECT COUNT(id) cnt from users WHERE bd_id = ?", $id);
    if(intval($cnt) > 0) {
      return "Невозможно удалить БД. Активных пользователей ". $cnt;
    }


    $this->db->start_tran();
    $this->db->exec("DELETE FROM db WHERE id = ?", $id);
    $id = $this->db->affect();
    $this->db->commit();
    return intval($id);
  }

  public function saveUsr($data) {    
    if(!$this->usr->canSetting()) return "Ошибка доступа";
    if(intval($data['bd_id']) < 1) return "Укажите БД";
    if(empty($data['login'])) return "Укажите Логин";
    if(empty($data['pasw'])) return "Укажите Пароль";

    $id = intval($data['id']);

    $this->db->start_tran();
    if($id == 0) {
      //insert

      $this->db->exec("INSERT INTO `users` (id, bd_id, login, pasw, `read`, `write`, analiz, setting, oper_date)
		      VALUES( NULL, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)", intval($data['bd_id']),
		      $data['login'], $this->usr->hash_pasw($data['pasw']), intval($data['s_read'] == "true"), intval($data['s_write'] == "true"), intval($data['s_analiz'] == "true"), intval($data['s_setting'] == "true"));
      $id = $this->db->last_id();
    } else {
      //update
      global $settings;
      if($settings['demo'] == 1 && ($id == 1 || $id == 2)) return "Редактирование системных записей в режиме демостенда отключено";
      
      if( intval($data['s_setting'] == "true") == 0 && $id == 1) {
        return "Нельзя отбирать права настроек у главного администратора";
      }
      if($data['pasw'] != "***") {
        $this->db->exec("UPDATE `users`
		      SET login = ?, pasw = ?, `read` = ?, `write` = ?, analiz = ?, setting = ?, oper_date = CURRENT_TIMESTAMP
		      WHERE id = ? ",
		      $data['login'], $this->usr->hash_pasw($data['pasw']), intval($data['s_read'] == "true"), intval($data['s_write'] == "true"), intval($data['s_analiz'] == "true"), intval($data['s_setting'] == "true"), $id);
      } else {
        $this->db->exec("UPDATE `users`
		      SET login = ?, `read` = ?, `write` = ?, analiz = ?, setting = ?, oper_date = CURRENT_TIMESTAMP
		      WHERE id = ? ",
		      $data['login'], intval($data['s_read'] == "true"), intval($data['s_write'] == "true"), intval($data['s_analiz'] == "true"), intval($data['s_setting'] == "true"), $id);
      }
      $id = intval( $this->db->affect() );
    }

    $this->db->commit();
    return $id;
  }

  public function delUsr($id) {
    global $settings;
    if($settings['demo'] == 1 && ($id == 1 || $id == 2)) return "Удаление системных записей в режиме демостенда отключено";
    
    if(!$this->usr->canSetting()) return "Ошибка доступа";
    if( intval($id) == 1 ) return "Нельзя удалять главного администратора";
    $cnt = $this->db->element("SELECT COUNT(id) cnt from cashes WHERE uid = ? AND visible = 1", $id);
    if(intval($cnt) > 0) {
      return "Невозможно удалить Пользователя. Активных записей ". $cnt;
    }

    $this->db->start_tran();
    $this->db->exec("DELETE FROM `users` WHERE id = ?", $id);
    $id = $this->db->affect();
    $this->db->commit();
    return intval($id);
  }
  
  public function setSetting($refb, $indx, $data) {
    global $settings;
    if($settings['demo'] == 1) return "Редактирование отключено в режиме демостенда";
    if(!$this->usr->canSetting()) return "Ошибка доступа";
    $refbs = array("cashes_group", "cashes_nom", "cashes_org", "cashes_setting", "cashes_type", "currency");
    if(!in_array($refb, $refbs)) return "Несуществующий справочник!";
    $col = "id";
    if($refb == "cashes_setting") {
      $col = "name";
    }
    
    $set = "";
    unset($data[$col]);//unset ID col
    foreach($data as $k=>$v) {
      if(!empty($set)) $set .= ", ";
      $set .= "`".$k."` = ?";
    }
    $data = array_values($data);//drop keys
    array_unshift($data, "");//array must start from 1 key index
    unset($data[0]);//unset 0 key index
    $data[] = $indx; //add ID - last value
    
    $this->db->start_tran();
    $this->db->exec("UPDATE `".$refb."` SET ".$set." WHERE ".$col." = ?", $data);
    $id = $this->db->affect();
    $this->db->commit();
    return intval($id);
  }
}
?>

