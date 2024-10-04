<?php
/**
 * Theme Section Single
 *
 * @package Glimpse Blog
 */

// All function code and function definitions go here...

$glimpse_blog_section_one = get_theme_mod( 'glimpse_blog_section_single_enable' );
if ( 'Disable' == $glimpse_blog_section_one ) {
  return;
}

// Get the selected post ID from the Customizer
$glimpse_blog_selected_post_id = get_theme_mod('glimpse_blog_section_single_post');

if ($glimpse_blog_selected_post_id) {
    // Get the post object using the selected post ID
    $post = get_post($glimpse_blog_selected_post_id);
    if ($post) {
        setup_postdata($post); // Setup global post data for use with template tags
?>

<section id="single-post" class="featured-posts">
  <div class="main-section-content">
    <div class="row">
      <div class="col-lg-12 col-md-4 col-sm-12 main-post-box-hm">
        <div class="post row">
            <div class="col-lg-6 col-12">
               <?php if ( has_post_thumbnail() ) : ?>
                    <div class="post-thumbnail">
                      <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail(); ?>
                      </a>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-6 col-12 main-single-box">    
              <div class="class-categories">
                <span class="theme-border-s"></span>
                <?php
                $categories = get_the_category();
                if ( ! empty( $categories ) ) {
                    foreach( $categories as $category ) {
                        echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>';
                    }
                }
                ?>
                </div> 
              <h2 class="post-title">
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h2>
              <?php if ( get_theme_mod( 'glimpse_blog_post_meta_toggle_switch_control', true ) ) : ?>
                <div class="sec2-meta">
                    <span><?php echo get_the_date(); ?></span>
                    <span class="separator">|</span>
                    <span><?php echo get_the_author(); ?></span>
                  </div>
              <?php else : ?>
                <!-- Content to display when the toggle switch is OFF -->
              <?php endif; ?>
              <div class="latest-content">
                  <?php the_excerpt(); ?>
              </div>
              <div class="read-more">
                <a href="<?php the_permalink(); ?>" class="read-more"><?php _e('Read More', 'glimpse-blog'); ?></a>
              </div>
            </div>             
        </div>
      </div>
    </div>
  </div>
</section>

<?php
        wp_reset_postdata(); // Reset global post data
    }
}
