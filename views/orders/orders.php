<h2>Ваши заказы</h2>
<?php foreach($orders as $item): ?>
<a href="/orders/orderDetails/?id=<?=$item['id']?>" >
    <p>Заказ на сумму: <?= $item['sum'] ?></p>
    <p>Статус заказа: <?= $item['status'] ?></p>
</a>
<hr>
<?php endforeach; ?>