<h2>Кабинет администратора</h2>
<?php foreach($orders as $item): ?>
    <a href="/admin/getOrder/?id=<?=$item['id']?>">
    <p><?=$item['numberPhone']?></p>
    <p><?=$item['sum']?></p>
    </a>
    <form action="/admin/changeStatus/">
        <input type="text" hidden name='id' value="<?=$item['id']?>">
        <select name="status" id="<?= $item['id'] ?>">
            <option <?php if($item['status'] == 'Заказ оформлен') echo "selected"; ?> value="Заказ оформлен">Заказ оформлен</option>
            <option <?php if($item['status'] == 'Заказ собирается') echo "selected"; ?> value="Заказ собирается">Заказ собирается</option>
            <option <?php if($item['status'] == 'Заказ готов') echo "selected"; ?> value="Заказ готов">Заказ готов</option>
        </select>
        <input type="submit" value="Изменить статус заказа">
    </form>
    <hr>
<?php endforeach; ?>