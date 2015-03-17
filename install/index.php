<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Установка форума</title>
</head>
<body>

<h1>Установка</h1>
<ul>
    <li>
        <p>Проверьте, установлен ли на сервере модуль mod_rewrite: 
          <a title="Установлен ли mod_rewrite?" target="_blank" href="/install/check_mod_rewrite.php">
           проверить
          </a>
        </p>
    </li>
    <li>
        <p>Проверьте, установлен ли драйвер PDO для MySQL: 
          <a title="Установлен ли PDO для MySQL" target="_blank" href="/install/check_mysql_pdo.php">
           проверить
          </a>
        </p>
    </li>
    <li>
        <p>Создайте в mysql базу данных, к примеру <i>forum</i></p>
    </li>
    <li>
        <p>В файле <i>config/config.php</i> укажите реквизиты подключения к MySQL: хост, логин, пароль, имя базы данных.</p>
    </li>
    <li>
        <p>
            В целях безопасности удалите с сервера папку <i>install</i>.
        </p>
    </li>
</ul>
<p>Теперь можно:</p>
<ul>
  <li>
    <p>
      <a title="Заполнить тестовыми данными" target="_blank" href="/install/seed.php">
      Заполнить форум тестовыми данными</a>
    </p>
  </li>    
  <li>
    <p><a title="Перейти на форум" target="_blank" href="/">Перейти на форум</a></p>
  </li>    
</ul>

</body>
</html>
