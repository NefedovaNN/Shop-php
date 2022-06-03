<header class="header">
   <div class="header_left">
   <?php if ($isAuth) : ?>
        <p class='menu-link'>Добро пожаловать, <?= $userName ?>! <a class="logout" href="/auth/logout">[Выход]</a></p>
    <?php else : ?>
        <a class="menu-link" href="/auth">Авторизация и регистрация</a>
    <?php endif; ?>
    <a class='menu-link' href='/'>Главная</a>
    <a class='menu-link' href="/product/catalog">Каталог</a>
    <a class='menu-link' href="/reviews">Отзывы о магазине</a><br>
   </div>
    <div class="header_right">
    <?php if ($isAdmin) : ?>
        <a class='menu-link' href="/admin"><i class="icon-user-tie"></i></a><br>
    <?php endif; ?>
    <a class='menu-link' href="/basket"><i class="icon-cart"></i>(<span id="count"><?= $count ?></span>)</a>
    <?php if ($isAuth) : ?>
        <a class='menu-link' href="/profile"><i class="icon-user-check"></i></a>
    <?php else : ?>
        <a class="menu-link" href="/profile"><i class="icon-user"></i></a>
    <?php endif; ?>
    </div>
</header>