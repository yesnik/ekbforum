<h1 class="page__h1">Тема: <?= $vars['theme']['title'] ?></h1>
<p>
    <?= $vars['theme']['content'] ?>
</p>

<h2 class="page__h2 page__h2_underline">Комментарии (<?= $vars['theme']['comments_num'] ?>)</h2>

<?php if (!empty($vars['comments'])){ ?>
<ul id="comments_holder" class="comment">
    <?php foreach ($vars['comments'] as $comment): ?>
        <li class="comment__item">
            <div class="comment__left-col">
                <span title="О пользователе" class="comment__user">
                    <?= $comment['name']; ?>
                </span>
                <div class="comment__time">
                    <?= date("d.m.Y в H:i", strtotime($comment['created_at'])) ?>
                </div>
                <div class="comment__user-info">
                    С нами с: 12.12.2012<br />
                    Сообщений: 555
                </div>
            </div>

            <div class="comment__right-col">
                <?= $comment['comment']; ?>
            </div>
        </li>
    <?php endforeach ?>
</ul>
<?php } else { ?>
    <p>Пока никто не оставил комментарий. Вы будете первым.</p>
<?php } ?>

<?php loadTemplate('comment', 'form_add_comment.php', $vars); ?>
