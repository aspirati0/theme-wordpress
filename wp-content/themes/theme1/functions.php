<?php

add_filter('show_admin_bar', '__return_false');


function enqueue_my_styles() {
    wp_enqueue_style( 'my-style', get_template_directory_uri() . '/assets/style.css', array(), '1.0.0', 'all' );
}
add_action('wp_enqueue_scripts', 'enqueue_my_styles' );

function my_theme_scripts() {
    wp_enqueue_script('jquery');    
    wp_enqueue_script('my-script', get_template_directory_uri() . '/js/script.js', array(), '1.0.0', true);
}
add_action( 'wp_enqueue_scripts', 'my_theme_scripts' );

add_theme_support( 'custom-logo' );

function register_my_menu() {
  register_nav_menu('primary-menu',__( 'Primary Menu' ));
}
add_action( 'init', 'register_my_menu' );

function mytheme_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Footer Widgets', 'theme1' ),
        'id'            => 'footer-widgets',
        'description'   => __( 'Add widgets here to appear in your footer.', 'theme1' ),
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'mytheme_widgets_init' );




class Custom_Footer_Widget extends WP_Widget {
  public function __construct() {
    parent::__construct(
      'Custom_Footer_Widget',
      'Custom_Footer_Widget',
      array( 'description' => 'Adds fields for editing logo and 4 text fields.' )
    );
  }
   public function widget( $args, $instance ) {
    echo '<div style="width: 269px; margin-top: 20px">';
    echo '<img src="' . $instance['logo'] . '" style="width: 110px; height: 40px" />';
    echo '<p style="font-family: \'Lora\'; font-style: normal; font-weight: 400; font-size: 14px; line-height: 20px; color: #777777; ">' . $instance['text'] . '</p>';
    echo '<ul style="list-style: none; padding-left: 0; ">';
    echo '<li style="grid-gap: 5px; font-family: \'Lora\'; font-style: normal; font-weight: 400; font-size: 14px; line-height: 20px; color: #777777; display: flex; align-items: center;"><img src="/wp-content/themes/theme1/assets/img/li1.png" />' . $instance['address'] . '</li>';
    echo '<li style="grid-gap: 5px; font-family: \'Lora\'; font-style: normal; font-weight: 400; font-size: 14px; line-height: 20px; color: #777777; display: flex; align-items: center;"><img src="/wp-content/themes/theme1/assets/img/li2.png" />' . $instance['phone'] . '</li>';
    echo '<li style="grid-gap: 5px; font-family: \'Lora\'; font-style: normal; font-weight: 400; font-size: 14px; line-height: 20px; color: #777777; display: flex; align-items: center;"><img src="/wp-content/themes/theme1/assets/img/li3.png" />' . $instance['fax'] . '</li>';
    echo '</ul>';
    echo '</div>';
  }
  public function form( $instance ) {
    $logo = ! empty( $instance['logo'] ) ? $instance['logo'] : '';
    $text = ! empty( $instance['text'] ) ? $instance['text'] : '';
    $address = ! empty( $instance['address'] ) ? $instance['address'] : '';
    $phone = ! empty( $instance['phone'] ) ? $instance['phone'] : '';
    $fax = ! empty( $instance['fax'] ) ? $instance['fax'] : '';
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'logo' ); ?>">Logo URL:</label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'logo' ); ?>" name="<?php echo $this->get_field_name( 'logo' ); ?>" type="text" value="<?php echo esc_attr( $logo ); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'text' ); ?>">Text:</label>
<input class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" type="text" value="<?php echo esc_attr( $text ); ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id( 'address' ); ?>">Address:</label>
<input class="widefat" id="<?php echo $this->get_field_id( 'address' ); ?>" name="<?php echo $this->get_field_name( 'address' ); ?>" type="text" value="<?php echo esc_attr( $address ); ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id( 'phone' ); ?>">Phone:</label>
<input class="widefat" id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>" type="text" value="<?php echo esc_attr( $phone ); ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id( 'fax' ); ?>">Fax:</label>
<input class="widefat" id="<?php echo $this->get_field_id( 'fax' ); ?>" name="<?php echo $this->get_field_name( 'fax' ); ?>" type="text" value="<?php echo esc_attr( $fax ); ?>" />
</p>
<?php
}
public function update( $new_instance, $old_instance ) {
 $instance = array();
 $instance['logo'] = ( ! empty( $new_instance['logo'] ) ) ? strip_tags( $new_instance['logo'] ) : '';
 $instance['text'] = ( ! empty( $new_instance['text'] ) ) ? strip_tags( $new_instance['text'] ) : '';
 $instance['address'] = ( ! empty( $new_instance['address'] ) ) ? strip_tags( $new_instance['address'] ) : '';
 $instance['phone'] = ( ! empty( $new_instance['phone'] ) ) ? strip_tags( $new_instance['phone'] ) : '';
 $instance['fax'] = ( ! empty( $new_instance['fax'] ) ) ? strip_tags( $new_instance['fax'] ) : '';
 return $instance;
}

}

