<h2>Профиль пользователя</h2>
<a class='menu-link' href="/orders">Мои заказы</a>


   <?php if($isAuth): ?>
    <p class=""> Логин: <?= $profile->login ?></p>
    <p class=""> Имя: <?= $profile->firstName ?></p>
    <p class=""> Фамилия: <?= $profile->lastName  ?></p>
    <p class=""> Номер телефона: <?= $profile->numberPhone?></p>
    <p class=""> Адрес электронной почты: <?= $profile->email ?></p>
    <p class=""> Город: <?= $profile->city?></p> 
    <?php endif; ?>

