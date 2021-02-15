<div class="colsFlex__col colsFlex__col--2 site-branding">
  <?php if (has_custom_logo()) {the_custom_logo();} ?>

  <div class="site-branding-text">
    <?php if (is_front_page()): ?>
      <h1 class="site-title">
        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
          <?php bloginfo('name'); ?>
        </a>
      </h1>
    <?php else: ?>
      <p class="site-title">
        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
          <?php bloginfo('name'); ?>
        </a>
      </p>
    <?php endif; ?>

    <?php
      $new_york_business_description = get_bloginfo('description', 'display');
      if ($new_york_business_description || is_customize_preview()): ?>
        <p class="site-description"><?php echo esc_html($new_york_business_description); ?></p>
    <?php endif; ?>
  </div>
</div>
