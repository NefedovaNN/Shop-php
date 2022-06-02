<h2>Детали заказа</h2>
<?php foreach($basket as $item): ?>
    <div id=<?=$item['basket_id']?>>
    <p><?= $item['title'] ?></p>
    <img src="/img/<?= $item['image'] ?>" width="200px">
    <p><?= $item['price'] ?></p>
</div>
<?php endforeach; ?><br>
