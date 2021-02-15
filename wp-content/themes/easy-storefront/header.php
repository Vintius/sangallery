<?php
/**
 * The header
 * @package easy-storefront
 * @since 1.0
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <?php
    wp_head();
    //get settings array
    global $new_york_business_option;
    if (class_exists('WP_Customize_Control')) {
      $new_york_business_default_settings = new new_york_business_settings();
      $new_york_business_option = wp_parse_args(get_option('new_york_business_option', array()), $new_york_business_default_settings->default_data());
    }
  ?>
</head>
<body <?php body_class(); ?> >
  <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'easy-storefront'); ?></a>

  <?php
    if (function_exists('wp_body_open')) {
      wp_body_open();
    } else {
      do_action('wp_body_open');
    }
  ?>

  <?php get_template_part('template-parts/header/search', 'modal-dialog'); ?>

  <div id="page" class="site">
    <?php
      if ($new_york_business_option['box_layout']) {
        echo '<div class="wrap-box">';
      }
      if (is_front_page() && $new_york_business_option['top_banner_page'] != 0) {
      	get_template_part('templates/banner', 'section');
      }
    ?>

    <header id="masthead" class="site-header site-header-background <?php if (!class_exists('WooCommerce')) {echo 'no-searchbar';} ?>" role="banner">
      <?php
        get_template_part('template-parts/header/header', 'mini', array(
          'data' => array(
            'new_york_business_option' => $new_york_business_option
          ))
        );
      ?>

      <div class="container">
        <div class="colsFlex">
          <?php get_template_part('template-parts/header/site', 'branding'); ?>

          <div class="colsFlex__col colsFlex__col--2">
            <?php if (class_exists('WooCommerce')): ?>
              <?php get_template_part('template-parts/header/search', 'widget'); ?>
            <?php else: ?>
              <div id="sticky-nav" class="top-menu-layout-2">
                <div class="container">
                  <div class="row vertical-center">
                    <div class="navigation-center-align">
                      <?php get_template_part('template-parts/navigation/navigation', 'top'); ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <?php if (class_exists('WooCommerce')): ?>
        <div id="sticky-nav" class="woocommerce-layout">
          <div class="container">
            <div class="row vertical-center">
              <div class="col-sm-12 col-lg-12 col-xs-12 woocommerce-layout">
                <?php get_template_part('template-parts/navigation/navigation', 'top'); ?>
              </div>
            </div>
          </div>
        </div>
      <?php
        endif;

        if (!is_front_page() && !$new_york_business_option['home_header_section_disable']) {
          get_template_part('template-parts/header/subheader');
        }
      ?>
    </header>

    <?php
      if (is_front_page()) {
        get_template_part('templates/widget', 'section');
      }
      if (is_front_page() && $new_york_business_option['slider_in_home_page']) {
        get_template_part('template-parts/slider', 'section');
      }
      if (is_front_page() && (class_exists('WooCommerce')) && $new_york_business_option['slider_nav_show']) {
        get_template_part('templates/post-carousal', 'section');
      }

      if (class_exists('woocommerce')): ?>
        <div id="scroll-cart" class="topcorner">
          <ul>
            <li class="my-cart"><?php do_action('new_york_business_woocommerce_cart_top'); ?></li>
            <li><a class="login-register" href="<?php echo esc_url($new_york_business_option['header_myaccount_link']); ?>"><i class="fa fa-user-circle">&nbsp;</i></a></li>
          </ul>
        </div>
      <?php endif; ?>

    <div id="content" class="content">
