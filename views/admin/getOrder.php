<h2 class="page_name">Order details</h2>
<?php foreach($basket as $item): ?>
    <div class="order-item" id=<?=$item['basket_id']?>>
        <img class="order-product-image" src="/img/<?= $item['image'] ?>">
        <div class="order-text">
        <h3 class="product-title"><?= $item['title'] ?></h3>
        <p class="product-price">Price: <?= $item['price'] ?> $</p>
    </div>
</div>
<?php endforeach; ?><br>
<a class="" href="/admin">Назад</a>
