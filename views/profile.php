<h2 class='page_name'>Профиль пользователя</h2>

<?php if ($isAuth): ?>

   <div class="profile-info">
      <form class="user-info-block" action="/profile/change" method="POST">
         <input type="text" hidden name="id" value="<?= $profile->id ?>">
         <p class="user-info login"> Логин: <?= $profile->login ?> </p>
         <p class="user-info numberPhone"> Номер телефона: <?= $profile->numberPhone ?> </p>
         <p class="user-info"> Имя: <input class="input-user-info" type="text" readonly name="firstName" value="<?= $profile->firstName ?>"> </p>
         <p class="user-info"> Фамилия: <input class="input-user-info" type="text" readonly name="lastName" value="<?= $profile->lastName  ?>"></p>
         <p class="user-info"> Адрес электронной почты: <input class="input-user-info" type="email" readonly name="email" value="<?= $profile->email ?>"></p>
         <p class="user-info"> Город: <input class="input-user-info" type="text" readonly name="city" value="<?= $profile->city ?>"></p>
         <button hidden type="submit" class="change-user-save"> Сохранить</button>
         <a class='my-order' href="/orders">Мои заказы</a>
      </form>
      <div class="btn-change-info">
         <button data-id="<?= $profile->id ?>" type="submit" class="change-user-info">Редактировать данные </button>
      </div>
   </div>
   <?php if ($message) : ?>
      <p class="message"><?= $message ?></p>
   <?php endif; ?>
<?php else : ?>
   <p class='empty-login'>Ваш профиль пуст, <a href="/registr">зарегистрируйтесь, чтобы заполнить его</a></p>
<?php endif; ?>



<script>
   let btnChange = document.querySelector('.change-user-info');
   let inputs = document.querySelectorAll('input');
   let btnSave = document.querySelector('.change-user-save');
   let login = document.querySelector('.login');
   let numberPhone = document.querySelector('.numberPhone')
   btnChange.addEventListener('click', () => {
         for (let i = 0; i < inputs.length; i++) {

            inputs[i].removeAttribute('readonly');

         }
         login.style.display = 'none';
         numberPhone.style.display = 'none';
         inputs[0].focus();
         btnChange.setAttribute('hidden', true);
         btnSave.removeAttribute('hidden');
      }

   )
</script>