<div class="container">
<h2 class="page_name">Каталог</h2>
<div class="product_list">
    <?php foreach ($catalog as $item) : ?>
       <div id="<?= $item['id'] ?>" class="product-item">
       <a class="product-item-link" href="/product/card/?id=<?= $item['id'] ?>">
            <img class="product-image" src="/img/<?= $item['image'] ?>" alt="">
            <h3 class="product-title"><?= $item['title'] ?></h3>
            <p class="product-price">Price: <?= $item['price'] ?> $</p>
        </a>
        <button class="buy" data-id="<?= $item['id'] ?>">Добавить в корзину</button>
       </div>
    <?php endforeach; ?>
    
</div>
 <a href="/product/catalog/?page=<?= $page ?>">Еще</a>
</div>
 <script>
    let btn = document.querySelectorAll('.buy');
    btn.forEach(element => {
        element.addEventListener('click', () => {
            let id = element.getAttribute('data-id');
            
            (
            async() => {
                const response = await fetch('/basket/add/?id=' + id);
                const answer = await response.json();
                document.getElementById('count').innerText = answer.count;
            }
            )()
        })
        
    });
 
</script>