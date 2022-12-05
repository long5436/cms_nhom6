<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="<?php bloginfo('template_directory') ?>/img/fav-icon.png" type="image/x-icon" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php the_title(); ?></title>

    <!-- Icon css link -->
    <link href="<?php bloginfo('template_directory') ?>/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory') ?>/vendors/linearicons/style.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory') ?>/vendors/flat-icon/flaticon.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory') ?>/vendors/stroke-icon/style.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="<?php bloginfo('template_directory') ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Rev slider css -->
    <link href="<?php bloginfo('template_directory') ?>/vendors/revolution/css/settings.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory') ?>/vendors/revolution/css/layers.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory') ?>/vendors/revolution/css/navigation.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory') ?>/vendors/animate-css/animate.css" rel="stylesheet">

    <!-- Extra plugin css -->
    <link href="<?php bloginfo('template_directory') ?>/vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory') ?>/vendors/magnifc-popup/magnific-popup.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory') ?>/vendors/jquery-ui/jquery-ui.min.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory') ?>/vendors/nice-select/css/nice-select.css" rel="stylesheet">

    <link href="<?php bloginfo('template_directory') ?>/css/style.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory') ?>/css/responsive.css" rel="stylesheet">


    <?php wp_head() ?>
</head>

<body>

    <!--================Main Header Area =================-->
    <header class="main_header_area">
        <div class="top_header_area row m0">
            <div class="container">
                <div class="float-left">
                    <a href="javascript:void(0)"><i class="fa fa-phone" aria-hidden="true"></i> Nhóm 6</a>

                </div>
                <div class="float-right">

                    <ul class="h_search list_style">
                        <li class="shop_cart"><a data-count="<?php echo count( WC()->cart->get_cart() ) ?>"
                                href="<?php echo dk_page('cart') ?>"><i class="lnr lnr-cart"></i></a>
                        </li>
                        <li><a class="popup-with-zoom-anim" href="#test-search"><i class="fa fa-search"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="main_menu_area">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="/">
                        <img src="<?php bloginfo('template_directory') ?>/img/logo.png" alt="">
                    </a>

                    <?php //mytheme_logo() ?>

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="my_toggle_menu">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <ul class="navbar-nav justify-content-end">
                            <li class="dropdown submenu">
                                <a class="dropdown-toggle" href="/" role="button">Trang chủ</a>

                            </li>

                            <li class="dropdown submenu">
                                <a class="dropdown-toggle" href="<?php echo dk_page('cart') ?>" role="button">Giỏ
                                    hàng</a>

                            </li>
                            <li class="dropdown submenu">
                                <a class="dropdown-toggle" href="<?php echo dk_page('checkout') ?>" role="button">Thanh
                                    toán</a>

                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!--================End Main Header Area =================-->