<h2 class="page_name">Каталог</h2>
<div class="product_list">
    <?php foreach ($catalog as $item) : ?>
       <div class="product-item">
       <a class="product-item-link" href="/product/card/?id=<?= $item['id'] ?>">
            <img class="product-image" src="/img/<?= $item['image'] ?>" alt="">
            <h3 class="product-title"><?= $item['title'] ?></h3>
            <p class="product-price">Price: <?= $item['price'] ?> $</p>
        </a>
        <button class="buy" data-id="<?= $item['id'] ?>">Add to cart</button>
       </div>
    <?php endforeach; ?>
</div>
<a href="/product/catalog/?page=<?= $page ?>">Еще</a>

<script>
    let buttons = document.querySelectorAll('.buy');
    buttons.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (
                async () => {
                    const response = await fetch('/basket/add/?id=' + id);
                    const answer = await response.json();
                    document.getElementById('count').innerText = answer.count;
                }
            )()
        })
    })
</script>