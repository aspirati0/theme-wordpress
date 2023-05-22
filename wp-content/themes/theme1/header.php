<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css" />
    <?php wp_head(); ?>
</head>
<body>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>

    <header>
        <?php the_custom_logo(); ?>
        <?php wp_nav_menu( array( 'theme_location' => 'primary-menu' ) ); ?>
        <p class="login">LOGIN / REGISTER</p>
        <div style="grid-gap: 7px">
            <img class="search" src="/wp-content/themes/theme1/assets/img/search.svg" style="width: 18px" />
            <div style="grid-gap: 7px">
                <img class="cart" src="/wp-content/themes/theme1/assets/img/cart.svg" style="width: 18px" />
                <p>$0.00</p>
            </div>
        </div>
    </header>