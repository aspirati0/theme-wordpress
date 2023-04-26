﻿<?php get_header(); ?>

    <div class="block1">
        <h3><?php the_field('italicsubheading'); ?></h3>
        <h1><?php the_field('heading'); ?></h1>
        <p><?php the_field('text'); ?></p>
        <div class="buttons">
            <a href="<?php the_field('shop_now_url'); ?>"><button class="whitebutton"><?php the_field('shop_now'); ?></button></a>
            <a href="<?php the_field('view_more_url'); ?>"><button class="blackbutton"><?php the_field('view_more'); ?></button></a>
        </div>
    </div>

    <div class="block2">
        <img src="<?php the_field('image'); ?>" />
        <div>
            <h3><?php the_field('italic_subheading_block2'); ?></h3>
            <h1 style="max-width: 50%"><?php the_field('heading_block2'); ?></h1>
            <p><?php the_field('text_block2'); ?></p>
            <div class="buttons">
                <a href="<?php the_field('shop_now_url_block2'); ?>"><button class="button1"><?php the_field('shop_now_block2'); ?></button></a>
                <a href="<?php the_field('view_more_url_block2'); ?>"><button class="button2"><?php the_field('view_more_block2'); ?></button></a>
            </div>
        </div>
    </div>

    <div class="block3">
        <div class="heading">
            <h3><?php the_field('italic_subheading_block3'); ?></h3>
            <h1><?php the_field('heading_block3'); ?></h1>
            <p><?php the_field('text_block3'); ?></p>
        </div>

        <div class="featured">
            <div class="category">
                <?php
                $category = get_term_by('slug', 'category-1', 'product_cat');
                ?>
                <h1><?php echo $category->name; ?></h1>
                <p><?php echo $category->description; ?></p>
            </div>

            <div class="slider">
                <?php
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => get_field('number_of_featured_products'),
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field' => 'slug',
                            'terms' => 'category-1',
                            'operator' => 'IN'
                        )
                    )
                );
                $products = get_posts($args);
                foreach ($products as $product) {
                    setup_postdata($product);
                    ?>
                    <div>
                        <?php woocommerce_template_loop_product_thumbnail() ?>
                        <p style="font-weight: 400; font-family: 'Marcellus', serif; color: #242424;"><?php echo $product->get_name(); ?></p>
                        <p style=" font-weight: 400; font-family: 'Lora', sans-serif; color: #777777;"><?php $terms = get_the_terms( $product->get_id(), 'product_cat' );
if ( $terms && ! is_wp_error( $terms ) ) {
    $single_cat = array_shift( $terms );
    echo $single_cat->name;
  } ?></p>
                        <p style="font-weight: 700; font-family: 'Lora', sans-serif; color: #C3935B;"><?php echo wc_price(wc_get_price_including_tax($product)); ?></p>
                    </div>
                    <?php
                }
                wp_reset_postdata();
                ?>
            </div>
    </div>

    <style>
            .featured > .category {
                background-image: url('<?php echo wp_get_attachment_url( get_term_meta( $category->term_id, 'thumbnail_id', true ) ); ?>');
            }
    </style>

    <div class="featured">
            <div class="category category1">
                <?php
                $category = get_term_by('slug', 'category-2', 'product_cat');
                ?>
                <h1 style="color: white"><?php echo $category->name; ?></h1>
                <p style="color: white"><?php echo $category->description; ?></p>
            </div>

            <div class="slider">
                <?php
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => get_field('number_of_featured_products_1'),
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field' => 'slug',
                            'terms' => 'category-2',
                            'operator' => 'IN'
                        )
                    )
                );
                $products = get_posts($args);
                foreach ($products as $product) {
                    setup_postdata($product);
                    ?>
                    <div>
                        <?php woocommerce_template_loop_product_thumbnail() ?>
                        <p style="font-weight: 400; font-family: 'Marcellus', serif; color: #242424;"><?php echo $product->get_name(); ?></p>
                        <p style=" font-weight: 400; font-family: 'Lora', sans-serif; color: #777777;"><?php $terms = get_the_terms( $product->get_id(), 'product_cat' );
if ( $terms && ! is_wp_error( $terms ) ) {
    $single_cat = array_shift( $terms );
    echo $single_cat->name;
  } ?></p>
                        <p style="font-weight: 700; font-family: 'Lora', sans-serif; color: #C3935B;"><?php echo wc_price(wc_get_price_including_tax($product)); ?></p>
                    </div>
                    <?php
                }
                wp_reset_postdata();
                ?>
            </div>
    </div>

    <style>
            .featured > .category1 {
                background-image: url('<?php echo wp_get_attachment_url( get_term_meta( $category->term_id, 'thumbnail_id', true ) ); ?>');
            }
    </style>
        
    </div>

    <div class="block4">
        <img src="<?php the_field('image_block4'); ?>" style="width: 581px; height: 327px;"/>
        <div>
            <h3><?php the_field('italic_subheading_block4'); ?></h3>
            <h1><?php the_field('heading_block4'); ?></h1>
            <h2><?php the_field('subheading_block4'); ?></h2>
            <p><?php the_field('text_block4'); ?></p>
            <a href="<?php the_field('check_now_url_block4'); ?>"><button class="button1"><?php the_field('check_now_block4'); ?></button></a>
        </div>
    </div>

    <div class="block4">
        <img src="<?php the_field('image_block5'); ?>" style="width: 585px; height: 520px; order: 2"/>
        <div style="order: 1">
            <div class="heading" style="display: flex; grid-gap: 15px"><h1><?php the_field('heading_block5'); ?></h1><h1 style="color: #C3935B"><?php the_field('percent'); ?>%</h1></div>
            <h2><?php the_field('subheading_block5'); ?></h2>
            <p><?php the_field('text_block5'); ?></p>
            <ul>
                <li><img src="/wp-content/themes/theme1/assets/img/li.png" style="width: 21px" /><?php the_field('list_element_1'); ?></li>
                <li><img src="/wp-content/themes/theme1/assets/img/li.png" style="width: 21px" /><?php the_field('list_element_2'); ?></li>
                <li><img src="/wp-content/themes/theme1/assets/img/li.png" style="width: 21px" /><?php the_field('list_element_3'); ?></li>
                <li><img src="/wp-content/themes/theme1/assets/img/li.png" style="width: 21px" /><?php the_field('list_element_4'); ?></li>
            </ul>
            <a href="<?php the_field('shop_now_url_block5'); ?>"><button class="button1"><?php the_field('shop_now_block5'); ?></button></a>
            <a href="<?php the_field('view_more_url_block5'); ?>"><button class="button2"><?php the_field('view_more_block5'); ?></button></a>
        </div>
    </div>

    <style>
        .block5 > .first {
            background: url(<?php the_field('background_image_url'); ?>) no-repeat;
        }
    </style>

    <div class="block5">
        <div class="first">
            <h3><?php the_field('italic_subheading_block6'); ?></h3>
            <h1><?php the_field('heading_block6'); ?></h1>
            <h2><?php the_field('text_block6'); ?></h2>
            <a href="<?php the_field('view_more_url_block6'); ?>"><button class="button1" style="margin-top: 30px"><?php the_field('view_more_block6'); ?></button></a>
        </div>

        <div class="second">
            <h2>Featured products</h2>
            <?php
