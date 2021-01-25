<?php
/*This file is part of shopping mart child theme.

All functions of this file will be loaded before of parent theme functions.
Learn more at https://codex.wordpress.org/Child_Themes.

Note: this function loads the parent stylesheet before, then child theme stylesheet, leave it in place unless you know what you are doing.
*/

define('EASY_STOREFRONT_TEMPLATE_DIR_URI', get_stylesheet_directory_uri());
define('EASY_STOREFRONT_THEME_REVIEW_URL', 'https://wordpress.org/themes/easy-storefront/');
define('EASY_STOREFRONT_THEME_DOC', 'https://www.ceylonthemes.com/wp-tutorials/');
define('EASY_STOREFRONT_THEME_URI', 'https://www.ceylonthemes.com/product/wordpress-storefront-theme/');

/* allowed html tags */

$easy_storefront_allowed_html = array(
		'a'          => array(
			'href'  => true,
			'title' => true,
			'class'  => true,
		),
		'option'          => array(
			'selected'  => true,
			'value' => true,
			'class'  => true,
		),
		'p'          => array(
			'class'  => true,
		),
		'abbr'       => array(
			'title' => true,
		),
		'acronym'    => array(
			'title' => true,
		),
		'b'          => array(),
		'blockquote' => array(
			'cite' => true,
		),
		'cite'       => array(),
		'code'       => array(),
		'del'        => array(
			'datetime' => true,
		),
		'em'         => array(),
		'i'          => array(),
		'q'          => array(
			'cite' => true,
		),
		's'          => array(),
		'strike'     => array(),
		'strong'     => array(),
	);


//add new settings
require  get_stylesheet_directory().'/inc/settings.php';
require   get_stylesheet_directory().'/inc/google-fonts.php';
require   get_stylesheet_directory().'/inc/woocommerce-functions.php';

add_action( 'wp_enqueue_scripts', 'easy_storefront_styles' );

function easy_storefront_styles() {
	//enqueue parent styles
	wp_enqueue_style( 'easy-storefront-parent-styles', get_template_directory_uri().'/style.css' );
	wp_enqueue_style( 'easy-storefront-styles', get_stylesheet_directory_uri(). '/style.css', array('easy-storefront-parent-styles'));
}

add_action( 'after_setup_theme', 'easy_storefront_default_header' );
/**
 * Add Default Custom Header Image To Twenty Fourteen Theme
 *
 * @return void
 */
function easy_storefront_default_header() {

    add_theme_support(
        'custom-header',
        apply_filters(
            'easy_storefront_custom_header_args',
            array(
                'default-text-color' => '#ffffff',
                'default-image' => get_stylesheet_directory_uri() . '/images/header.jpg',
				'width'              => 1280,
				'height'             => 300,
				'flex-width'         => true,
				'flex-height'        => true,
            )
        )
    );
}

// get_parent theme settings and override with child theme settings
$easy_storefront_settings = new new_york_business_settings();
$easy_storefront_option = wp_parse_args(  get_option( 'new_york_business_option', array() ) , $easy_storefront_settings->default_data());

/**
 * override parent admin notice
 **/
function new_york_business_general_admin_notice(){ }


function easy_storefront_general_admin_notice(){

         $msg = sprintf('<div data-dismissible="disable-done-notice-forever" class="notice notice-info is-dismissible" ><p>
             	<a href=%1$s target="_blank"  style="text-decoration: none;" class="button button-primary"> %2$s </a>
			 	<a href=%3$s target="_blank"  style="text-decoration: none; margin-left:10px;" class="button">%4$s</a>
			 	<a href="?easy_storefront_admin_notice" target="_self"  style="text-decoration: none; margin-left:10px;" class="button button-secondary">%5$s</a>
			 	&nbsp;<strong>%6$s</strong></p></div>',
				esc_url(EASY_STOREFRONT_THEME_REVIEW_URL),
				esc_html__('Rate Us','easy-storefront'),
				esc_url(EASY_STOREFRONT_THEME_DOC),
				esc_html__('Tutorial & Free Demo','easy-storefront'),
				esc_html__('Dismiss', 'easy-storefront'),
				esc_html__('1) Customize -> Theme Option customize Slider, Navigation, Banner sections, Header Widgets. 2) Use a page builder and Drag and drop Theme:Product Categories widget. Use free demo content and start editing.', 'easy-storefront'));
		 echo wp_kses_post($msg);
}


