<h2 class="page_name">Отзывы о магазине</h2>
<p class="">Добавить отзыв:</p>
<form class="feedbacks-form" action="/reviews/add" method="POST">
    <input  type="text" hidden name='id' class='input-id' value="">
    <input class="input-name" type="text" name='name' placeholder="Ваше имя" value="">
    <input class="input-feedback" type="text" name='feedback' placeholder="Ваш отзыв" value="">
    <button class="add-btn" type="submit">Отправить</button>
</form>
<div class="feedbacks-block">
<?php foreach ($feedbacks as $item) : ?>
    <div class="feedbacks-item" id='<?= $item['id'] ?>'>
       <div class="feedbacks-text">
       <p class="name" style="font-weight: bold;"><?= $item['name'] ?>:</p>
        <p class="feedback"><?= $item['feedback'] ?></p>
       </div>
       <?php if($isAdmin): ?>
        <div class="feedbacks-buttons">
        <button class='btn-edit' data-id='<?= $item['id'] ?>'>Изменить</button>
        <button class='btn-delete' data-id='<?= $item['id'] ?>'>Удалить</button>
        </div>
        <?php endif; ?>
        <hr>
    </div>
<?php endforeach; ?>
</div>

<script>
    let buttonEdit = document.querySelectorAll('.btn-edit')
    let buttonDelete = document.querySelectorAll('.btn-delete');
    buttonDelete.forEach((element) => {

        element.addEventListener('click', () => {
            let id = element.getAttribute('data-id');

            (
                async () => {
                    const response = await fetch('/reviews/delete/?id=' + id);
                    const answer = await response.json();
                    document.getElementById(id).remove();

                }
            )()
        })

    });
    buttonEdit.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            let div = document.getElementById(id);
            let name = div.querySelector('.name');
            let feedback = div.querySelector('.feedback');
            let inputName = document.querySelector('.input-name');
            let inputFeedback = document.querySelector('.input-feedback');
            let inputId = document.querySelector('.input-id');
            inputName.value = name.textContent;
            inputFeedback.value = feedback.textContent;
            inputId.value = id;

        })
    })
</script>