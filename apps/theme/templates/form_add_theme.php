<div class="form-add-comment">
    <h4 class="form-add-comment__header">Добавить новую тему</h4>

    <?= $vars['flashMessageHtml'] ?>

    <form action="/theme/create" method="post">

        <p>
            <label class="form-add-comment__label" for="name">Ваше имя</label><br>
            <input class="form-add-comment__input" type="text"
                   name="name" placeholder="Ваше имя" value="<?= $vars['formAddTheme']['name'] ?>" />
        </p>
        <p>
            <label class="form-add-comment__label" for="title">Заголовок темы</label><br>
            <input class="form-add-comment__input" type="text"
                   name="title" placeholder="Ваше имя" value="<?= $vars['formAddTheme']['title'] ?>" />
        </p>
        <p>
            <label class="form-add-comment__label" for="content">Содержание</label><br>
            <textarea class="form-add-comment__text" name="content"
                      placeholder="Ваш комментарий"><?= $vars['formAddTheme']['content'] ?></textarea>
        </p>
        <p>
            <input type="submit" value="Добавить"/>
        </p>
    </form>
</div>