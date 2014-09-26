<h1 class="page__h1">Темы форума</h1>
<ul class="themes-list">
    <?php foreach($vars['themes'] as $theme): ?>
        <li class="themes-list__item">
            <a class="themes-list__title" href="<?= url('theme', 'view', $theme['id']) ?>"><?= $theme['title'] ?></a>
            <span class="themes-list__author"><?= $theme['name'] ?></span>
            <i title="Комментариев" class="themes-list__icon-comment"> </i>
            <?= $theme['comments_num'] ?>
            <?php if ($theme['last_comment_created_at']): ?>
                <span class="themes-list__comment-info">, последний: <?= date("d.m.Y в H:i", strtotime($theme['last_comment_created_at'])) ?>
                от <?= $theme['last_comment_name'] ?>
                </span>
            <?php endif; ?>
        </li>
    <?php endforeach ?>
</ul>
<?= loadTemplate('site', 'pagination_block.php', $vars) ?>

<?= loadTemplate('theme', 'form_add_theme.php', $vars) ?>