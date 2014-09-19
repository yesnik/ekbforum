<h1>Тема: <?= $vars['theme']['title'] ?></h1>
<p>
    <?= $vars['theme']['content'] ?>
</p>

<h3>Комментарии</h3>

<?php if (!empty($vars['comments'])){ ?>
<ul>
    <?php foreach ($vars['comments'] as $comment): ?>
        <li><?= $comment['comment']; ?></li>
    <?php endforeach ?>
</ul>
<?php } else { ?>
    <p>Пока никто не оставил комментарий. Вы будете первым.</p>
<?php } ?>
