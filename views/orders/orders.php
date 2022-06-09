<div class="container">
<h2 class="page_name">Ваши заказы</h2>
<?php if ($isAuth) : ?>
    <?php if ($orders) : ?>
        <ul class="order-list">
            <?php foreach ($orders as $item) : ?>
                <li class='order-item-li'>
                    <a class="order-item-link" href="/orders/orderDetails/?id=<?= $item['id'] ?>">
                        <p class='order-info'>Заказ на сумму: <?= $item['sum'] ?> $ </p>
                        <p class='order-info'>Статус заказа: <?= $item['status'] ?> </p>
                    </a>
                </li>
                <hr>
            <?php endforeach; ?>
        </ul>
        <p class="message"><?=$message?></p>
    <?php else : ?>
        <p class="auth">Список ваших заказов пуст </p>
    <?php endif; ?>
<?php else : ?>
    <p class="message"><?=$message?></p>
    <p class="auth"> Для просмотра своих заказов и их статусов <a class="auth-link" href="/auth">авторизуйтесь,</a> или <a class="auth-link" href="/auth">зарегистрируйтесь!</a></p>
<?php endif; ?>

</div>