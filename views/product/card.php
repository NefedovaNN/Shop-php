<a class="back" href="/product/catalog"><i class="icon-undo2"></i></a>
<div class="container">
<h2 class="page_name"> Карточка товара </h2>
<div class="product-item" id="<?=$product->id?>">
    <h3 class="product-title"><?=$product->title?></h3>
    <img class="product-image" src="/img/<?= $product->image?>" alt="" >
    <p class="product-description"><?= $product->description?></p>
    <p class = 'product-price'>Price: <?=$product->price?> $</p>
    <button data-id="<?=$product->id?>" class="buy" type="submit">Купить</button>
</div>
</div>
<script>
    let btn = document.querySelector('.buy');
    btn.addEventListener('click', () => {
        let id = btn.getAttribute('data-id');
        (
            async() => {
                const response = await fetch('/basket/add/?id=' + id);
                const answer = await response.json();
                document.getElementById('count').innerText = answer.count;
            }
        )()
    })
</script>