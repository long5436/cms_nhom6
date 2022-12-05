<?php
/* Template Name: Checkout */
get_header();



$order = [];
if (isset($_POST['submit'])) {
    $products = WC()->cart->get_cart();
    $address = array(
        'first_name' => $_POST['firstName'],
        'last_name' => $_POST['lastName'],
        'company' => $_POST['companyName'],
        'email' => $_POST['email'],
        'phone' => $_POST['numberPhone'],
        'address_1' => $_POST['address'],
        'city' => $_POST['city'],
        'state' => $_POST['state'],
        'postcode' => $_POST['zip'],
        'country' => $_POST['state']
    );

    try {
        $order = dk_create_order($address, $products, $_POST['note']);
    } catch (WC_Data_Exception $e) {
        var_dump($e);
        die();
    }
}




?>

<!--================End Main Header Area =================-->
<section class="banner_area">
    <div class="container">
        <div class="banner_text">
            <h3>Chekout</h3>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="checkout.html">Chekout</a></li>
            </ul>
        </div>
    </div>
</section>
<!--================End Main Header Area =================-->

<!--================Billing Details Area =================-->
<?php
$products = WC()->cart->get_cart();
if (count($products) > 0) :
    $countries = WC()->countries->get_countries();


?>

<section class="billing_details_area p_100">
    <div class="container">

        <form action="<?php echo get_permalink(); ?>" method="post" class="row">
            <div class="col-lg-7">
                <div class="main_title">
                    <h2>Chi tiết hóa đơn</h2>
                </div>
                <div class="billing_form_area">
                    <div class="billing_form row"
                        action="http://galaxyanalytics.net/demos/cake/theme/cake-html/contact_process.php" method="post"
                        id="contactForm" novalidate="novalidate">
                        <div class="form-group col-md-6">
                            <label for="first">Tên *</label>
                            <input type="text" class="form-control" id="first" name="firstName" placeholder="Tên">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last">Họ *</label>
                            <input type="text" class="form-control" id="last" name="lastName" placeholder="Họ">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="company">Tên công ty (tùy chọn)</label>
                            <input type="text" class="form-control" id="company" name="companyName"
                                placeholder="Tên công ty">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="address">Địa chỉ *</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Địa chỉ">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="city">Thành phố *</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="Town /City">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="state1">Khu vực *</label>
                            <select class="product_select" id="state1" name="state">

                                <?php

foreach ($countries as $country) { ?>
                                <option>
                                    <?php
        echo $country;
        ?>
                                </option>
                                <?php
}
?>

                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="zip">Zip *</label>
                            <input type="text" class="form-control" id="zip" name="zip" placeholder="Postcode / Zip">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email *</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Email Address">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone">Số điện thoại *</label>
                            <input type="text" class="form-control" id="phone" name="numberPhone"
                                placeholder="Select an option">
                        </div>


                        <div class="form-group col-md-12">
                            <label for="phone">Ghi chú</label>
                            <textarea class="form-control" name="message" id="message" rows="1"
                                placeholder="Note about your order. e.g. special note for delivery"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="order_box_price">
                    <div class="main_title">
                        <h2>Đơn hàng của bạn</h2>
                    </div>
                    <div class="payment_list">
                        <div class="price_single_cost">
                            <h5>Sản phẩm <span>Giá tổng số</span></h5>
                            <?php
                                $products = WC()->cart->get_cart();
                                foreach ($products as $cart_item_key => $cart_item) :
                                    $product_data = $cart_item['data'];
                            ?>

                            <h5>
                                <?php echo $product_data->name; ?>
                                <span>
                                    <?php
                                        echo WC()->cart->get_product_subtotal($product_data, $cart_item['quantity']);
                                    ?>
                                </span>
                            </h5>

                            <?php 
                                endforeach;
                            ?>

                            <h3>Tổng cộng <span><?php echo WC()->cart->get_cart_total(); ?></span></h3>
                        </div>
                        <div id="accordion" class="accordion_area">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            thanh toán khi nhận hàng
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        Khi nhận hàng, kiếm tra hàng mới thanh toán
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse disable"
                                            data-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                            Check Payment (tính năng đang phát triển)
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        Make your payment directly into our bank account. Please use your Order ID
                                        as the payment reference. Your order won’t be shipped until the funds have
                                        cleared in our account.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse disable"
                                            data-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            Paypal (tính năng đang phát triển)
                                            <img src="img/checkout-card.png" alt="">
                                        </button>
                                        <a href="#">What is PayPal?</a>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        Make your payment directly into our bank account. Please use your Order ID
                                        as the payment reference. Your order won’t be shipped until the funds have
                                        cleared in our account.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="submit" value="submit" class="btn pest_btn">Đặt hàng</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!--================End Billing Details Area =================-->
<?php
else:

?>
<section>
    <div class="container">
        <div class="card">
            <div class="row p-fix">
                <div class="col-md-12 ">
                    <h3 class="text-center">
                        Đặt thực đơn thành công!
                    </h3>
                    <p>
                        Mã đơn hàng: <?php echo $order->get_order_number(); ?>
                    <p>
                        Ngày: <?php echo $order->get_date_created()->format('F j,Y – g:i A'); ?>
                    </p>
                    <p>
                        Email: <?php echo $order->get_billing_email(); ?>
                    </p>
                    <p>
                        Tồng cộng: $<?php echo $order->get_total(); ?>
                    </p>
                    <p>
                        Phương thức thanh toán: thanh toán khi nhận hàng
                    </p>

                </div>
                <div class="col-md-12">
                    <h3 class="text-center">
                        Chi tiết đơn hàng
                    </h3>
                </div>
                <div class="col-md-6">
                    <h4>
                        Chi tiết đơn hàng
                    </h4>
                    <p>
                        <?php
                            foreach ($order->get_items() as $item_id => $item) {
                                $product_name = $item->get_name();
                                $quantity = $item->get_quantity();
                                $subtotal = $item->get_subtotal();
                                ?>
                        <?php echo "<a href=''>" . $product_name . "</a> × " . $quantity . " | $" . $subtotal ?><br>
                        <?php
                            }
                            ?>
                    </p>
                    <p>
                        Giao hàng: <?php echo $order->get_shipping_to_display(); ?>
                    </p>
                    <p>
                        Phương thức thanh toán: <?php echo $order->get_payment_method_title(); ?>
                    </p>
                    <p>
                        Tổng số tiền: $<?php echo $order->get_total(); ?>
                    </p>
                </div>
                <div class="col-md-6">
                    <h4>
                        Địa chỉ thanh toán
                    </h4>
                    <p>

                        <?php echo $order->get_billing_last_name() . " " . $order->get_billing_first_name(); ?>
                    </p>
                    <p>
                        <?php echo $order->get_billing_address_1(); ?>
                    </p>
                    <p>
                        <?php echo $order->get_billing_city(); ?>
                    </p>
                    <p>
                        <?php echo $order->get_billing_country(); ?>
                    </p>
                    <p>
                        <?php echo $order->get_billing_phone(); ?>
                    </p>
                    <p>
                        <?php echo $order->get_billing_email(); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
endif;

// $productsCart = WC()->cart->get_cart();
// d(count($productsCart));
// if (count($productsCart) == 0)
// {
//     wp_redirect(dk_page('cart'));
// }

?>

<?php

get_footer();

?>