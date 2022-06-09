<a class="back" href="/orders"><i class="icon-undo2"></i></a>
<div class="container">
<h2 class="page_name">Детали заказа</h2>

<?php foreach ($basket as $item) : ?>
    <div class="order-item">
        <img class="order-product-image" src="/img/<?= $item['image'] ?>">
        <div class="order-text">
        <h3 class="product-title"><?= $item['title'] ?></h3>
        <p class="quantity" >Количество: <?= $item['quantity'] ?></p>
        <p class="product-price">Price: <?= $item['product_sum'] ?> $</p>
        </div>
    </div>
<?php endforeach; ?><br>
<p class="cartSum">Cумма заказа: <?= $sum ?> $ </p>
</div>