
<h2 class="page_name">Авторизация и регистрация</h2>
<form class="registr-form" action="/auth/login" method="post">
    <input class="auth-input" type="text" name="login" placeholder="Введите ваш логин">
    <input class="auth-input" type="password" name="password" placeholder="Введите пароль">
    <p class="auth-save">
    <label class="auth-save-label" for="save">Save?</label>
    <input class="auth-save-check" type='checkbox' name='save'>
    </p>
    <button class="auth-btn"  type="submit" name="ok"> Войти </button>
</form>
<p class="registration"> У вас еще нет аккаунта? <a class="registration-link" href="/registr">Зарегистрируйтесь</a></p>
<?php if($message): ?>
    <p class="message"><?= $message?></p>
<?php endif; ?>
