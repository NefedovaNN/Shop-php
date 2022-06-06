<h2 class="page_name">Кабинет администратора</h2>
<ul class="orders-list">
    <?php foreach($orders as $item): ?>
        <li class="order-item-li">
    <a order-item-link href="/admin/getOrder/?id=<?=$item['id']?>">
    <p class = 'order-info'>Имя: <?= $item['firstName'] ?></p>
    <p class = 'order-info'>Почта: <?= $item['email'] ?></p>
    <p class = 'order-info'>Номер телефона: <?=$item['numberPhone']?></p>
    <p class = 'order-info'>Город: <?= $item['city'] ?></p>
    <p class = 'order-info'>Заказ на сумму: <?=$item['sum']?></p>
    </a> 
    <form class = "edit-status" action="/admin/changeStatus/">
        <input type="text" hidden name='id' value="<?=$item['id']?>">
        <select class="edit-status-select" name="status" id="<?= $item['id'] ?>">
            <option <?php if($item['status'] == 'Заказ оформлен') echo "selected"; ?> value="Заказ оформлен">Заказ оформлен</option>
            <option <?php if($item['status'] == 'Заказ собирается') echo "selected"; ?> value="Заказ собирается">Заказ собирается</option>
            <option <?php if($item['status'] == 'Заказ готов') echo "selected"; ?> value="Заказ готов">Заказ готов</option>
        </select>
        <button class="btn-edit" type="submit" > Изменить статус заказа </button>
    </form>
</li>
    <hr>
<?php endforeach; ?>
</ul>