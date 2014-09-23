<div class="form-add-comment">
    <h4 class="form-add-comment__header">Добавить новую тему</h4>

    <?= $vars['flashMessageHtml'] ?>

    <form action="/theme/create" method="post">

        <p>
            <label class="label" for="name">Ваше имя</label><br>
            <input class="form-add-comment__input input" type="text"
                   name="name" placeholder="Ваше имя" value="<?= $vars['formAddTheme']['name'] ?>" />
        </p>
        <p>
            <label class="label" for="title">Заголовок темы</label><br>
            <input class="form-add-comment__input input" type="text"
                   name="title" placeholder="Заголовок темы" value="<?= $vars['formAddTheme']['title'] ?>" />
        </p>
        <p>
            <label class="label" for="content">Содержание</label><br>
            <textarea class="form-add-comment__text textarea" name="content"
                      placeholder="Текст сообщения"><?= $vars['formAddTheme']['content'] ?></textarea>
        </p>
        <p>
            <input type="submit" value="Добавить"/>
        </p>
    </form>
</div>