<?php
get_header();
?>

<!--================End Main Header Area =================-->
<section class="banner_area">
    <div class="container">
        <div class="banner_text">
            <h3>Shop</h3>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="shop.html">Shop</a></li>
            </ul>
        </div>
    </div>
</section>
<!--================End Main Header Area =================-->

<!--================Product Area =================-->
<section class="product_area p_100">
    <div class="container">
        <div class="row product_inner_row">
            <div class="col-lg-9">

                <div class="row product_item_inner">
                    <?php
            
                        $paged = (get_query_var('page')) ? get_query_var('page') : 1;
                        $totalPage = wp_count_posts( 'product' )->publish;

                        define('QTY', 9);
                        $products = getLatestProducts(QTY, $paged);
                        // d($products);
                        foreach ($products as $product):


                    ?>

                    <div class="col-lg-4 col-md-4 col-6">
                        <div class="cake_feature_item">
                            <a href="<?php echo get_permalink( $product->id) ?>" class="cake_img">
                                <img class="cake_img-img"
                                    src="<?php echo get_the_post_thumbnail_url($product->id, 'medium');?>" alt="">
                            </a>
                            <div class="cake_text">
                                <h4><span class="price">
                                        <?php echo wc_price($product->get_sale_price()) ?>
                                    </span></h4>
                                <h3><?php echo $product->name ?></h3>
                                <a class="pest_btn"
                                    href="<?php echo dk_page('cart') . '?add-to-cart=' . $product->id ?>">Thêm vào giỏ
                                    hàng</a>
                            </div>
                        </div>
                    </div>

                    <?php
                        endforeach;
                    ?>

                </div>
                <div class="product_pagination">
                    <!-- <div class="left_btn">
                        <a href="#"><i class="lnr lnr-arrow-left"></i> New posts</a>
                    </div> -->
                    <div class="middle_list">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">

                                <?php
                                    for ($i = 0; $i < $totalPage / 9; $i++):
                                    $link = get_site_url() . '?page=' . ($i + 1);
                                    
                                ?>
                                <li class="page-item <?php if (($i + 1) == $paged) echo 'active' ?>"><a
                                        class="page-link" href="<?php echo $link ?>"><?php echo $i + 1 ?></a>
                                </li>
                                <?php
                                    endfor;
                                ?>

                            </ul>
                        </nav>
                    </div>
                    <!-- <div class="right_btn"><a href="#">Older posts <i class="lnr lnr-arrow-right"></i></a></div> -->
                </div>
            </div>
            <div class="col-lg-3">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();

?>