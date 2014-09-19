<h1>Тема: <?= $vars['theme']['title'] ?></h1>
<p>
    <?= $vars['theme']['content'] ?>
</p>

<h3>Комментарии</h3>

<ul>
<?php foreach ($vars['comments'] as $comment): ?>
    <li><?= $comment['comment']; ?></li>
<?php endforeach ?>
</ul>