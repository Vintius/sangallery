<?php $new_york_business_option = $args['data']['new_york_business_option']; ?>

<?php if (!$new_york_business_option['header_section_hide_header']): ?>
  <div class="mini-header hidden-xs">
    <div class="container">
      <div class="mini-header-cols">
        <div id="mini-header-contacts" class="mini-header-contacts">
          <ul class="contact-list-top">
            <?php if ($new_york_business_option['contact_section_phone'] != ''): ?>
              <li class="contact-list-top-phone">
                <a href="<?php echo esc_url('tel:'.$new_york_business_option['contact_section_phone']); ?>">
                  <i class="fa fa-phone"></i>
                  <span class="contact-margin"><?php echo esc_html($new_york_business_option['contact_section_phone']); ?></span>
                </a>
              </li>
            <?php endif; ?>
            <?php if ($new_york_business_option['contact_section_email'] != ''): ?>
              <li class="contact-list-top-mail">
                <a href="<?php echo esc_url('mailto:'.$new_york_business_option['contact_section_email']); ?>">
                  <i class="fa fa-envelope"></i>
                  <span class="contact-margin"><?php echo esc_html($new_york_business_option['contact_section_email']); ?></span>
                </a>
              </li>
            <?php endif; ?>
            <?php if ($new_york_business_option['contact_section_hours'] != ''): ?>
              <li class="contact-list-top-clock">
                <i class="fa fa-clock-o"></i>
                <span class="contact-margin"><?php echo esc_html($new_york_business_option['contact_section_hours']); ?></span>
              </li>
            <?php endif; ?>
            <?php if ($new_york_business_option['contact_section_address'] != ''): ?>
              <li class="contact-list-top-address">
                <i class="fa fa-map-marker"></i>
                <span class="contact-margin"><?php echo esc_html($new_york_business_option['contact_section_address']); ?></span>
              </li>
            <?php endif; ?>
          </ul>
        </div>
        <div class="mini-header-menu">
          <ul class="mimi-header-social-icon animate fadeInRight">
            <li class="mimi-header-social-item"><a href="/about-us/">О компании</a></li>
            <li class="mimi-header-social-item"><a href="/delivery-payment/">Доставка и оплата</a></li>
            <?php if ($new_york_business_option['social_facebook_link'] != ''): ?>
              <li class="mimi-header-social-item">
                <a href="<?php echo esc_url($new_york_business_option['social_facebook_link']); ?>" target="<?php if($new_york_business_option['social_open_new_tab']=='1'){echo '_blank';} ?>"  data-toggle="tooltip" title="<?php esc_attr_e('Facebook','easy-storefront'); ?>">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
            <?php endif; ?>
            <?php if ($new_york_business_option['social_twitter_link'] != ''): ?>
              <li class="mimi-header-social-item">
                <a href="<?php echo esc_url($new_york_business_option['social_twitter_link']); ?>" target="<?php if($new_york_business_option['social_open_new_tab']=='1'){echo '_blank';} ?>"  data-toggle="tooltip" title="<?php esc_attr_e('Twitter','easy-storefront'); ?>">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
            <?php endif; ?>
            <?php if ($new_york_business_option['social_skype_link'] != ''): ?>
              <li class="mimi-header-social-item">
                <a href="<?php echo esc_url($new_york_business_option['social_skype_link']); ?>" target="<?php if($new_york_business_option['social_open_new_tab']=='1'){echo '_blank';} ?>"  data-toggle="tooltip" title="<?php esc_attr_e('Skype','easy-storefront'); ?>">
                  <i class="fa fa-skype"></i>
                </a>
              </li>
            <?php endif; ?>
            <?php if ($new_york_business_option['social_pinterest_link'] != ''): ?>
              <li class="mimi-header-social-item">
                <a href="<?php echo esc_url($new_york_business_option['social_pinterest_link']); ?>" target="<?php if($new_york_business_option['social_open_new_tab']=='1'){echo '_blank';} ?>"  data-toggle="tooltip" title="<?php esc_attr_e('Pinterest','easy-storefront'); ?>">
                  <i class="fa fa-pinterest"></i>
                </a>
              </li>
            <?php endif; ?>
            <?php if ($new_york_business_option['social_vk_link'] != ''): ?>
              <li class="mimi-header-social-item">
                <a href="<?php echo esc_url($new_york_business_option['social_vk_link']); ?>"
                  target="<?php if ($new_york_business_option['social_open_new_tab']=='1') {echo '_blank';} ?>"
                  class="vkontakte" data-toggle="tooltip" title="<?php esc_attr_e('Vkontakte', 'easy-storefront'); ?>">
                  <i class="fa fa-vk"></i>
                </a>
              </li>
            <?php endif;?>
            <?php if ($new_york_business_option['social_instagram_link'] != ''): ?>
              <li class="mimi-header-social-item">
                <a href="<?php echo esc_url($new_york_business_option['social_instagram_link']); ?>"
                  target="<?php if ($new_york_business_option['social_open_new_tab']=='1') {echo '_blank';} ?>"
                  class="instagram" data-toggle="tooltip" title="<?php esc_attr_e('Instagram', 'easy-storefront'); ?>">
                  <i class="fa fa-instagram"></i>
                </a>
              </li>
            <?php endif;?>
          </ul>
          <div class="mini-header-user-menu">
            <div class="login-register">
              <?php echo '<a class="login-register" href="'.esc_url($new_york_business_option['header_myaccount_link']).'"><i class="fa fa-user-circle"></i> '.esc_html__('My Account', 'easy-storefront').'</a>  &nbsp;'; ?>
            </div>
            <div id="cart-wishlist-container">
              <div id="cart-top" class="cart-top">
                <div class="cart-container">
                  <?php do_action('new_york_business_woocommerce_cart_top'); ?>
                </div>
              </div>
              <?php if (class_exists('YITH_WCWL')): ?>
                <div id="wishlist-top" class="wishlist-top">
                  <li class="my-wishlist"><?php new_york_business_wishlist_count(); ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
