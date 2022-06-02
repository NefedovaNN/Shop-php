<?php
use app\engine\App;
?>
<h2>Авторизация и регистрация</h2>
    <form action="/auth/login" method="post">
        <input type="text" name="login" placeholder="Введите ваш логин">
        <input type="password" name="password" placeholder="Введите пароль">
        Save? <input type='checkbox' name='save'>
        <input type="submit" name="ok">
    </form>
    <p class=""> У вас еще нет аккаунта? <a href="/registr">Зарегистрируйтесь</a></p>
    <div> <p><?= App::call()->session->get('message')?></p></div>
