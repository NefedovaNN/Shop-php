<div class="container">
    <h2 class="page_name">Корзина товаров</h2>
    <?php if ($basket) : ?>

        <?php foreach ($basket as $item) : ?>
            <div class="product-item-cart" id=<?= $item['basket_id'] ?>>
                <div class="cart-image">
                    <a href="/product/card/?id=<?= $item['prod_id'] ?>" class="product-item-link">
                        <img class="product-image-cart" src="/img/<?= $item['image'] ?>">
                </div></a>
                <div class="cart-item-info">
                    <h3 class="product-title"><?= $item['title'] ?></h3>
                    <p class="quantity" >Количество: <?= $item['quantity'] ?></p>
                    <p class="product-price">Price: <?= $item['price'] ?> $</p>

                    <button class="delete" data-id="<?= $item['basket_id'] ?>">Удалить из корзины</button>
                </div>
            </div>
        <?php endforeach; ?><br>
        <form class="basket" action="/orders/checkoutInfo" method="POST">
            <button class="checkout" name="checkout" type="submit">Оформить заказ</a>
        </form>
    <?php else : ?>
        <p class="auth">Ваша корзина пуста</p>
    <?php endif; ?>
</div>


<script>
    let buttons = document.querySelectorAll('.delete');

    buttons.forEach((elem) => {
        elem.addEventListener('click', (event) => {
            let id = elem.getAttribute('data-id');
            let quantity = event.target.parentNode.querySelector('.quantity');
           
            (
                async () => {
                    const response = await fetch('/basket/delete/?id=' + id);
                    const answer = await response.json();
                    quantity.textContent = "Количество: " + answer.quantity;
                   
                    document.getElementById('count').innerText = answer.count;
                    if(answer.quantity === 0 || answer.quantity === null ){
                        
                        document.getElementById(id).remove();
                    }
                }
            )()
        })

    });
</script>