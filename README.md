ekbforum - форум на php
========

Установка
---------

# Сделайте данную папку _ekbforum_ корнем веб-сервера. Для этого
отредактируйте файл конфигурации Apache _httpd.conf_ и установите следующие значения:

```php
DocumentRoot "c:/путь_к_папке/forumproject/"

<Directory "c:/wamp/www/forumproject">
    Options Indexes FollowSymLinks
    AllowOverride all
    Require local
</Directory>
```

# Отредактируйте реквизиты подключения к MySQL в файле: _config/config.php_.
    Убедитесь, что указанная база существует.

# Обратитесь в браузере по адресу: _http://localhost/install/index.php_
    Данный скрипт создаст в базе данных нужные таблицы с тестовыми данными.

# Перейдите в корень сайта: _http://localhost/index.php_

