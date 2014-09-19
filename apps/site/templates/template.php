<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $vars['title'] ?></title>
    <link rel="stylesheet" href="/css/styles.css"/>
</head>
<body>
<header class="header">
    <div class="header__h">Это заголовок сайта</div>
    <nav>
        <ul>
            <li>
                <a href="/" title="Главная страница">Главная</a>
            </li>
        </ul>
    </nav>
</header>
<h2></h2>
<?= $vars['content'] ?>
<footer>
    &copy 2014 Все права защищены.
</footer>
</body>
</html>