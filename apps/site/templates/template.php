<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $vars['title'] ?></title>
    <link rel="stylesheet" href="/css/styles.css"/>
</head>
<body class="page">
<header class="page__header">
    <div class="header">
        <div class="header__h">Форум Екатеринбурга</div>
        <div class="header__teaser">Спрашивайте и участвуйте в обсуждениях.</div>
        <ul class="menu">
            <li class="menu__item menu__link_active">
                <a class="menu__link" href="/" title="Главная страница">Главная</a>
            </li>
            <li class="menu__item">
                <a class="menu__link" href="/" title="Сообщения">Сообщения</a>
            </li>
        </ul>
    </div>
</header>
<?= $vars['content'] ?>
<footer>
    &copy 2014 Все права защищены.
</footer>
</body>
</html>