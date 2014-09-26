1. Сделайте данную папку корнем веб-сервера, 
отредактировав файл конфигурации Apache httpd.conf.
Установите следующие значения:

DocumentRoot "c:/путь_к_папке/forumproject/"

<Directory "c:/wamp/www/forumproject">
    Options Indexes FollowSymLinks
    AllowOverride all
    Require local
</Directory>

2. Отредактируйте реквизиты подключения к MySQL в файле: config/config.php.
    Убедитесь, что указанная база существует.

3. Обратитесь в браузере по адресу: http://localhost/install/index.php
    Данный скрипт создаст в базе данных нужные таблицы с тестовыми данными.
    
4. Перейдите в корень сайта: http://localhost/index.php


