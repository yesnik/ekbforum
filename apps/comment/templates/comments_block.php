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
                    С нами с: <?= date("d.m.Y", strtotime($comment['user_created_at'])) ?><br />
                    Комментариев: <?= $comment['user_comments_num'] ?>
                </div>
            </div>
            <div class="comment__right-col">
                <?= $comment['comment']; ?>
            </div>
        </li>
    <?php endforeach ?>
</ul>