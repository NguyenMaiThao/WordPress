<?php
/**
 * The Header for our theme.
 *
 * @package glimpse-blog
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <?php do_action( 'wp_body_open' ); ?>
  
  <a class="skip-link screen-reader-text" href="#content"><?php echo esc_html__('Skip to content', 'glimpse-blog'); ?></a>
  
  <div class="container-fluid header-border">
    <div class="row">
      <div class="col-lg-3 col-6">
        <div class="site-branding">
          <?php if ( has_custom_logo() ) : ?>
            <div class="site-logo"><?php the_custom_logo(); ?></div>
          <?php else : ?>
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <p class="site-description"><?php bloginfo( 'description' ); ?></p>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-lg-9 col-6">
        <header id="Main-head-class" class="site-header">
          <?php do_action( 'glimpse_blog_before_header' ); ?>
          <?php get_template_part('template-parts/header/header-file'); ?>
        </header>
      </div>
    </div>
  </div>

  <!-- End of Header -->
