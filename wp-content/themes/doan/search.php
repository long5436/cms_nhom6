<?php get_header() ?>

<?php

$variable = (isset( $_GET['s'])) ? $_GET['s']: '';

$allProduct = getSearchResult($variable);
// d($searchProducts);
?>


<!--================Blog Main Area =================-->
<section class="our_cakes_area p_100">
    <div class="container">
        <div class="main_title">
            <h2>Kết quả tìm kiếm cho từ khóa <?php echo $variable ?></h2>

        </div>
        <div class="cake_feature_row row">


            <?php 
  
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
                            </span>
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

<?php 
get_footer();
?>