function register_custom_footer_widget() {
    register_widget( 'Custom_Footer_Widget' );
}
add_action( 'widgets_init', 'register_custom_footer_widget' );

function my_recent_posts_widget() {
    register_widget( 'my_recent_posts' );
}
add_action( 'widgets_init', 'my_recent_posts_widget' );
 
class my_recent_posts extends WP_Widget {
 
    function __construct() {
        parent::__construct(
            'my_recent_posts',
            __('Recent Posts', 'theme1'),
            array(
                'description' => __( 'Displays recent posts with thumbnail image', 'theme1' ),
            )
        );
    }
 
    public function widget( $args, $instance ) {
    echo $args['before_widget'];
    if ( ! empty( $instance['title'] ) ) {
    $title = apply_filters( 'widget_title', $instance['title'] );
    echo '<h2 class="widget-title">'.$title.'</h2>';
}

    $recent_posts = wp_get_recent_posts(array(
        'numberposts' => 3,
        'post_status' => 'publish'
    ));
    if ($recent_posts) {
        echo '<div>';
        foreach ($recent_posts as $post) {
            $image = get_the_post_thumbnail_url($post['ID']);
            $title = get_the_title($post['ID']);
            $date = get_the_date('F j, Y', $post['ID']);

            $permalink = get_permalink($post['ID']);
            echo '<div style="display: flex; grid-gap: 15px; border-bottom: #dfdfdf solid 1px; padding-bottom: 10px; margin-bottom: 10px">';
if ($image) {
    echo '<img src="'.esc_url($image).'" style="width: 75px; height: 65px;" />';
}
echo '<div style="max-width: 60%;"><p style="font-family: \'Marcellus\'; font-style: normal; font-weight: 400; font-size: 14px; line-height: 20px; text-transform: uppercase; color: #242424; margin: 0"><a href="'.esc_url($permalink).'" style="color: #242424; display: block;">'.$title.'</a></p><p style="font-family: \'Lora\'; font-style: normal; font-weight: 400; font-size: 14px; line-height: 14px; color: #777777; margin-top: 8px">'.$date.'</p></div></div>';

            }
        echo '</div>';
    }
    echo $args['after_widget'];
}
 
    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Recent Posts', 'theme1' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'theme1' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php
    }
 
    public function update( $new_instance, $old_instance ) {
$instance['title'] = ! empty( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : '';
return $instance;
}
}

function register_my_recent_posts_widget() {
    register_widget( 'my_recent_posts' );
}
add_action( 'widgets_init', 'my_recent_posts_widget' );

class Links_Widget extends WP_Widget {

    public function __construct() {
        $widget_options = array(
            'classname' => 'links_widget',
            'description' => 'Links and stores',
        );
        parent::__construct( 'links_widget', 'Links Widget', $widget_options );
    }

    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        $store_title = isset( $instance['store_title'] ) ? $instance['store_title'] : 'OUR STORES';
        $useful_title = isset( $instance['useful_title'] ) ? $instance['useful_title'] : 'USEFUL LINKS';
        $stores = isset( $instance['stores'] ) ? $instance['stores'] : array();
        $links = isset( $instance['links'] ) ? $instance['links'] : array();

