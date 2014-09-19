<ul>
    <?php foreach($vars['cars'] as $car): ?>
        <li><?= $car['id'] ?> - <?= $car['model'] ?></li>
    <?php endforeach ?>
</ul>