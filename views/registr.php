<?php

use app\engine\App;
?>
<p>Регистрация</p>
<form class="registr-form" action="/auth/signUp" method="POST">
    <label for="firstName">Имя</label>
    <input type="text" placeholder="Введите ваше имя" value="" name="firstName">
   
    <label for="lastName">Фамилия</label>
    <input type="text" placeholder="Введите фамилию" value="" name="lastName">
    
    <label for="email">Адрес электронной почты</label>
    <input type="email" placeholder="Введите адрес электронной почты" value="" name="email">
    <label for="login">Придумайте логин</label>
    <input type="text" placeholder="Введите логин" value="" name="login">
    
    <label for="numberPhone">Номер телефона</label>
    <input type="text" placeholder="Введите номер телефона" value="" name="numberPhone">
    
    <label for="pass">Пароль</label>
    <input type="password" placeholder="Введите пароль" value="" name="pass">
    
    <label for="pass_confirm">Подтверждение пароля</label>
    <input type="password" placeholder="Подтвердите пароль" value="" name="pass_confirm">
    
    <label for="city">Город</label>
    <input type="password" placeholder="Введите пароль" value="" name="city">
    <button type="submit">Зарегистрироваться</button>
</form>
<div> <p><?= App::call()->session->get('message')?></p></div>
<p>Уже есть аккаунт? <a href="/auth/authorization">Авторизуйтесь!</a></p>