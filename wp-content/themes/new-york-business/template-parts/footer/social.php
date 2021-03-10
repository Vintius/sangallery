<?php
  $easy_storefront_option = $args['data']['easy_storefront_option'];
?>

<ul id="footer-social" class="header-social-icon animate fadeInRight">
  <?php if ($easy_storefront_option['social_facebook_link'] != ''): ?>
    <li>
      <a href="<?php echo esc_url($easy_storefront_option['social_facebook_link']); ?>"
        target="<?php if ($easy_storefront_option['social_open_new_tab']=='1') {echo '_blank';} ?>"
        class="facebook" data-toggle="tooltip" title="<?php esc_attr_e('Facebook', 'easy-storefront'); ?>">
        <i class="fa fa-facebook"></i>
      </a>
    </li>
  <?php endif;?>
  <?php if ($easy_storefront_option['social_twitter_link'] != ''): ?>
    <li>
      <a href="<?php echo esc_url($easy_storefront_option['social_twitter_link']); ?>"
        target="<?php if ($easy_storefront_option['social_open_new_tab']=='1') {echo '_blank';} ?>"
        class="twitter" data-toggle="tooltip" title="<?php esc_attr_e('Twitter', 'easy-storefront'); ?>">
        <i class="fa fa-twitter"></i>
      </a>
    </li>
  <?php endif;?>
  <?php if ($easy_storefront_option['social_skype_link'] != ''): ?>
    <li>
      <a href="<?php echo esc_url($easy_storefront_option['social_skype_link']); ?>"
        target="<?php if ($easy_storefront_option['social_open_new_tab']=='1') {echo '_blank';} ?>"
        class="skype" data-toggle="tooltip" title="<?php esc_attr_e('Skype', 'easy-storefront'); ?>">
        <i class="fa fa-skype"></i>
      </a>
    </li>
  <?php endif;?>
  <?php if ($easy_storefront_option['social_pinterest_link'] != ''): ?>
    <li>
      <a href="<?php echo esc_url($easy_storefront_option['social_pinterest_link']); ?>"
        target="<?php if ($easy_storefront_option['social_open_new_tab']=='1') {echo '_blank';} ?>"
        class="pinterest" data-toggle="tooltip" title="<?php esc_attr_e('Google-Plus', 'easy-storefront'); ?>">
        <i class="fa fa-pinterest"></i>
      </a>
    </li>
  <?php endif;?>
  <?php if ($easy_storefront_option['social_vk_link'] != ''): ?>
    <li>
      <a href="<?php echo esc_url($easy_storefront_option['social_vk_link']); ?>"
        target="<?php if ($easy_storefront_option['social_open_new_tab']=='1') {echo '_blank';} ?>"
        class="vkontakte" data-toggle="tooltip" title="<?php esc_attr_e('Vkontakte', 'easy-storefront'); ?>">
        <i class="fa fa-vk"></i>
      </a>
    </li>
  <?php endif;?>
  <?php if ($easy_storefront_option['social_instagram_link'] != ''): ?>
    <li>
      <a href="<?php echo esc_url($easy_storefront_option['social_instagram_link']); ?>"
        target="<?php if ($easy_storefront_option['social_open_new_tab']=='1') {echo '_blank';} ?>"
        class="instagram" data-toggle="tooltip" title="<?php esc_attr_e('Instagram', 'easy-storefront'); ?>">
        <i class="fa fa-instagram"></i>
      </a>
    </li>
  <?php endif;?>
</ul>
