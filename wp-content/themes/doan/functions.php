<?php


function getSearchResult($s)
{
    return wc_get_products(array(
        'post_type' => 'product',
        'post_status' => 'publish',
        's' => $s
    ));
}


function getCategories()
{
    $taxonomy     = 'product_cat';
    $orderby      = 'name';
    $show_count   = 0;      // 1 for yes, 0 for no
    $pad_counts   = 0;      // 1 for yes, 0 for no
    $hierarchical = 1;      // 1 for yes, 0 for no  
    $title        = '';
    $empty        = 0;
    $args = array(
        'taxonomy'     => $taxonomy,
        'orderby'      => $orderby,
        'show_count'   => $show_count,
        'pad_counts'   => $pad_counts,
        'hierarchical' => $hierarchical,
        'title_li'     => $title,
        'hide_empty'   => $empty
    );
    return get_categories($args);
}


function getSubCategories($category_id)
{
    $taxonomy     = 'product_cat';
    $orderby      = 'name';
    $show_count   = 0;      // 1 for yes, 0 for no
    $pad_counts   = 0;      // 1 for yes, 0 for no
    $hierarchical = 1;      // 1 for yes, 0 for no  
    $title        = '';
    $empty        = 0;

    $args = array(
        'taxonomy'     => $taxonomy,
        'child_of'     => 0,
        'parent'       => $category_id,
        'orderby'      => $orderby,
        'show_count'   => $show_count,
        'pad_counts'   => $pad_counts,
        'hierarchical' => $hierarchical,
        'title_li'     => $title,
        'hide_empty'   => $empty
    );

    return get_categories($args);
}
?>

<?php

if (!function_exists('mytheme_logo')) {
    function mytheme_logo()
    { ?>
<?php
            printf(
                //truyền các tham số lần lượt url, title, logo, description
                '
                <a class="navbar-brand" href="%s" title="%s">
                <img src="%s" alt="">
                </a>
             ',
                get_bloginfo('url'),
                get_bloginfo('sitename'),
                esc_url(get_stylesheet_directory_uri()) . '/images/logo2.png',
            ); ?>

<?php }  ?>
<?php } ?>

<?php


function getSalePercent($product_id)
{
    $product = wc_get_product($product_id);
    $sale_percent = 0;
    if ($product->is_type('simple') || $product->is_type('external')) {
        $regular_price  = $product->get_regular_price();
        $sale_price     = $product->get_sale_price();
        $sale_percent = round(((floatval($regular_price) - floatval($sale_price)) / floatval($regular_price)) * 100);
    }
    return str_replace('{sale_percent}', $sale_percent, '-{sale_percent}%');
}

add_filter('woocommerce_sale_flash', 'my_woocommerce_sale_flash', 10, 3);
function my_woocommerce_sale_flash($html, $post, $product_id)
{
    return '<span class="onsale">' . getSalePercent($product_id) . '</span>';
}


function getRandProducts($args)
{
    return $latestProduct = wc_get_products(array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'orderby' => 'rand', //lay ngau nhien
        'posts_per_page' => $args
    ));
}



function getLatestProducts($args, $page)
{
    return $latestProduct = wc_get_products(array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'orderby' => 'ID',
        'order' => 'DESC',
        'paged' => $page,
        'limit' => 9,
        'posts_per_page' => $args
    ));
}



function getProductsByCategory($category_id, $args)
{
    return $allProduct = wc_get_products(array(
        'post_type'             => 'product',
        'post_status'           => 'publish',
        'orderby' => 'ID',
        'order' => 'DESC',
        'ignore_sticky_posts'   => 1,
        'posts_per_page'        => '12',
        'tax_query'             => array(
            array(
                'taxonomy'      => 'product_cat',
                'field' => 'term_id', //This is optional, as it defaults to 'term_id'
                'terms'         => $category_id,
                'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
            ),
            array(
                'taxonomy'      => 'product_visibility',
                'field'         => 'slug',
                'terms'         => 'exclude-from-catalog', // Possibly 'exclude-from-search' too
                'operator'      => 'NOT IN'
            )
            ),
           
    ));
}

function getProductsByCategoryRand($category_id, $args)
{
    return $allProduct = wc_get_products(array(
        'post_type'             => 'product',
        'post_status'           => 'publish',
        'ignore_sticky_posts'   => 1,
        'posts_per_page'        => '12',
        'orderby' => 'rand', //lay ngau nhien
        'tax_query'             => array(
            array(
                'taxonomy'      => 'product_cat',
                'field' => 'term_id', //This is optional, as it defaults to 'term_id'
                'terms'         => $category_id,
                'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
            ),
            array(
                'taxonomy'      => 'product_visibility',
                'field'         => 'slug',
                'terms'         => 'exclude-from-catalog', // Possibly 'exclude-from-search' too
                'operator'      => 'NOT IN'
            )
            ),
           
    ));
}


/**
 * Lấy sản phẩm đang giảm giá
 */
function getSaleProducts($args)
{
    return new WP_Query(array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'orderby' => 'ID',
        'order' => 'DESC',
        'posts_per_page' => 10,
        'meta_query'     => array(
            'relation' => 'OR',
            array(
                'key'           => '_sale_price',
                'value'         => 0,
                'compare'       => '>',
                'type'          => 'numeric'
            ),
            //xử lý đối với variable product
            array(
                'key'           => '_min_variation_sale_price',
                'value'         => 0,
                'compare'       => '>',
                'type'          => 'numeric'
            )
        )
    ));
}





function dk_page($template_name)
{
    $pages = get_posts([
        'post_type' => 'page',
        'post_status' => 'publish',
        'meta_query' => [
            [
                'key' => '_wp_page_template',
                'value' => 'templates/' . $template_name . '.php',
                'compare' => '='
            ]
        ]
    ]);
    if (!empty($pages)) {
        foreach ($pages as $pages__value) {
            return get_permalink($pages__value->ID);
        }
    }
    return get_bloginfo('url');
}

/**
 * @return string|void
 */
function dk_cart()
{
    do_action('dk_cart');
    if (isset($_GET['add-to-cart'])) {
        wp_redirect(dk_page('cart'));
        exit;
    }
    if (isset($_POST['update_cart'])) {
        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
            if (isset($_POST[$cart_item['product_id']]) && $_POST[$cart_item['product_id']] > 0 && $_POST[$cart_item['product_id']] != $cart_item['quantity']) {
                WC()->cart->set_quantity($cart_item_key, intval($_POST[$cart_item['product_id']]));
            }
        }
        return "Giỏ hàng đã được cập nhật.";
    } else {
        foreach (WC()->cart->get_cart() as $product_key => $product) {
            if (isset($_POST['remove_item-' . $product['product_id']])) {
                WC()->cart->remove_cart_item($product_key);
                return "Thực đơn đã được xóa.";
            }
        }
    }
}

/**
 * @param $address
 * @param $products
 * @param $note
 * @return WC_Order|WP_Error
 * @throws WC_Data_Exception
 */
function dk_create_order($address, $products, $note)
{
    $order = wc_create_order();

    $order->set_address($address, 'billing');
    foreach ($products as $product) {
        $order->add_product(wc_get_product($product['product_id']), $product['quantity']);
    }
    $order->set_customer_note($note);
    $order->calculate_totals();
    $order->update_status("Processing", 'Imported order', TRUE);
    $order->set_payment_method_title('Tiền mặt khi nhận hàng');

    foreach ($products as $cart_item_key => $cart_item) {
        WC()->cart->remove_cart_item($cart_item_key);
    }

    return $order;
}


//Hide admin bar for all users except administrators
add_filter( 'show_admin_bar', '__return_false' );