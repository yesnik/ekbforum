<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $vars['title'] ?></title>
    <link rel="stylesheet" href="/css/styles.css"/>
    <script type="text/javascript" src="/js/jquery/jquery-1.11.1.min.js"></script>
    <?php
        foreach($vars['js'] as $scriptPath) {
            echo '<script type="text/javascript" src="' . $scriptPath . '"></script>';
        }
    ?>
</head>
<body class="page">
<div class="page__content">
    <header class="page__header">
        <div class="header">
            <a href="/" class="header__h">Форум Екатеринбурга</a>
            <div class="header__teaser">Спрашивайте и участвуйте в обсуждениях.</div>
            <ul class="menu">
                <li class="menu__item menu__link_active">
                    <a class="menu__link" href="/" title="Главная страница">Главная</a>
                </li>
            </ul>
        </div>
    </header>
    <?= $vars['content'] ?>
    <div class="hFooter"></div>
</div>
<footer class="page__footer">
    <div class="footer">
        &copy 2014 Все права защищены.
    </div>
</footer>
</body>
</html>