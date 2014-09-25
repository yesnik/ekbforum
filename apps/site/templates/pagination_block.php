<?php if(sizeof($vars['pages']) > 1): ?>
    <ul class="pagination">
        <?php foreach($vars['pages'] as $i => $pageUrl):  ?>
            <li class="pagination__item">
                <a class="pagination__link <?php if ($vars['page_current'] == $i + 1) echo "pagination__link_active"?>"
                   href="<?= $pageUrl ?>"><?= ($i + 1) ?></a>
            </li>
        <?php endforeach ?>
    </ul>
<?php endif; ?>