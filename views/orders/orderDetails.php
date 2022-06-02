<?php foreach($basket as $item): ?>
    <div>
    <p><?= $item['title'] ?></p>
    <img src="/img/<?= $item['image'] ?>" width="200px">
    <p><?= $item['price'] ?></p>
</div>
<?php endforeach; ?><br>
