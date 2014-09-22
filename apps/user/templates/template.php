<ul>
    <?php foreach($vars['themes'] as $theme): ?>

        <li><?= $theme['name'] ?> -
            <a href="<?= url('theme', 'view', $theme['id']) ?>"><?= $theme['title'] ?></a> [комментариев: <?= $theme['comments_num'] ?>]</li>
    <?php endforeach ?>
</ul>