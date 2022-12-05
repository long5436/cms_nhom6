<div class="product_left_sidebar">
    <aside class="left_sidebar search_widget">
        <form action="/" class="input-group">
            <input type="text" name="s" class="form-control" placeholder="Tìm kiếm">
            <div class="input-group-append">
                <button class="btn" type="submit"><i class="icon icon-Search"></i></button>
            </div>
        </form>
    </aside>
    <aside class="left_sidebar p_catgories_widget">
        <div class="p_w_title">
            <h3>Phân loại bánh</h3>
        </div>
        <ul class="list_style">


            <?php 
        $all_categories = getCategories( );
        foreach ($all_categories as $cat):
        
            if($cat->category_parent == 0) :
            
                $category_id = $cat->term_id;
        ?>



            <li><a href="<?php echo get_term_link($cat->slug, 'product_cat') ?>"><?php echo $cat->name ?>
                    (<?php echo $cat->count ?>)</a></li>

            <?php 
            endif;
        endforeach;
        ?>




        </ul>
    </aside>

    <aside class="left_sidebar p_sale_widget">
        <div class="p_w_title">
            <h3>Top Bánh giảm giá</h3>
        </div>

        <?php 
        define('QTY', 6);
        $saleProducts = getSaleProducts(QTY);

        // d($saleProducts);

        while ($saleProducts->have_posts()) : $saleProducts->the_post();
        global $product;

        // print_r($product->category_ids[0]);
                           
        ?>




        <div class="media">
            <div class="d-flex">
                <img class="sale-img" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium') ?>" alt="">
            </div>
            <div class="media-body">
                <a href="<?php echo get_permalink(get_the_ID()) ?>">
                    <h4><?php echo $product->name ?></h4>
                </a>
                <!-- <ul class="list_style">
                    <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                    <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                    <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                    <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                    <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                </ul> -->
                <h5><?php echo wc_price($product->get_sale_price()) ?></h5>
            </div>
        </div>


        <?php 
      
        endwhile;            
        ?>

    </aside>
</div>