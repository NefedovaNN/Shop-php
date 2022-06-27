<div class="container">
    <h2 class="page_name">Корзина товаров</h2>
   <div class="cart-list">
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
            <p class="product-price">Price: <?= $item['product_sum'] ?> $</p>
            <button class="delete" data-id="<?= $item['basket_id'] ?>">Удалить из корзины</button>
        </div>
    </div>
<?php endforeach; ?><br>
<p class="cartSum">Cумма заказа: <?= $sum ?> $ </p>
<form class="basket-form" action="/orders/checkoutInfo" method="POST">
    <button class="checkout" name="checkout" type="submit">Оформить заказ</a>
</form>
<?php else : ?>
<p class="auth">Ваша корзина пуста</p>
<?php endif; ?>
   </div>
</div>


<script>
    let buttons = document.querySelectorAll('.delete');
        let sum = document.querySelector('.cartSum');
    buttons.forEach((elem) => {
        elem.addEventListener('click', (event) => {
            let id = elem.getAttribute('data-id');
            let quantity = event.target.parentNode.querySelector('.quantity');
            let product_sum = event.target.parentNode.querySelector('.product-price');
            (
                async () => {
                    const response = await fetch('/basket/delete/?id=' + id);
                    const answer = await response.json();
                    quantity.textContent = "Количество: " + answer.quantity;
                    product_sum.textContent = "Price: " + answer.product_sum + "$";
                    document.getElementById('count').innerText = answer.count;
                    sum.textContent = "Cумма заказа: " + answer.sum + "$";
                    if(answer.sum === 0 || answer.sum === null){
                        document.querySelector('.checkout').style.display = 'none';
                    }
                    if(answer.quantity === 0 || answer.quantity === null ){
                        
                        document.getElementById(id).remove();
                    }
                }
            )()
        })

    });
</script>