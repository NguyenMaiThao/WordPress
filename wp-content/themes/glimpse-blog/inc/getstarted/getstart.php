<?php
//about theme info
add_action( 'admin_menu', 'glimpse_blog_gettingstarted_page' );
function glimpse_blog_gettingstarted_page() {      
    add_theme_page( esc_html__('Glimpse Blog', 'glimpse-blog'), esc_html__('All About Glimpse Blog', 'glimpse-blog'), 'edit_theme_options', 'glimpse_blog_mainpage', 'glimpse_blog_content_main');   
}

function glimpse_blog_notice() {
    global $pagenow;
    if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {?>
    <div class="notice notice-success is-dismissible getting_started">
        <div class="notice-content">
            <p><?php esc_html_e( 'Thank You For Choosing CA WP Themes', 'glimpse-blog' ); ?></p>
            <h2><?php esc_html_e( 'Thank You for installing Glimpse Blog Free Theme!', 'glimpse-blog' ) ?> </h2>
            <p><?php esc_html_e( "Please Click on the link below to Check The Full Theme Edit Documentation", 'glimpse-blog' ) ?></p>
            <div class="info-link">
                <a href="<?php echo esc_url( GLIMPSE_BLOG_PRO_DOCUMENTATION ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'glimpse-blog' ); ?></a>
            </div>
            <h2><?php esc_html_e( 'Now the Premium Version is only at $39.99 with Lifetime Access!Grab the deal now!', 'glimpse-blog' ) ?> </h2>
            <h2><?php esc_html_e( 'Check The Pro Version: Glimpse Blog Pro for Amazing Features for Unlimited Site', 'glimpse-blog' ); ?></h2>
            <div class="info-link">
                <a href="<?php echo esc_url( GLIMPSE_BLOG_PRO_URL ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'glimpse-blog' ); ?></a>
            </div>
            <div class="info-link">
                <a href="<?php echo esc_url( GLIMPSE_BLOG_PRO_DEMO ); ?>" target="_blank"> <?php esc_html_e( 'Premium Demo', 'glimpse-blog' ); ?></a>
            </div>
        </div>
    </div>
    <?php }
}

add_action( 'admin_notices', 'glimpse_blog_notice' );


// Add a Custom CSS file to WP Admin Area
function glimpse_blog_admin_page_theme_style() {
   wp_enqueue_style('glimpse-blog-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstarted/getstarted.css');
}
add_action('admin_enqueue_scripts', 'glimpse_blog_admin_page_theme_style');

//About Theme Info
function glimpse_blog_content_main() { 

    //custom function about theme customizer

    $return = add_query_arg( array()) ;
    $theme = wp_get_theme( 'glimpse-blog' );
?>

<div class="admin-main-box">
    <div class="admin-left-box">
        <h2><?php esc_html_e( 'Welcome to Glimpse Blog Theme', 'glimpse-blog' ); ?> <span class="version"><?php $theme_info = wp_get_theme();
echo $theme_info->get( 'Version' );?></span></h2>
        <p><?php esc_html_e('CA WP Themes is a premium WordPress theme development company that provides high-quality themes for various types of websites. They specialize in creating themes for businesses, eCommerce, portfolios, blogs, and many more. Their themes are easy to use and customize, making them perfect for those who want to create a professional-looking website without any coding skills.','glimpse-blog'); ?></p>
        <p><?php esc_html_e('CA WP Themes offers a wide range of themes that are designed to be responsive and compatible with the latest versions of WordPress. Our themes are also SEO optimized, ensuring that your website will rank well on search engines. They come with a variety of features such as customizable widgets, social media integration, and custom page templates.','glimpse-blog'); ?></p>
        <p><?php esc_html_e('One of the unique things about CA WP Themes is their focus on providing excellent customer support. They have a dedicated team of support staff who are available 24/7 to help customers with any issues they may encounter. Their support team is knowledgeable and friendly, ensuring that customers receive the best possible experience.','glimpse-blog'); ?></p>
    </div>
    <div class="admin-right-boxt">
        <div class="admin_text-btn">
            <h4><?php esc_html_e('Buy Glimpse Blog Premium Theme','glimpse-blog'); ?></h4>
             <p><?php esc_html_e('Now the Premium Version is only at $39.99 with Lifetime Access!Grab the deal now!', 'glimpse-blog'); ?></p>
            <div class="info-link">
                <a href="<?php echo esc_url( GLIMPSE_BLOG_PRO_URL ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'glimpse-blog' ); ?></a>
            </div>
        </div>
        <hr>
        <div class="admin_text-btn">
            <h4><?php esc_html_e('Premium Theme Demo','glimpse-blog'); ?></h4>
            <div class="info-link">
                <a href="<?php echo esc_url( GLIMPSE_BLOG_PRO_DEMO ); ?>" target="_blank"> <?php esc_html_e( 'Demo', 'glimpse-blog' ); ?></a>
            </div>
        </div>
        <hr>
        <div class="admin_text-btn">
            <h4><?php esc_html_e('Need Support? / Contact Us','glimpse-blog'); ?></h4>
            <div class="info-link">
                <a href="<?php echo esc_url( GLIMPSE_BLOG_PRO_SUPPORT ); ?>" target="_blank"> <?php esc_html_e( 'Contact Us', 'glimpse-blog' ); ?></a>
            </div>
        </div>
        <hr>
        <div class="admin_text-btn">
            <h4><?php esc_html_e('Documentation','glimpse-blog'); ?></h4>
            <div class="info-link">
                <a href="<?php echo esc_url( GLIMPSE_BLOG_PRO_DOCUMENTATION ); ?>" target="_blank"> <?php esc_html_e( 'Docs', 'glimpse-blog' ); ?></a>
            </div>
        </div>
    </div>
</div>


<?php } ?>