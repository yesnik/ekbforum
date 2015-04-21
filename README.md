ekbforum - форум на php
========

Установка
---------

* Сделайте данную папку _ekbforum_ корнем веб-сервера.
Для этого добавьте в файл конфигурации Apache `conf/extra/httpd-vhosts.conf`:
```
Listen 7777
<VirtualHost *:7777>
    ServerAdmin admin@yoursite.ru
    DocumentRoot "C:/projects/forumproject"
    ErrorLog "logs/forumproject-error.log"
    CustomLog "logs/forumproject-access.log" common
</VirtualHost>
```
* Перезапустите сервер Apache, чтобы сделанные изменения вступили в силу.

* Сайт должен стать доступен по адресу: http://127.0.0.1:7777/

* Отредактируйте реквизиты подключения к _MySQL_ в файле: _config/config.php_. Убедитесь, что указанная там база существует.

* Обратитесь в браузере по адресу: _http://127.0.0.1:7777/install/index.php_. Данный скрипт создаст в базе данных нужные таблицы с тестовыми данными.

* Перейдите в корень сайта: _http://127.0.0.1:7777/_

Демо
----

[Демо-версия форума на php](http://ekbforum.96.lt)