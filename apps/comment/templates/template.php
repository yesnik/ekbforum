<ul>
    <?php foreach($vars['comments'] as $comment): ?>
        <li><?= $comment['id'] ?>, theme_id: <?= $comment['theme_id'] ?>,
            создано: <?= $comment['created_at'] ?>,
            автор: <?= $comment['name'] ?>
        </li>
    <?php endforeach ?>
</ul>