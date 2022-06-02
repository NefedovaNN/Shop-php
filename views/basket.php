<h2>Корзина товаров</h2>

<?php foreach ($basket as $item) : ?>
    <div id=<?= $item['basket_id'] ?>>
        <p><?= $item['title'] ?></p>
        <img src="/img/<?= $item['image'] ?>" width="200px">
        <p><?= $item['price'] ?></p>
        <button class="delete" data-id="<?= $item['basket_id'] ?>">Удалить</button>
    </div>
<?php endforeach; ?><br>
<?php if ($basket) : ?>
    <form action="/orders/checkout" method="POST">
        <p>Для оформления заказа, введите номер телефона:</p><br>
        <input type="text" name='numberPhone' value="" placeholder="Ваш номер телефона">
        <button name="ok" type="submit">Оформить заказ</button>
    </form>
    <?php else: ?>
        <p>Ваша корзина пуста</p>
<?php endif; ?>


<script>
    let buttons = document.querySelectorAll('.delete');

    buttons.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (
                async () => {
                    const response = await fetch('/basket/delete/?id=' + id);
                    const answer = await response.json();
                    document.getElementById(id).remove();
                    document.getElementById('count').innerText = answer.count;
                }
            )()
        })

    });
</script>