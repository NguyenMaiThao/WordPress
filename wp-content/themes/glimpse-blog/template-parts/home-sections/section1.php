<?php
/**
 * Theme Section 1 
 *
 * @package Glimpse Blog
 */

// All Function code and function definitions go here...


$glimpse_blog_section_one = get_theme_mod( 'glimpse_blog_section1_enable' );
if ( 'Disable' == $glimpse_blog_section_one ) {
  return;
} ?>


<section id="section1" class="featured-posts">
  <div class="main-section-content">
    <div class="row">
      <?php
        // Define the query to get the latest posts from the "Features" category
        $args = array(
          'category_name' =>  get_theme_mod('glimpse_blog_section1_category'),
          'posts_per_page' => 4,
          'order' => 'DESC'
        );
        
        $query = new WP_Query( $args );
        
        // Loop through the posts
        while ( $query->have_posts() ) : $query->the_post();
      ?>
      
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
            <div class="col-lg-6 col-12">    
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
              <div class="latest-content">
                  <?php the_content(); ?>
              </div> 
              <?php if ( get_theme_mod( 'glimpse_blog_post_meta_toggle_switch_control', true ) ) : ?>
                <div class="sec2-meta">
                    <span><?php echo esc_html( get_the_date() ); ?></span>
                    <span><?php echo esc_html( get_the_author() ); ?></span>
                  </div>
              <?php else : ?>
                <!-- Content to display when the toggle switch is OFF -->
              <?php endif; ?>
            </div>             
        </div>
      </div>
      
      <?php endwhile; wp_reset_postdata(); ?>
      
    </div>
</div>
</section>






