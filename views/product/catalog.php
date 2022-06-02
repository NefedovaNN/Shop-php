<h2>Каталог</h2>
<?php foreach($catalog as $item):?>
    <div class="product-item">
        <h3><a href="/product/card/?id=<?=$item['id']?>"><?=$item['title']?></a></h3>
        <img src="/img/<?= $item['image']?>" alt="" width="200px">
        <p>price: <?=$item['price']?></p>
        <button class="buy" data-id="<?= $item['id'] ?>">Купить</button>
    </div>
<?php endforeach;?>
<a href="/product/catalog/?page=<?=$page?>">Еще</a>

<script>
    let buttons = document.querySelectorAll('.buy');
    buttons.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (
                async() => {
                    const response = await fetch('/basket/add/?id=' + id);
                    const answer = await response.json();
                    document.getElementById('count').innerText = answer.count;
                }
            )()
        })
    })
</script>