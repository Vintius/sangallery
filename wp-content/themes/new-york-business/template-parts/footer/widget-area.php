<?php
  $easy_storefront_option = $args['data']['easy_storefront_option'];
?>

<aside class="footer__widgets colsFlex colsFlex--vtop" role="complementary" aria-label="<?php esc_attr_e('Footer', 'easy-storefront'); ?>">
  <?php if (is_active_sidebar('footer-sidebar-1')): ?>
    <div class="footer__widget footer__contacts colsFlex__col colsFlex__col--3">
      <?php dynamic_sidebar('footer-sidebar-1'); ?>
    </div>
  <?php endif;?>
  <?php if (is_active_sidebar('footer-sidebar-2')): ?>
    <div class="footer__widget colsFlex__col colsFlex__col--3">
      <?php dynamic_sidebar('footer-sidebar-2'); ?>
    </div>
  <?php endif;?>
  <div class="footer__widget footer__widget--social colsFlex__col colsFlex__col--3">
    <div class="widget">
      <h3 class="footer__title widget-title">Мы в соцсетях:</h3>
      <?php
        get_template_part('template-parts/footer/social', '', array(
          'data' => array(
            'easy_storefront_option' => $easy_storefront_option
          ))
        );
      ?>
      <button type="button" class="footer__button linkButton linkButton--gradient"><span>Заказать звонок</span></button>
    </div>
  </div>
</aside>
