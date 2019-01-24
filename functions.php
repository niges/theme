<?php 

add_theme_support( 'post-thumbnails' );

function my_style_script() {

	wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css' );
	wp_enqueue_style( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', array(), '3.3.7' );
	wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), '3.3.7', true );
}

add_action( 'wp_enqueue_scripts', 'my_style_script' );

function register_my_menu() {
	register_nav_menus(array(
		'header_menu' =>__('Header Menu'),
		'extra-menu' => __( 'Extra Menu' ),

	));
}
add_action( 'init', 'register_my_menu' );

function my_custom_sidebar() {
	register_sidebar(
		array(
			'name'=>__('Custom','your-theme-domain'),
			'id'=>'custom-side-bar',
			'description'=>__('Custom sidebar','your-theme-domain'),
			'before-widget'=>'<div class="widget-content">',
			'after-widget'=>'</div>',
			'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
		)
	);
	register_sidebar( array(

		'name'=>'Footer Sidebar',
		'id'  => 'footer-sidebar',
		'description' => 'appears in the footer',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

	register_sidebar( array(
		'name'=>'footer',
		'id'=>'footer-2',
		'description'=>'Copyright footer',
		'before_widget'=>'<aside id="%1s" class="widget %2s">',
		'after_widget'=>'</aside>',
		'before_title'=>'<h3 class="widget-title">',
		'after_title'=>'</h3>',

	));
}

add_action( 'widgets_init','my_custom_sidebar');


function add_custom_menu() {
	add_menu_page( 'Custom Settings', 'Custom Settings', 'manage_options', 'custom_settings', 'custom_settings_per_page', 'null', 99 );
}
add_action( 'admin_menu','add_custom_menu' );

function custom_settings_per_page() { ?>
	<h1>Custom Menu</h1>
	<form method="post" action="option.php">
		<?php
			settings_fields( 'section' );
			do_settings_sections( 'theme-options' );
			submit_button();

		?>
	</form>
<?php }

function setting_twitter() { ?>
	<input type="text" name="twitter" id="twitter" value="<?php echo get_option( 'twitter' ); ?>"">
<?php }

function custom_settings_page_setup() {
  add_settings_section( 'section', 'All Settings', null, 'theme-options' );
  add_settings_field( 'twitter', 'Twitter URL', 'setting_twitter', 'theme-options', 'section' );


  register_setting('section', 'twitter');
}
add_action( 'admin_init', 'custom_settings_page_setup' );

function create_my_custom_post() {
	register_post_type( 'my-custom-post',array(
		'labels' => array(
				'name' => __( 'My Custom Post' ),
				'singular_name' => __( 'My Custom Post' ),
		),
		'public' => true,
		'has_archive' => true,
		'supports' => array(
				'title',
				'editor',
				'thumbnail',
		)
	));
}
add_action( 'init', 'create_my_custom_post' );

// function wp_filter( $title ) {
// 	return 'Hooked:'.$title;
// }

// add_filter( 'the_title', 'wp_filter' );

function new_shortcode() {
	echo 'hello world is the shortcode';
}
add_shortcode( 'hello', 'new_shortcode' );

function wpdocs_excerpt_more( $more ) {
    if ( ! is_single() ) {
        $more = sprintf( '<a class="read-more" href="%1$s">%2$s</a>',
            get_permalink( get_the_ID() ),
            __( 'Read More', 'textdomain' )
        );
    }
 
    return $more;
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

