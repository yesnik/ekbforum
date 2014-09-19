<ul>
    <?php foreach($vars['themes'] as $theme): ?>
        <li><?= $theme['author_id'] ?> - <?= $theme['title'] ?> [комментариев: <?= $theme['comments_num'] ?>]</li>
    <?php endforeach ?>
</ul>