<div class="container">
    
<h2 class="page_name">Регистрация</h2>
<form class="registr-form" action="/registr/signUp" method="POST">
    <label for="firstName">Имя</label>
    <input class = "auth-input" type="text" placeholder="Введите ваше имя" value="" name="firstName">

    <label for="lastName">Фамилия</label>
    <input class = "auth-input" type="text" placeholder="Введите фамилию" value="" name="lastName">

    <label for="email">Адрес электронной почты</label>
    <input class = "auth-input" type="email" placeholder="Введите адрес электронной почты" value="" name="email">

    <label for="login">Придумайте логин</label>
    <input class = "auth-input" type="text" placeholder="Введите логин" value="" name="login">

    <label for="numberPhone">Номер телефона</label>
    <input class = "auth-input" type="text" placeholder="Введите номер телефона" value="" name="numberPhone">

    <label for="pass">Пароль</label>
    <input class = "auth-input" type="password" placeholder="Введите пароль" value="" name="pass">

    <label for="pass_confirm">Подтверждение пароля</label>
    <input class = "auth-input" type="password" placeholder="Подтвердите пароль" value="" name="pass_confirm">

    <label for="city">Город</label>
    <input class = "auth-input" type="text" placeholder="Введите город" value="" name="city">
    <button class="auth-btn" type="submit">Зарегистрироваться</button>
</form>
<?php if ($message) : ?>
    <p class="message"><?= $message ?></p>
<?php endif; ?>

<p class = "auth">Уже есть аккаунт? <a class="auth-link" href="/auth">Авторизуйтесь!</a></p>
</div>