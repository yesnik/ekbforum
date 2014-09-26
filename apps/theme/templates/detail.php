<h1 class="page__h1">
    <span class="page__h1_author"><?= $vars['theme']['name'] ?></span>
    &laquo;<?= $vars['theme']['title'] ?>&raquo;
</h1>
<p>
    <?= $vars['theme']['content'] ?>
</p>

<h2 class="page__h2 page__h2_underline">Комментарии (<?= $vars['theme']['comments_num'] ?>)</h2>

<?php if (!empty($vars['comments'])) { ?>

    <?php  loadTemplate('comment', 'comments_block.php', $vars); ?>

    <?php  loadTemplate('site', 'pagination_block.php', $vars); ?>

<?php } else { ?>
    <p>Пока никто не оставил комментарий. Вы будете первым.</p>
<?php } ?>

<?php loadTemplate('comment', 'form_add_comment.php', $vars); ?>
