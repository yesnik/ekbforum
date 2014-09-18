<ul>
    <?php foreach($vars['cars'] as $car): ?>
        <li><?= $car['id'] ?> - <?= $car['title'] ?></li>
    <?php endforeach ?>
</ul>