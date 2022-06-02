<header class="header">
<?php if ($isAuth) : ?>
    <p class = 'menu-link'>Добро пожаловать, <?= $userName ?>! <a class = "logout" href="/auth/logout">[Выход]</a></p> 
<?php else : ?>
    <a class="menu-link" href="/auth/authorization">Авторизация и регистрация</a>
<?php endif; ?>
<a class = 'menu-link' href='/'>Главная</a>
<a class = 'menu-link' href="/product/catalog">Каталог</a>
<a class = 'menu-link' href="/orders">Заказы</a>
<a class = 'menu-link' href="/reviews">Отзывы о магазине</a><br>
<?php if ($isAdmin) : ?>
    <a class = 'menu-link' href="/admin">Кабинет администратора</a><br>
<?php endif; ?>
<a class = 'menu-link' href="/basket"><i class="icon-cart"></i>(<span id="count"><?= $count ?></span>)</a>
<a class="menu-link" href="#"><i class="icon-user"></i></a>
</header>