if ( isset( $_GET['easy_storefront_admin_notice'] ) ){
	$easy_storefront_option['admin_notice'] = '-1';
	update_option('new_york_business_option', $easy_storefront_option);
}

$easy_storefront_refreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && ($_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0'
||  $_SERVER['HTTP_CACHE_CONTROL'] == 'no-cache');

if($easy_storefront_option['admin_notice'] !='-1' && !$easy_storefront_refreshed){
	add_action('admin_notices', 'easy_storefront_general_admin_notice');
}

/**
 * override parent theme customize control
 */
if ( class_exists( 'WP_Customize_Control' )) {

	class new_york_business_pro_Control extends WP_Customize_Control {

		public function render_content() {
			?>
			<p style="padding:5px;background-color:#8080FF;color:#FFFFFF;text-align: center;"><a href="<?php echo esc_url(EASY_STOREFRONT_THEME_URI); ?>" target="_blank" style="color:#FFFFFF"><?php echo esc_html__('See Premium Features', 'easy-storefront'); ?></a></p>
			<?php
		}
	}

}


/**
 * Override custom fonts functions of parent theme.
 */

 delete_option('body_fontfamily');

function new_york_business_fonts_url() {
	$fonts_url = '';
	/*
	 * Translators: If there are characters in your language that are not
	 * supported by "Open Sans", sans-serif;, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$typography = _x( 'on', 'Open Sans font: on or off', 'easy-storefront' );

	if ( 'off' !== $typography ) {
		$font_families = array();

		$font_families[] = get_theme_mod('header_fontfamily','Google Sans').':300,400,500';
		$font_families[] = get_theme_mod('body_fontfamily','Lora').':300,400,500';


		$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

	}

	return esc_url( $fonts_url );

}
add_action('after_setup_theme', 'new_york_business_fonts_url');

//call custom fonts
add_action('after_setup_theme', 'new_york_business_custom_fonts_css');


//header_background

add_action( 'customize_register', 'easy_storefront_customizer_settings' );

function easy_storefront_customizer_settings( $wp_customize ) {


	//banner section
	$wp_customize->add_section( 'top_banner' , array(
		'title'      => __( 'Top Banner', 'easy-storefront' ),
		'priority'   => 1,
		'panel' => 'theme_options',
	) );

	//top banner
	$wp_customize->add_setting('new_york_business_option[top_banner_page]' , array(
		'default'    => 0,
		'sanitize_callback' => 'absint',
		'type'=>'option',

	));

	$wp_customize->add_control('new_york_business_option[top_banner_page]' , array(
		'label' => __('Select Top banner (Page)', 'easy-storefront' ),
		'section' => 'top_banner',
		'type'=> 'dropdown-pages',
	) );

	//widgets section
	$wp_customize->add_section( 'home_widgets' , array(
		'title'      => __( 'Home Header Widgets', 'easy-storefront' ),
		'priority'   => 1,
		'panel' => 'theme_options',
	) );

	//top banner
	$wp_customize->add_setting('new_york_business_option[top_widgets]' , array(
		'default'    => 'col-sm-12',
		'sanitize_callback' => 'new_york_business_sanitize_select',
		'type'=>'option',

	));

	$wp_customize->add_control('new_york_business_option[top_widgets]' , array(
		'label' => __('Select Number of Widgets', 'easy-storefront' ),
		'section' => 'home_widgets',
		'type'=>'select',
		'choices'=>array(
			'col-sm-12'=> __('1 Widgets', 'easy-storefront' ),
			'col-sm-6'=> __('2 Widgets', 'easy-storefront' ),
			'col-sm-4'=> __('3 Widgets', 'easy-storefront' ),
			'col-sm-3'=> __('4 Widgets', 'easy-storefront' ),
			'col-sm-2'=> __('6 Widgets', 'easy-storefront' ),
		),
	) );

}

//override parent theme functions
function new_york_business_footer_foreground_css(){

	$color =  esc_attr(get_theme_mod( 'footer_foreground_color', '#191919')) ;

	/**
	 *
	 * @since easy-storefront 1.0
	 *
	 */

	$css                = '
	
	.footer-foreground {}
	.footer-foreground .widget-title, 
	.footer-foreground a, 
	.footer-foreground p, 
	.footer-foreground td,
	.footer-foreground th,
	.footer-foreground caption,
	.footer-foreground li,
	.footer-foreground h1,
	.footer-foreground h2,
	.footer-foreground h3,
	.footer-foreground h4,
	.footer-foreground h5,
	.footer-foreground h6,
	.footer-foreground .site-info a
	{
	  color:'.$color.';
	}
	
	.footer-foreground #today {
		font-weight: 600;	
		background-color: #3ba0f4;	
		padding: 5px;
	}
	
	.footer-foreground a:hover, 
	.footer-foreground a:active {
		color:#ccc ;
	}
	
	';

