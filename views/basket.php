<h2 class="page_name">Корзина товаров</h2>
<?php if ($basket) : ?>
    <form action="/orders/checkoutInfo" method="POST">
    <?php foreach ($basket as $item) : ?>
        <div class="product-item-cart" id=<?= $item['basket_id'] ?>>
            <div class="cart-image">
                <a href="/product/card/?id=<?= $item['prod_id'] ?>" class="product-item-link">
                    <img class="product-image-cart" src="/img/<?= $item['image'] ?>" >
                </div>
                <div class="cart-item-info">
                    <h3 class="product-title"><?= $item['title'] ?></h3>
                    <p class="product-price">Price: <?= $item['price'] ?> $</p>
                </a>
                <button class="delete" data-id="<?= $item['basket_id'] ?>">Удалить из корзины</button>
            </div>
        </div>
        <?php endforeach; ?><br>
        <button class="checkout" name="checkout" type="submit">Оформить заказ</a>
    </form>
<?php else: ?>
        <p class="empty-login">Ваша корзина пуста</p>
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