<ul>
    <?php foreach($vars['themes'] as $theme): ?>
        <li><?= $theme['name'] ?> -
            <a href="<?= url('theme', 'view', $theme['id']) ?>">
                <?= $theme['title'] ?>
            </a> [комментариев: <?= $theme['comments_num'] ?>
            <?php if ($theme['last_comment_created_at']): ?>
                , последний: <?= date("d.m.Y в H:i", strtotime($theme['last_comment_created_at'])) ?>
                от <?= $theme['last_comment_name'] ?>
            <?php endif; ?>
            ]
        </li>
    <?php endforeach ?>
</ul>
<?= loadTemplate('site', 'pagination_block.php', $vars) ?>

<?= loadTemplate('theme', 'form_add_theme.php', $vars) ?>