<div class="form-add-comment">
    <h4 class="form-add-comment__header">Добавить комментарий</h4>

    <?= $vars['flashMessageHtml'] ?>

    <form action="/comment/create" method="post" xmlns="http://www.w3.org/1999/html">

        <p>
            <label class="form-add-comment__label" for="name">Имя</label><br>
            <input class="form-add-comment__input" type="text"
                   name="name" placeholder="Ваше имя" value="<?= $vars['formAddComment']['name'] ?>" />
        </p>
        <p>
            <label class="form-add-comment__label" for="comment">Комментарий</label><br>
            <textarea class="form-add-comment__text" name="comment"
                      placeholder="Ваш комментарий"><?= $vars['formAddComment']['comment'] ?></textarea>
        </p>
        <p>
            <input type="submit" value="Добавить"/>
        </p>
        <input type="hidden" name="theme_id" value="<?= $vars['theme']['id'] ?>"/>
    </form>
</div>