<div class="row row-pb-lg product-detail-wrap">
    <div class="col-sm-8">
        <div class="owl-carousel">
            <?php foreach($Productimgs as $Productimg): ?>
                <div class="item">
                    <div class="product-entry border">
                        <a href="#" class="prod-img">
                            <img src="<?= $Productimg->getUrl_img(); ?>" class="img-fluid" alt="Free html5 bootstrap 4 template">
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="product-desc">
            <h3><?= $product->getTitre(); ?></h3>
            <p class="price">
                <span><?= $product->price; ?> $</span> 
                <span class="rate">
                    <?php for ($i=0; $i < 5; $i++) { 
                        $class = $moyenrating > $i ? "icon-star-full" : "icon-star-empty";
                        echo "<i class=".$class."></i>";
                    } ?>
                    
                    (<?= $countcomment ?> Rating)
                </span>
            </p>
            </div>
        <!-- <div class="input-group mb-4">
        <span class="input-group-btn">
            <button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
            <i class="icon-minus2"></i>
            </button>
            </span>
        <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
        <span class="input-group-btn ml-1">
            <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                <i class="icon-plus2"></i>
            </button>
        </span>
    </div> -->
    <!-- <div class="row">
        <div class="col-sm-12 text-center">
                    <p class="addtocart"><a href="cart.html" class="btn btn-primary btn-addtocart"><i class="icon-shopping-cart"></i> Add to Cart</a></p>
                </div>
            </div>
        </div>
    </div> -->
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-md-12 pills">
                <div class="bd-example bd-example-tabs">
                    <span class="nav-link" id="pills-review-tab">Review</span>
                   

                    <div class="tab-pane border">
                        <div class="row">
                        <div class="col-md-8">
                            <h3 class="head"><?= $countcomment ?> Reviews</h3>
                            <?php foreach($comments as $comment): ?>
                            <div class="review">
                                <div class="desc">
                                    <h4>
                                        <span class="text-left"><?= $comment->username ?></span>
                                        <span class="text-right"><?= $comment->getCreated_at() ?></span>
                                    </h4>
                                    <p class="star">
                                        <span>
                                        <?php for ($i=0; $i < 5; $i++) { 
                                            $class = $comment->starts > $i ? "icon-star-full" : "icon-star-empty";
                                            echo "<i class=".$class."></i>";
                                        } ?>
                                        </span>
                                    </p>
                                    <p><?= $comment->comment ?></p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="col-md-4">
                            <div class="rating-wrap">
                                <h3 class="head">Give a Review</h3>
                                <div class="wrap">
                            <?php if($auth): ?>
                                <?php if($user_comment): ?>
                                    <div>
                                        <div class="desc">
                                            <p>
                                                <h3>Your Comment</h3>
                                                <span class="text-right"><?= $user_comment->getCreated_at() ?></span>
                                            </p>
                                            <p class="star">
                                                <span>
                                                <?php for ($i=0; $i < 5; $i++) { 
                                                    $class = $user_comment->starts > $i ? "icon-star-full" : "icon-star-empty";
                                                    echo "<i class=".$class."></i>";
                                                } ?>
                                                </span>
                                            </p>
                                            <p><?= $user_comment->comment ?></p>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <form action="" class="contact-form" method="POST">
                                        <span class="star-rating">
                                            <input type="radio" name="starts" value="1"><i></i>
                                            <input type="radio" name="starts" value="2"><i></i>
                                            <input type="radio" name="starts" value="3"><i></i>
                                            <input type="radio" name="starts" value="4"><i></i>
                                            <input type="radio" name="starts" value="5"><i></i>
                                        </span>
                                        <p class="star">
                                            <textarea name="comment" id="message" cols="30" rows="10" class="form-control" placeholder="Comments"></textarea>
                                        </p>
                                        
                                        <input type="hidden" name="id_user" value="<?= $_SESSION['auth']['id']; ?>">
                                        <input type="hidden" name="id_product" value="<?= $product->getId(); ?>">
                                        <p class="star">
                                            <input type="submit" value="Send Comment" class="btn btn-primary">
                                        </p>
                                    </form>
                                <?php endif; ?>
                            <?php else: ?>
                                <a href="<?= PATH.'/login'; ?>"><button class="btn btn_primary">Connect to add a comments</button></a> 
                            <?php endif; ?>
                                    
                                </div>
                                
                            </div>
                        </div>
                           
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>