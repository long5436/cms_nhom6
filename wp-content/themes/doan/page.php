<?php get_header() ?>

<?php
$term = get_term(get_queried_object_id(),'product_cat') ;
// d($term);
?>

<!--================Blog Main Area =================-->
<section class="our_cakes_area p_100">
    <div class="container">
        <div class="main_title">
            <h2><?php echo $term->name ?></h2>

        </div>
        <div class="cake_feature_row row">


            <?php 

                
                $allProduct = getProductsByCategory($term->term_id, 12);

                        
                // d($allProduct);

                foreach ($allProduct as $product):
                    
                
            ?>

            <div class="col-lg-3 col-md-4 col-6">
                <div class="cake_feature_item">
                    <a href="<?php echo get_permalink( $product->id) ?>" class="cake_img">
                        <img class="cake_img-img" src="<?php echo get_the_post_thumbnail_url($product->id, 'medium') ?>"
                            alt="">
                    </a>
                    <div class="cake_text">
                        <h4>
                            <span class="price">
                                <?php echo wc_price($product->get_sale_price()) ?>
                        </h4>
                        <h3><?php echo $product->name ?></h3>
                        <a class="pest_btn" href="<?php echo dk_page('cart') . '?add-to-cart=' . $product->id ?>">Thêm
                            vào giỏ hàng</a>
                    </div>
                </div>
            </div>

            <?php 
                endforeach;
            ?>
        </div>
    </div>
</section>
<!--================End Blog Main Area =================-->


<!--================Newsletter Area =================-->
<section class="newsletter_area">
    <div class="container">
        <div class="row newsletter_inner">
            <div class="col-lg-6">
                <div class="news_left_text">
                    <h4>Join our Newsletter list to get all the latest offers, discounts and other benefits</h4>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="newsletter_form">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Enter your email address">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button">Subscribe Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Newsletter Area =================-->

<?php 
get_footer();
?>