<?php
	get_header();
?>

<?php

$the_query = wc_get_product(get_the_ID());
$allProduct = getProductsByCategoryRand($the_query->get_category_ids()[0], 12);

?>



<!--================Product Details Area =================-->
<section class="product_details_area p_100 mt-5">
    <div class="container pt-5">
        <div class="row product_d_price">
            <div class="col-lg-6">
                <div class="product_img"><img class="img-fluid"
                        src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt=""></div>
            </div>
            <div class="col-lg-6">
                <div class="product_details_text">
                    <h4><?php echo $the_query->get_name() ?></h4>
                    <p><?php echo get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true); ?></p>
                    <h5 class="pb-0">Giá: <span><?php echo wc_price($product->get_regular_price())  ?></span></h5>
                    <h5 class="py-0">Giá khuyến mãi:
                        <span><?php echo wc_price($product->get_sale_price())  ?></span>
                    </h5>
                    <!-- <div class="quantity_box pt-4">
                        <label for="quantity">Số lượng :</label>
                        <input type="text" placeholder="1" id="quantity">
                    </div> -->
                    <a class="pink_more" href="<?php echo dk_page('cart') . '?add-to-cart=' . get_the_ID() ?>">Thêm vào
                        giỏ hàng</a>
                </div>
            </div>
        </div>

        <div class="product_tab_area">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                        aria-controls="nav-home" aria-selected="true">Descripton</a>

                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home">
                    <?php
                        echo $the_query->get_description();
                    ?>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="cake_feature_four">
    <div class="container">
        <div class="cake_feature_inner">
            <div class="main_title">
                <h2>Các sản phấm khác cùng loại</h2>
            </div>
            <div class="cake_feature_slider owl-carousel">

                <?php
                    foreach ($allProduct as $key => $value):
                ?>

                <div class="item">
                    <div class="cake_feature_item">
                        <a href="<?php echo get_permalink( $value->get_id()) ?>" class="cake_img">
                            <img class="cake_img-img"
                                src="<?php echo get_the_post_thumbnail_url($value->get_id(), 'medium'); ?>" alt="" />
                        </a>
                        <div class="cake_text">
                            <h4>
                                <span class="price">
                                    <?php echo $value->get_regular_price() . 'VNĐ' ?>
                            </h4>
                            </span>
                            <h3><?php echo $value->get_name() ?></h3>
                            <a class="pest_btn"
                                href="<?php echo dk_page('cart') . '?add-to-cart=' . $value->get_id() ?>">Thêm vào giỏ
                                hàng</a>
                        </div>
                    </div>
                </div>

                <?php
                    endforeach;
                ?>


            </div>
        </div>

    </div>
</section>

<!--================End Similar Product Area =================-->

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