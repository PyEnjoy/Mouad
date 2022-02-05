<div class="product-entry border">
    <a href="<?= $product->getUrl(); ?>" class="prod-img img-une">
        <img src="<?= $product->getImage() ?>" class="img-fluid" alt="Free html5 bootstrap 4 template">
    </a>
    <div class="desc">
        <h2><a href="<?= $product->getUrl(); ?>"><?= $product->getTitre(); ?></a></h2>
        <span class="price"><?= $product->price; ?> $</span>
    </div>
</div>