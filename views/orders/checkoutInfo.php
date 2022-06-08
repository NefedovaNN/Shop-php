<div class="container">
<?php if($user): ?>
    <form class="info-for-order" action="/orders/orderConfirm" method="post">
    <p class = "auth">Логин: <input  class="order-input" type="text" readonly name = 'login' value="<?= $user->login?>"></p>
    <p class = "auth">Имя: <input class="order-input" type="text" readonly name = 'firstName' value="<?= $user->firstName?>"></p>
    <p class = "auth">Адрес электронной почты: <input class="order-input" type="email" readonly name = 'email' value="<?= $user->email?>"></p>
    <p class = "auth">Номер телефона: <input class="order-input" type="tel" readonly name = 'numberPhone' value="<?= $user->numberPhone?>"></p>
    <p class = "auth">Город: <input class="order-input" type="text" readonly name = 'city' value="<?= $user->city?>"></p>
    <p class = "auth">Сумма заказа: $<input class="order-input" type="text" readonly name="sum" value="<?= $sum ?>"> </p>
    <button class="confirm-checkout" name="confirm-checkout" type="submit">Подтверить оформление заказа</button>
    </form>
    <p class="message"><?= $message ?></p>
<?php else: ?>
    <form class="info-for-order" action="/orders/orderConfirm" method="post">
    <p class = "auth"> <input class="auth-input" type="text" placeholder="Введите имя:"  name = 'firstName' value="<?= $user->firstName?>"></p>
    <p class = "auth"> <input class="auth-input" placeholder="Введите адрес электронной почты:" type="email"  name = 'email' value="<?= $user->email?>"></p>
    <p class = "auth"> <input class="auth-input" type="tel"  placeholder="Введите номер телефона:" name = 'numberPhone' value="<?= $user->numberPhone?>"></p>
    <p class = "auth"> <input class="auth-input" type="text" placeholder="Введите город:" name = 'city' value="<?= $user->city?>"></p>
    <p class = "auth"> Сумма заказа: $ <input class="order-input" type="text" readonly name="sum" value="<?= $sum ?>" ></p>
    <button class="confirm-checkout" name="confirm-checkout" type="submit">Подтверить оформление заказа</button>
    </form>
    <p class="message"><?= $message ?></p>

<?php endif; ?>
</div>