<?php
  $easy_storefront_default_settings = new new_york_business_settings();
  $easy_storefront_option           = wp_parse_args(get_option('new_york_business_option', array()), $easy_storefront_default_settings->default_data());
?>

</div> <!--end of content div-->

<footer id="colophon" role="contentinfo" class="footer">
  <div class="footer__in">
    <?php
      get_template_part('template-parts/footer/widget', 'area', array(
        'data' => array(
          'easy_storefront_option' => $easy_storefront_option
        ))
      );
    ?>
  </div>

  <div class="footer__in">
    <p class="footer__copyright">
      <?php echo wp_kses_post($easy_storefront_option['footer_section_bottom_text']); ?>
    </p>
  </div>
</footer>

<a id="scroll-btn" href="#" class="scroll-top"><i class="fa fa-angle-double-up"></i></a>

<?php
  global $easy_storefront_option;

  if (class_exists('WP_Customize_Control')) {
    $easy_storefront_default_settings = new new_york_business_settings();
    $easy_storefront_option = wp_parse_args(get_option('easy_storefront_option', array()), $easy_storefront_default_settings->default_data());
  }
  if ($easy_storefront_option['box_layout']) {
    // end of wrapper div
    echo '</div>';
  }

  wp_footer();
?>
</body>
</html>
