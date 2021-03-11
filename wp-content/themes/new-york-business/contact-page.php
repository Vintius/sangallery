<?php
/**
 * Template Name:Contact-Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package new-york-business
 * @since 1.0

 */

get_header();

global $new_york_business_option;
if (class_exists('WP_Customize_Control')) {
  $new_york_business_default_settings = new new_york_business_settings();
  $new_york_business_option = wp_parse_args(get_option('new_york_business_option', array()), $new_york_business_default_settings->default_data());
}
?>

<main id="main" class="site-main content__in" role="main">
  <div class="content__article article article--contacts">
    <h1 class="entry-title article__title"><?php the_title(); ?></h1>
    <?php while (have_posts()): the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="entry-content">
          <?php the_content(); ?>
        </div>
      </article>
    <?php endwhile; ?>
  </div>
</main>
<?php
get_footer();