        echo $args['before_widget'];

        if ( ! empty( $title ) ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        echo '<div class="links">';
        echo '<h3 style="font-family: \'Marcellus\'; font-style: normal; font-weight: 400; font-size: 18px; padding-right: 20px; line-height: 25px; text-transform: uppercase; color: #000000; ">'.$store_title.'</h3>';
        echo '<ul style="list-style: none; padding-left: 0">';
        foreach ($stores as $store) {
            echo '<li>'.$store.'</li>';
        }
        echo '</ul>';
        echo '</div>';

        echo '<div class="links">';
        echo '<h3 style="font-family: \'Marcellus\'; font-style: normal; font-weight: 400; font-size: 18px; line-height: 25px; text-transform: uppercase; color: #000000; ">'.$useful_title.'</h3>';
        echo '<ul style="list-style: none; padding-left: 0">';
        foreach ($links as $link) {
            echo '<li>'.$link.'</li>';
        }
        echo '</ul>';
        echo '</div>';

        echo $args['after_widget'];
    }

    public function form( $instance ) {
        $title = isset( $instance['title'] ) ? $instance['title'] : '';
        $store_title = isset( $instance['store_title'] ) ? $instance['store_title'] : 'OUR STORES';
        $useful_title = isset( $instance['useful_title'] ) ? $instance['useful_title'] : 'USEFUL LINKS';
        $stores = isset( $instance['stores'] ) ? $instance['stores'] : array();
        $links = isset( $instance['links'] ) ? $instance['links'] : array();

        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input
                class="widefat"
                id="<?php echo $this->get_field_id( 'title' ); ?>"
                name="<?php echo $this->get_field_name( 'title' ); ?>"
                type="text"
                value="<?php echo esc_attr( $title ); ?>"
            >
        </p>
            <p>
        <label for="<?php echo $this->get_field_id( 'store_title' ); ?>"><?php _e( 'Stores Title:' ); ?></label>
        <input
            class="widefat"
            id="<?php echo $this->get_field_id( 'store_title' ); ?>"
            name="<?php echo $this->get_field_name( 'store_title' ); ?>"
            type="text"
            value="<?php echo esc_attr( $store_title ); ?>"
        >
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'useful_title' ); ?>"><?php _e( 'Useful Links Title:' ); ?></label>
        <input
            class="widefat"
            id="<?php echo $this->get_field_id( 'useful_title' ); ?>"
            name="<?php echo $this->get_field_name( 'useful_title' ); ?>"
            type="text"
            value="<?php echo esc_attr( $useful_title ); ?>"
        >
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'stores' ); ?>"><?php _e( 'Stores:' ); ?></label>
        <textarea
            class="widefat"
            rows="6"
            cols="20"
            id="<?php echo $this->get_field_id( 'stores' ); ?>"
            name="<?php echo $this->get_field_name( 'stores' ); ?>"
        ><?php echo esc_attr( implode( "\n", $stores ) ); ?></textarea>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'links' ); ?>"><?php _e( 'Links:' ); ?></label>
        <textarea
            class="widefat"
            rows="6"
            cols="20"
            id="<?php echo $this->get_field_id( 'links' ); ?>"
            name="<?php echo $this->get_field_name( 'links' ); ?>"
        ><?php echo esc_attr( implode( "\n", $links ) ); ?></textarea>
    </p>
    <?php
}

public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = isset( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['store_title'] = isset( $new_instance['store_title'] ) ? strip_tags( $new_instance['store_title'] ) : '';
    $instance['useful_title'] = isset( $new_instance['useful_title'] ) ? strip_tags( $new_instance['useful_title'] ) : '';
    $instance['stores'] = isset( $new_instance['stores'] ) ? explode( "\n", strip_tags( $new_instance['stores'] ) ) : array();
    $instance['links'] = isset( $new_instance['links'] ) ? explode( "\n", strip_tags( $new_instance['links'] ) ) : array();

    return $instance;
}
}

function register_links_widget() {
register_widget( 'Links_Widget' );
}

add_action( 'widgets_init', 'register_links_widget' );

?>

