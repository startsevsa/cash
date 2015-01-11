<?php
class LangRu extends iLang { 
  //name,rate,sign,short_name
  public $currency = array(
    1 => array("Рубль", 1, "ք", "руб."),
    2 => array("Доллар", 55, "$", "дол."),
    3 => array("Евро", 65, "€", "евр."),
  );
  
  public $translate = array (
    //login
    1 => "Вход в бухгалтерию",
    2 => "Войти",
    3 => "Пароль",
    4 => "Пожалуйста подождите...",
    5 => "Вход в систему выполняется",
    6 => "Имя",
    7 => "База",
    //tabs
    8 => "Выйти",
    9 => "Загрузка настроек...",
    10 => "Настройки",
    11 => "Загрузка планов...",
    12 => "Планирование",
    13 => "Загрузка аналитики...",
    14 => "Аналитика",
    //script
    15 => "Ошибка",
    //list
    16 => "ID товара",
    17 => "Товар",
    18 => "ID группы",
    19 => "Группа",
    20 => "Цена",
    21 => "Кол-во",
    22 => "Сумма",
    23 => "Дата",
    24 => "Дата изменения",
    25 => "ID магазина",
    26 => "Магазин",
    27 => "Тип",
    28 => "Файл",
    29 => "ID пользователя",
    30 => "Пользователь",
    31 => "Курс",
    32 => "Знак валюты",
    33 => "Тип валюты",
    34 => "Кошелек",
    35 => "Примечание",
    36 => "Редактировать запись",
    37 => "Удалить запись",
    38 => "Фильтр",
    39 => "Загрузка списка операций...",
    40 => "Удаление операции",
    41 => "Удалить операцию?",
    42 => "Удаляю операцию...",
    43 => "Период",
    44 => "по",
    45 => "Загрузка фильтра",
    46 => "Расширенный поиск",
    47 => "Распознать чек",
    48 => "Выполняется распознание чека",
    49 => "Добавить",
    50 => "Добавить операцию",
    51 => "Операции",
    //add
    52 => "Загрузка параметров номенклатуры...",
    53 => "Количество",
    54 => "Расход",
    55 => "Приход",
    56 => "Тип операции",
    57 => "Прикрепить...",
    58 => "Сохранить",
    59 => "Сохранить и закрыть",
    60 => "Добавить и продолжить",
    61 => "Отмена",
    62 => "Закрыть без сохранения",
    63 => "Добавление операции...",
    64 => "Сохранение операции...",
    65 => "Добавление операции",
    66 => "Редактирование операции",
    67 => "Загрузка формы...",
    //filter
    68 => "Не равно",
    69 => "Удаленные",
    70 => "Обновить",
    71 => "Перегрузить список с новыми параметрами",
    72 => "Очистить",
    73 => "Очистить расширенный фильтр",
    //check
    74 => "Валюта",
    75 => "Выполняется сохранение чека",
    76 => "Добавление чека",
    //plans
    77 => "Планы расхода по группам в месяц",
    78 => "План",
    79 => "Сохранить запись",
    80 => "Загрузка планов...",
    81 => "Факт",
    82 => "Месяц",
    83 => "Цели",
    84 => "ID базы",
    //analiz
    85 => "Общий",
    86 => "Загрузка общей статистики...",
    87 => "Баланс",
    88 => "Загрузка баланса...",
    89 => "Группы",
    90 => "Загрузка статистики по группам...",
    91 => "Динамика групп",
    92 => "Загрузка статистики по динамике групп...",
    93 => "Организации",
    94 => "Загрузка статистики по организациям...",
    95 => "Динамика",
    96 => "Загрузка динамики по месяцам...",
    97 => "Кошельки",
    98 => "Загрузка статистики по кошелькам...",
    99 => "Накопления",
    100 => "Загрузка накоплений...",
    101 => "Валюты",
    102 => "Загрузка статистики по валютам...",
    103 => "Безопасность",
    104 => "Загрузка статистики по финансовой безопасности...",
    //settings
    105 => "Имя БД",
    106 => "Введи имя базы данных",
    107 => "Список баз данных",
    108 => "Удалить БД{0}?",
    109 => "Список пользователей базы '{0}' и их права",
    110 => "Загрузка списка баз...",
    111 => "Чтение",
    112 => "Запись",
    113 => "Последний вход",
    114 => "Загрузка списка пользователей...",
    115 => "Список пользователей базы данных и их права",
    //analiz: reports
    116 => "Общий анализ расхода и прихода",
    117 => "Анализ по валютам (суммы в основной валюте)",
    118 => "По приходу",
    119 => "Баланс расхода и прихода",
    120 => "Приход от ",
    121 => "Расход от ",
    122 => "Баланс от ",
    123 => "Анализ по группам товара",
    124 => "Анализ по группам товара в разрезе месяцев",
    125 => "Месяца",
    126 => "Помесячная динамика",
    127 => "Анализ расхода по организациям",
    128 => "Любая",
    129 => "Анализ по кошелькам",
    130 => "Финансовая безопасность",
    131 => "Баланс на начало",
    132 => "Средний месячный приход",
    133 => "% с остатка в год",
    134 => "% роста в год",
    135 => "Средний месячный расход",
    136 => "Накопления",
    137 => "Цель",
    //refbooks
    138 => "Настройка",
    139 => "Описание",
    140 => "Значение",
    141 => "Курс к основной",
    142 => "Краткое имя",
    143 => "Родительская группа",
    144 => "Город",
    145 => "Родительский магазин",
    146 => "Родительский кошелек",
    147 => "Скачать базу данных",
    148 => "В формате Sqlite 3",
    149 => "Оптимизировать БД",
    150 => "Удалить дубли записей в справочниках, пересобрать статистику индексов, дефрагментировать сегменты.",
    151 => "Обработка прошла успешно!",
    152 => "Статус",
    153 => "Группы товара",
    154 => "Валюты",
    155 => "Магазины",
    156 => "Кошельки",
    157 => "Товары",
    158 => "Справочники",
    //php
    159 => "Ошибка доступа",
    160 => "Нет данных",
    162 => "Добавление файлов в режиме демостенда отключено",
    163 => "Заполните дату",
    164 => "Ошибка добавления товара",
    165 => "Ошибка добавления группы товара",
    166 => "Заполните цену",
    167 => "Ошибка добавления валюты",
    168 => "Ошибка добавления кошелька",
    169 => "Заполните количество",
    170 => "Ошибка добавления организации",
    171 => "Неверный тип операции",
    172 => "Ошибка обновления операции",
    173 => "Ошибка в строке",
    174 => "Ошибка добавления операции",
    175 => "Ошибка авторизации",  
    176 => "Нельзя удалять основную БД",
    177 => "Невозможно удалить БД. Активных записей ",
    178 => "Невозможно удалить БД. Активных пользователей ",
    179 => "Укажите БД",
    180 => "Укажите Логин",
    181 => "Укажите Пароль",
    182 => "Редактирование системных записей в режиме демостенда отключено",
    183 => "Нельзя отбирать права настроек у главного администратора",
    184 => "Удаление системных записей в режиме демостенда отключено",
    185 => "Нельзя удалять главного администратора",
    186 => "Невозможно удалить Пользователя. Активных записей ",
    187 => "Редактирование отключено в режиме демостенда",
    188 => "Несуществующий справочник!",
    189 => "Укажите группу",
    190 => "Укажите План",
    191 => "Достигнуто",
    192 => "Осталось",
    193 => "Дублировать запись",
    194 => "Извините, распознание чеков отключено в режиме демо стенда!",
    195 => "Разрешены чеки в форматах: ",
    196 => "Невозможно создать временную директорию.",
    197 => "Ошибка загрузки файла",
    198 => "Ошибка распознания чека: ",
    199 => "Мобильная версия",
    200 => "Орг.",
    201 => "Нет записей",
    202 => "Любой",
    //setup
    203 => "Основная база",
    204 => "Наличные",
    205 => "Карточный счет",
    206 => "Электронные деньги",
    207 => "Имя бухгалтерии",
    208 => "Домашняя бухгалтерия",
    209 => "Почта для уведомлений",
    210 => "Еда",
    211 => "Хозтовары",
    212 => "Прочее",
    213 => "Установка...",
    214 => "Задайте пароль",
    215 => "Установить",
    216 => "Выполняется установка и настройка. Пожалуйста подождите...",
    217 => "Установка прошла успешно",
    218 => "Установка завершилась с ошибкой, обратитесь в поддержку https://github.com/pihel/cash/issues",
    //update
    219 => "Обновление...",
    220 => "Ручное изменение версии запрещено",
    221 => "Версия БД",
    222 => "Ошибка загрузки файла. Максимальный размер файла {0} Мбайт",
    223 => "Округлять цены до целых (1 - Да, 0 - Нет)",
    224 => "Выберите язык",
    225 => "Удалить",
    226 => "Ключ доступа к распознаванию чеков",
    227 => "Карта покупок"
  );

}
