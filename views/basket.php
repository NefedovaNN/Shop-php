<h2>Корзина товаров</h2>

<?php foreach ($basket as $item) : ?>
    <div class="product-item-cart" id=<?= $item['basket_id'] ?>>
        <div class="cart-image">
        <img class="product-image-cart" src="/img/<?= $item['image'] ?>" >
        </div>
        <div class="cart-item-info">
        <h3 class="product-title"><?= $item['title'] ?></h3>
        <p class="product-price">Price: <?= $item['price'] ?> $</p>
        <button class="delete" data-id="<?= $item['basket_id'] ?>">Delete</button>
        </div>
    </div>
<?php endforeach; ?><br>
<?php if ($basket) : ?>
    <form action="/orders/checkout" method="POST">
        <p>Для оформления заказа, введите номер телефона:</p><br>
        <input type="text" name='numberPhone' value="" placeholder="Ваш номер телефона">
        <button class="checkout" name="ok" type="submit">Checkout</button>
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