$args = array(
    'post_type' => 'product',
    'posts_per_page' => 3,
    'tax_query' => array(
        array(
            'taxonomy' => 'product_cat',
            'field' => 'slug',
            'terms' => 'category-1',
        ),
    ),
);

$products = new WP_Query( $args );
if ( $products->have_posts() ) :
?>
    <div style="display: flex; flex-direction: column; grid-gap: 17px">
        <?php while ( $products->have_posts() ) : $products->the_post(); ?>
        <div style="display: flex; grid-gap: 17px">
            <?php the_post_thumbnail( 'thumbnail', array( 'style' => 'width: 65px; height: 65px;' ) ); ?>
            <div>
                <p style="font-family: 'Marcellus'; font-style: normal; font-weight: 400; font-size: 14px; line-height: 16px; color: #242424; margin: 0"><?php the_title(); ?></p>
                <p style="font-family: 'Lora'; font-style: normal; font-weight: 700; font-size: 14px; line-height: 16px; color: #C3935B; margin-top: 10px"><?php echo wc_price( get_post_meta( get_the_ID(), '_price', true ) ); ?></p>
            </div>
        </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    </div>
<?php endif; ?>


        </div>

        <div class="second">
            <h2>New products</h2>
            <?php

$args = array(
    'post_type' => 'product',
    'posts_per_page' => 3,
    'orderby' => 'date',
    'order' => 'DESC',
);


