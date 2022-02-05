<div class="col-md-12">
<div class="product-name d-flex">
    <div class="one-forth text-left px-4">
        <span>Product Details</span>
    </div>
    <div class="one-eight text-center">
        <span>Price</span>
    </div>
    <div class="one-eight text-center">
        <span>Quantity</span>
    </div>
    <div class="one-eight text-center">
        <span>Total</span>
    </div>
    <div class="one-eight text-center px-4">
        <span>Remove</span>
    </div>
</div>
<?php $prices = 0; ?>
<?php foreach($products as $product): ?>
    <div class="product-cart d-flex">
        <div class="one-forth">
            <div class="product-img" style="background-image: url(<?= $product->getImage() ?>);">
            </div>
            <div class="display-tc">
                <h3><?= $product->getTitre(); ?></h3>
            </div>
        </div>
        <div class="one-eight text-center">
            <div class="display-tc">
                <span class="price">$ <?= $product->price; ?></span>
            </div>
        </div>
        <div class="one-eight text-center">
            <div class="display-tc">
                <input type="number" id="quantity-<?= $product->getId() ?>" name="quantity" class="form-control input-number text-center cartqt" value="<?= $SessionCartId[$product->getId()] ?>" min="1" max="100">
            </div>
        </div>
        <div class="one-eight text-center">
            <div class="display-tc">
                <span class="price">$ <?php $countprice = $product->price*$SessionCartId[$product->getId()]; echo $countprice ?></span>
            </div>
        </div>
        <div class="one-eight text-center">
            <div class="display-tc">
                <a href="#" class="closed"></a>
            </div>
        </div>
    </div>
    <?php $prices += $countprice; ?>
<?php endforeach; ?>
</div>
<div class="col-md-12">
        <div class="total-wrap">
            <div class="row">
                <div class="col-sm-8">
                    <form action="#">
                        <div class="row form-group">
                            <div class="col-sm-3">
                                <input type="submit" value="Checkout" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-4 text-center">
                    <div class="total">
                        <div class="grand-total">
                            <p><span><strong>Total:</strong></span> <span>$<?= $prices ?></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>