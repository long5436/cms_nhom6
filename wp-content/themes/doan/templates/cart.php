<?php
/* Template Name: Cart */
$check_update = dk_cart();
get_header();
$products = WC()->cart->get_cart();


// echo apply_filters('the_content',$wp_query->post->post_content);
?>

<section class="cart_table_area p_100">
    <div class="container">

        <?php

            echo count($products) . ' sản phẩm';
            if (count($products) > 0) :
                if ($check_update != null) {
                    echo ' | ' . $check_update;
                }
                
        ?>
        <form id="form-card-show" action="<?php echo get_permalink(); ?>" method="post" class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Preview</th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item): 
                        $product = $cart_item['data'];
                    ?>
                    <tr>
                        <td>
                            <img class="cart-img"
                                src="<?php echo get_the_post_thumbnail_url($cart_item['product_id'], 'medium') ?>"
                                alt="">
                        </td>
                        <td><?php echo $cart_item['data']->name; ?></td>
                        <td><?php echo WC()->cart->get_product_price($product) ?></td>
                        <td>

                            <input class="quantify-cart8" id="quantify-<?php echo $product->id; ?>" min="0"
                                name="<?php echo $product->id; ?>" value="<?php echo $cart_item['quantity']; ?>"
                                type="number" class="form-control" />
                        </td>
                        <td>
                            <?php
                            echo WC()->cart->get_product_subtotal($product, $cart_item['quantity']);
                            ?>
                        </td>
                        <td>
                            <button name="remove_item-<?php echo $cart_item['product_id']; ?>" type="submit"
                                class="btn btn-sm me-1 mb-2" style="background: #f195b2" title="Remove item">
                                <span class="text-white">
                                    X
                                </span>
                            </button>

                        </td>
                    </tr>

                    <?php 
                        endforeach;
                    ?>

                    <tr>

                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <div class="text-right">
                                <button class="pest_btn" type="submit" name="update_cart">Cập nhật</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>

        <?php
        else:
        ?>

        <h2>Giỏ hàng đang trống</h2>

        <?php
            endif;
            if (count($products) > 0):
        ?>

        <div class="row cart_total_inner">
            <div class="col-lg-7"></div>
            <div class="col-lg-5">
                <div class="cart_total_text">
                    <div class="cart_head">
                        Thông tin hóa đơn
                    </div>
                    <div class="total">
                        <?php
                            foreach ($products as $cart_item_key => $cart_item) :
                            $product_data = $cart_item['data'];
                        ?>
                        <li
                            class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                            <?php echo $product_data->name; ?>
                            <span>
                                <?php
                                    echo WC()->cart->get_product_subtotal($product_data, $cart_item['quantity']);
                                ?>
                            </span>
                        </li>
                        <?php
                            endforeach;
                            ?>

                        <li
                            class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                            <div>
                                <strong>Tổng tiền</strong>
                                <strong>
                                    <p class="mb-0">(đã bao gồm VAT)</p>
                                </strong>
                            </div>
                            <span><strong><?php echo WC()->cart->get_cart_total(); ?></strong></span>
                        </li>
                        <h4>Tổng tiền <span><?php echo WC()->cart->get_cart_total(); ?></span></h4>
                    </div>
                    <div class="cart_footer">
                        <a class="pest_btn" href="<?php echo dk_page('checkout') ?>">Tiến hành thanh toán</a>
                    </div>
                </div>
            </div>
        </div>

        <?php
            endif;
            
        ?>
    </div>
</section>


<?php 
get_footer();
?>