$products = new WP_Query( $args );
if ( $products->have_posts() ) :
?>
    <div style="display: flex; flex-direction: column; grid-gap: 17px">
        <?php while ( $products->have_posts() ) : $products->the_post(); ?>
        <div style="display: flex; grid-gap: 17px">
            <?php the_post_thumbnail( 'thumbnail', array( 'style' => 'width: 65px; height: 65px;' ) ); ?>
            <div>
                <p style="font-family: 'Marcellus'; font-style: normal; font-weight: 400; font-size: 14px; line-height: 16px; color: #242424; margin: 0"><?php the_title(); ?></p>
                <p style="font-family: 'Lora'; font-style: normal; font-weight: 700; font-size: 14px; line-height: 16px; color: #C3935B; margin-top: 10px"><?php echo wc_price( get_post_meta( get_the_ID(), '_price', true ) ); ?></p>
            </div>
        </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    </div>
<?php endif; ?>
        </div>

    </div>

    <div class="block6">
        <div class="heading">
            <h3><?php the_field('italic_subheading_block7'); ?></h3>
            <h1><?php the_field('heading_block7'); ?></h1>
            <p><?php the_field('text_block7'); ?></p>
        </div>

        <style>
        .slider2 > img {
            width: 100%; 
            max-height: 280px;
        }
        </style>

        <?php $blog_posts = new WP_Query( array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
    'meta_query'     => array(
        array(
            'key'     => 'include_in_slider',
            'value'   => '1',
            'compare' => '=',
        ),
    ),
) ); ?>

        <style>
            .slider2 > div > img {
            width: 345px;
            height: 261px;
        }
            .author > img {
                width: 20px; 
                height: 20px;
            }
            .category-post > a {
                font-family: 'Lora'; font-style: normal; font-weight: 400; font-size: 12px; line-height: 25px; text-align: center; text-transform: uppercase; color: #FFFFFF; text-decoration: none;
            }
        </style>

        <div class="slider2">
        <?php while ( $blog_posts->have_posts() ) : $blog_posts->the_post(); ?>
            <div style="height: fit-content; align-items: center; width: 345px">
                <?php the_post_thumbnail( get_the_ID(), 'full' ); ?>
                <div style="position: relative; bottom: 250px; right: 130px; z-index: 3; background: white; width: 46px; height: 51px; display: flex; flex-direction: column; align-items: center; justify-content: center">
    <p style="margin: 0; font-family: 'Lora'; font-style: normal; font-weight: 400; font-size: 24px; line-height: 25px; color: #242424;"><?php echo get_the_date('d'); ?></p>
    <p style="margin: 0; font-family: 'Lora'; font-style: normal; font-weight: 400; font-size: 13px; line-height: 15px; color: #242424; "><?php echo get_the_date('M'); ?></p>
</div>

                <div style="position: relative; bottom: 70px; padding: 3px 10px; height: 25px; width: 150px; background: #C3935B; " class="category-post"><?php the_category(', '); ?></div>
                <h3 style="margin-top: -55px; max-width: 90%; font-family: 'Marcellus'; font-style: normal; font-weight: 400; font-size: 24px; line-height: 35px; text-transform: uppercase; margin-bottom: 0;"><?php the_title(); ?></h3>
                <div class="author" style="display: flex; align-items: center; grid-gap: 5px; font-family: 'Lora'; font-style: normal; font-weight: 400; font-size: 14px; line-height: 20px; text-align: center; color: rgba(119, 119, 119, 0.5); margin-top: 10px; margin-bottom: 10px">Posted by<?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?><?php echo get_the_author() ?></div>
                <p style="max-width: 90%; font-family: 'Lora'; font-style: normal; font-weight: 400; font-size: 14px; line-height: 25px; text-align: center; color: #777777; margin: 0"><?php echo wp_strip_all_tags( get_the_excerpt() ); ?></p>
                <p style="max-width: 90%; font-family: 'Lora'; font-style: normal; font-weight: 500; font-size: 14px; line-height: 25px; text-align: center; text-transform: uppercase; color: #C3935B; margin-top: 20px;">
                <a href="<?php echo get_permalink(); ?>" style="text-decoration: none; color: #C3935B;">Continue reading</a></p>

            </div>
        <?php endwhile; ?>
        </div>
    </div>

    <?php get_footer(); ?>
