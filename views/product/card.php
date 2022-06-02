<h2>Товар</h2>

<div class="product-item" id="<?=$product->id?>">
    <h3><?=$product->title?></h3>
    <img src="/img/<?= $product->image?>" alt="" width="">
    <p><?= $product->description?></p>
    <p>price: <?=$product->price?></p>
    <button data-id="<?=$product->id?>" class="buy" type="submit">Купить</button>
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