return $css;

}


//add child theme widget area

function easy_storefront_widgets_init(){

	/* header sidebar */
	global $easy_storefront_option;

	register_sidebar(
		array(
			'name'          => __( 'Home Page Header Widgets', 'easy-storefront' ),
			'id'            => 'header-banner',
			'description'   => __( 'Add widgets to appear in Header.', 'easy-storefront' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s '.$easy_storefront_option['top_widgets'].' text-center">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

}
add_action( 'widgets_init', 'easy_storefront_widgets_init' );


/* customize settings*/
add_action( 'customize_register', 'easy_storefront_customize_register'); //second argument is arbitrary, but cannot have hyphens because php does not allow them in function names.

function easy_storefront_customize_register( $wp_customize ) {

	require  get_stylesheet_directory().'/inc/slider-options.php';

}


////////////////////
/**
 * Register the 'Custom Column' column in the importer.
 *
 * @param array $options
 * @return array $options
 */
function add_column_to_importer( $options ) {

	// column slug => column name
	$options['currency_type'] = 'Тип валюты';

	return $options;
}
add_filter( 'woocommerce_csv_product_import_mapping_options', 'add_column_to_importer' );

/**
 * Add automatic mapping support for 'Custom Column'.
 *
 * @param array $columns
 * @return array $columns
 */
function add_column_to_mapping_screen( $columns ) {

	// potential column name => column slug
	$columns['Тип валюты'] = 'currency_type';
	$columns['тип валюты'] = 'currency_type';

	return $columns;
}
add_filter( 'woocommerce_csv_product_import_mapping_default_columns', 'add_column_to_mapping_screen' );

function price_recount($origin_price, $currency_type) {
    $lines = file($_SERVER['HTTP_ORIGIN'] . '/currency/currency.txt');
    $custom_price = '';
    if ($lines && $origin_price) {
        if ($currency_type == "USD") {
            $custom_price = $origin_price * $lines[0];
        }
        else if ($currency_type == "EUR") {
            $custom_price = $origin_price * $lines[1];
        }
        else {
            $custom_price = $origin_price;
        }
        $custom_price = round($custom_price, 2);
    }
    return $custom_price;
}

/**
 * Process the data read from the CSV file.
 * This just saves the value in meta data, but you can do anything you want here with the data.
 *
 * @param WC_Product $object - Product being imported or updated.
 * @param array $data - CSV data read for the product.
 * @return WC_Product $object
 */
function process_import( $object, $data ) {

    $currency_type = $data['currency_type'];
    $regular_price = $object->get_regular_price();
    $sale_price    = $object->get_sale_price();

	if ( ! empty( $currency_type ) ) {
		$object->update_meta_data( 'currency_type', $currency_type );
	}

	$object->update_meta_data('origin_price', $regular_price);
	$object->update_meta_data('origin_sale_price', $sale_price);
    $origin_price      = $object->get_meta('origin_price');
    $origin_sale_price = $object->get_meta('origin_sale_price');

    $custom_price      = price_recount($origin_price, $currency_type);
    $custom_sale_price = price_recount($origin_sale_price, $currency_type);
    error_log($custom_sale_price);
    $object->set_regular_price($custom_price);
    $object->set_sale_price($custom_sale_price);

	return $object;
}
add_filter( 'woocommerce_product_import_pre_insert_product_object', 'process_import', 10, 2 );


// Добавляем поля "Тип валюты" и "Цена в валюте" в свойства товара в админке.
function wc_myprice_product_field() {
    global $post;

    woocommerce_wp_text_input(array(
            'id'                => '_origin_price',
            'label'             => __( 'Цена в валюте', 'woocommerce' ),
            'type'              => 'number',
            'value'             => $post->origin_price
        )
    );
    woocommerce_wp_text_input(array(
            'id'                => '_origin_sale_price',
            'label'             => __( 'Цена распродажи в валюте', 'woocommerce' ),
            'type'              => 'number',
            'value'             => $post->origin_sale_price
        )
    );

    woocommerce_wp_select( array(
            'id'    => '_currency_type',
            'class' => 'short',
            'label' => __( 'Тип валюты', 'woocommerce' ),
            'value' => $post -> currency_type,
            'options' => array(
                'RUB'   => __( 'RUB', 'woocommerce' ),
                'EUR'   => __( 'EUR', 'woocommerce' ),
                'USD'   => __( 'USD', 'woocommerce' ),
        )
    ));
}
add_action( 'woocommerce_product_options_pricing', 'wc_myprice_product_field' );

// Обновляем значение цены в валюте и типа валюты при сохранении/обновлении товара, и пересчитываем цену.
function wc_myprice_save_product( $product_id ) {
    if ($_POST['_currency_type'] <> get_post_meta($product_id, 'currency_type')[0]) {
        update_post_meta( $product_id, 'currency_type', $_POST['_currency_type'] );
        $currency_type = get_post_meta($product_id, 'currency_type')[0];
        $origin_price = get_post_meta($product_id, 'origin_price')[0];
        $origin_sale_price = get_post_meta($product_id, 'origin_sale_price')[0];

        $custom_price = price_recount($origin_price, $currency_type);
        $custom_sale_price = price_recount($origin_sale_price, $currency_type);
        update_post_meta($product_id, '_regular_price', $custom_price);
        update_post_meta($product_id, '_sale_price', $custom_sale_price);
//        update_post_meta($product_id, '_price', $custom_price);
    }

    $currency_type = get_post_meta($product_id, 'currency_type')[0];
    if ($_POST['_origin_price'] <> get_post_meta($product_id, 'origin_price')[0]) {
        update_post_meta($product_id, 'origin_price', $_POST['_origin_price']);
        $origin_price = get_post_meta($product_id, 'origin_price')[0];

        $custom_price = price_recount($origin_price, $currency_type);
        update_post_meta($product_id, '_regular_price', $custom_price);
        update_post_meta($product_id, '_price', $custom_price);
    }
    if ($_POST['_origin_sale_price'] <> get_post_meta($product_id, 'origin_sale_price')[0]) {
        update_post_meta($product_id, 'origin_sale_price', $_POST['_origin_sale_price']);
        $origin_sale_price = get_post_meta($product_id, 'origin_sale_price')[0];

        $custom_price = price_recount($origin_sale_price, $currency_type);
        update_post_meta($product_id, '_sale_price', $custom_price);
        update_post_meta($product_id, '_price', $custom_price ? $custom_price : get_post_meta($product_id, '_regular_price')[0]);
    }
}
add_action( 'save_post', 'wc_myprice_save_product' );

// Регистрируем колонку 'Тип валюты' и 'Цена валюты', в таблице товаров в админке
add_filter( 'manage_product_posts_columns', function ( $columns ) {
    $my_columns = [
            'origin_price' => 'Цена валюты',
            'currency_type' => 'Тип валюты'
    ];
    return $my_columns;
} );

// Выводим контент для зарегистрированных колонок в таблице.
add_filter( 'manage_product_posts_custom_column', function ( $column_name ) {
    global $post;

    if ( $column_name === 'origin_price' ) {
        echo ($post -> origin_price);
    }

    if ( $column_name === 'currency_type' ) {
        echo ($post -> currency_type);
    }
} );

add_action( 'woocommerce_before_add_to_cart_form', function() {
    echo '<span class="stockTip">О наличии товара уточняйте у менеджера</span>';
} );

/* //Скрываем SKU, категорию на странице продукта
add_action( 'after_setup_theme', 'my_after_setup_theme' );
function my_after_setup_theme() {
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
} */
