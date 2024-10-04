<?php
/**
 * Add custom settings and controls to the WordPress Customizer
 */


//---------------------Code to add the Upgrade to Pro button in the Customizer----------

function glimpse_blog_customize_register_btn( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    get_template_part('inc/customizer-button/upsell-section');

    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'blogname', array(
            'selector'        => '.site-title a',
            'render_callback' => 'glimpse_blog_customize_partial_blogname',
        ) );
        $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
            'selector'        => '.site-description',
            'render_callback' => 'glimpse_blog_customize_partial_blogdescription',
        ) );
    }

    $wp_customize->register_section_type( 'Glimpse_Blog_Customize_Upsell_Section' );

    // Register section.
    $wp_customize->add_section(
        new Glimpse_Blog_Customize_Upsell_Section(
            $wp_customize,
            'theme_upsell',
            array(
                'title'    => esc_html__( 'Glimpse Blog Pro', 'glimpse-blog' ),
                'pro_text' => esc_html__( 'Upgrade To Pro', 'glimpse-blog' ),
                'pro_url'  => 'https://cawpthemes.com/glimpse-blog-premium-wordpress-theme/',
                'priority' => 1,
            )
        )
    );
}
add_action( 'customize_register', 'glimpse_blog_customize_register_btn' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function glimpse_blog_customize_partial_blogname() {
    bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function glimpse_blog_customize_partial_blogdescription() {
    bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function glimpse_blog_customize_preview_js() {
    wp_enqueue_script( 'glimpse-blog-customizer', get_template_directory_uri() . '/inc/customizer-button/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'glimpse_blog_customize_preview_js' );

/**
 * Customizer control scripts and styles.
 *
 * @since 1.0.0
 */
function glimpse_blog_customizer_control_scripts() {

    wp_enqueue_style( 'glimpse-blog-customize-controls', get_template_directory_uri() . '/inc/customizer-button/customize-controls.css', '', '1.0.0' );

    wp_enqueue_script( 'glimpse-blog-customize-controls', get_template_directory_uri() . '/inc/customizer-button/customize-controls.js', array( 'customize-controls' ), '1.0.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'glimpse_blog_customizer_control_scripts', 0 );


//---------------------Code to add the Upgrade to Pro button in the Customizer End----------


//------------------Theme Information--------------------

function glimpse_blog_customize_register( $wp_customize ) {


      // Add a custom setting for the Site Identity color
  $wp_customize->add_setting( 'glimpse_blog_site_identity_color', array(
    'default' => '#000',
    'sanitize_callback' => 'sanitize_hex_color',
  ) );

  // Add a custom control for the primary color
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'glimpse_blog_site_identity_color', array(
    'label' => __( 'Site Identity Color', 'glimpse-blog' ),
    'section' => 'title_tagline',
    'settings' => 'glimpse_blog_site_identity_color',
  ) ) );


  // Add a custom setting for the Site Identity color
  $wp_customize->add_setting( 'glimpse_blog_site_identity_tagline_color', array(
    'default' => '#000',
    'sanitize_callback' => 'sanitize_hex_color',
  ) );

  // Add a custom control for the primary color
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'glimpse_blog_site_identity_tagline_color', array(
    'label' => __( 'Tagline Color', 'glimpse-blog' ),
    'section' => 'title_tagline',
    'settings' => 'glimpse_blog_site_identity_tagline_color',
  ) ) );

//------------------Site Identity Ends---------------------


  
  // Add a custom setting for the primary color
  $wp_customize->add_setting( 'glimpse_blog_primary_color', array(
    'default' => '#000',
    'sanitize_callback' => 'sanitize_hex_color',
  ) );

  // Add a custom control for the primary color
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'glimpse_blog_primary_color', array(
    'label' => __( 'Primary Color', 'glimpse-blog' ),
    'section' => 'colors',
    'settings' => 'glimpse_blog_primary_color',
  ) ) );

  //-----------------------------------Home Front Page-------------------------------

  $wp_customize->add_panel( 'glimpse_blog_panel', array(
    'title'    => __( 'Front Page Settings', 'glimpse-blog' ),
    'priority' => 6,
  ) );


  //--------Latest------------------------------------------

  $wp_customize->add_section( 'glimpse_blog_section_latest', array(
        'title'    => __( 'Latest Post', 'glimpse-blog' ),
        'priority' => 10,
        'panel'    => 'glimpse_blog_panel',
    ) );


  //-----------------Enable Option Section One-------------

  $wp_customize->add_setting('glimpse_blog_section_latest_enable',array(
      'default' => 'Enable',
      'sanitize_callback' => 'glimpse_blog_sanitize_choices'
  ));
  $wp_customize->add_control('glimpse_blog_section_latest_enable',array(
        'type' => 'radio',
        'label' => __('Do you want this section', 'glimpse-blog'),
        'section' => 'glimpse_blog_section_latest',
        'choices' => array(
            'Enable' => __('Enable', 'glimpse-blog'),
            'Disable' => __('Disable', 'glimpse-blog')
  )));

  //-----------Category------------

  $categories = get_categories();
  $cats = array();
  $i = 0;
  foreach($categories as $category){
    if($i==0){
      $default = $category->name;
      $i++;
    }
    $cats[$category->name] = $category->name;
  }

  $wp_customize->add_setting('glimpse_blog_section_latest_category',array(
  'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('glimpse_blog_section_latest_category',array(
    'type'    => 'select',
    'choices' => $cats,
    'label' => __('Select Category to Display Post','glimpse-blog'),
    'section' => 'glimpse_blog_section_latest',
    'sanitize_callback' => 'sanitize_text_field',
  )); 


  //--------Single------------------------------------------

  $wp_customize->add_section( 'glimpse_blog_section_single', array(
        'title'    => __( 'Single Post', 'glimpse-blog' ),
        'priority' => 10,
        'panel'    => 'glimpse_blog_panel',
    ) );


  //-----------------Enable Option Section One-------------

  $wp_customize->add_setting('glimpse_blog_section_single_enable',array(
      'default' => 'Enable',
      'sanitize_callback' => 'glimpse_blog_sanitize_choices'
  ));
  $wp_customize->add_control('glimpse_blog_section_single_enable',array(
        'type' => 'radio',
        'label' => __('Do you want this section', 'glimpse-blog'),
        'section' => 'glimpse_blog_section_single',
        'choices' => array(
            'Enable' => __('Enable', 'glimpse-blog'),
            'Disable' => __('Disable', 'glimpse-blog')
  )));


  // ----------- Posts ------------
  $posts = get_posts(array(
    'numberposts' => -1,
    'post_type' => 'post',
    'post_status' => 'publish',
  ));

  $post_choices = array();
  $i = 0;
  foreach($posts as $post){
    if($i == 0){
      $default_post = $post->ID;
      $i++;
    }
    $post_choices[$post->ID] = $post->post_title;
  }

  $wp_customize->add_setting('glimpse_blog_section_single_post', array(
    'default' => $default_post,
    'sanitize_callback' => 'absint', // Sanitize as an integer since we're dealing with post IDs
  ));

  $wp_customize->add_control('glimpse_blog_section_single_post', array(
    'type'    => 'select',
    'choices' => $post_choices,
    'label' => __('Select Post to Display', 'glimpse-blog'),
    'section' => 'glimpse_blog_section_single',
  ));

  //--------Section One (Featured Post)------------------------------------------

  $wp_customize->add_section( 'glimpse_blog_section1', array(
        'title'    => __( 'Featured Post', 'glimpse-blog' ),
        'priority' => 10,
        'panel'    => 'glimpse_blog_panel',
    ) );


  //-----------------Enable Option Section One-------------

  $wp_customize->add_setting('glimpse_blog_section1_enable',array(
      'default' => 'Enable',
      'sanitize_callback' => 'glimpse_blog_sanitize_choices'
  ));
  $wp_customize->add_control('glimpse_blog_section1_enable',array(
        'type' => 'radio',
        'label' => __('Do you want this section', 'glimpse-blog'),
        'section' => 'glimpse_blog_section1',
        'choices' => array(
            'Enable' => __('Enable', 'glimpse-blog'),
            'Disable' => __('Disable', 'glimpse-blog')
  )));


  //-----------Category------------

  $categories = get_categories();
  $cats = array();
  $i = 0;
  foreach($categories as $category){
    if($i==0){
      $default = $category->name;
      $i++;
    }
    $cats[$category->name] = $category->name;
  }

  $wp_customize->add_setting('glimpse_blog_section1_category',array(
  'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('glimpse_blog_section1_category',array(
    'type'    => 'select',
    'choices' => $cats,
    'label' => __('Select Category to Display Post','glimpse-blog'),
    'section' => 'glimpse_blog_section1',
    'sanitize_callback' => 'sanitize_text_field',
  )); 


//------------------------Blog Page Settings--------------------------


  $wp_customize->add_section( 'glimpse_blog_blogpage_settings', array(
        'title'    => __( 'Blog Page Settings', 'glimpse-blog' ),
        'priority' => 10,
        'panel'    => 'glimpse_blog_panel',
    ) );

    //--------------Section One Title-----------------------

    $wp_customize->add_setting('glimpse_blog_blogpage_title',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('glimpse_blog_blogpage_title',array(
      'label' => __('Blog Page Title','glimpse-blog'),
      'section' => 'glimpse_blog_blogpage_settings',
      'setting' => 'glimpse_blog_blogpage_title',
      'type'    => 'text'
    )
  ); 

  //-----------Category------------

  $categories = get_categories();
  $cats = array();
  $i = 0;
  foreach($categories as $category){
    if($i==0){
      $default = $category->name;
      $i++;
    }
    $cats[$category->name] = $category->name;
  }

  $wp_customize->add_setting('glimpse_blog_blogpage_category',array(
  'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('glimpse_blog_blogpage_category',array(
    'type'    => 'select',
    'choices' => $cats,
    'label' => __('Select Category to Display Post on Blog Page','glimpse-blog'),
    'section' => 'glimpse_blog_blogpage_settings',
    'sanitize_callback' => 'sanitize_text_field',
  ));



    $wp_customize->add_setting('glimpse_blogblog_page_category_number_of_posts_setting',array(
    'default' => '18',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('glimpse_blogblog_page_category_number_of_posts_setting',array(
    'label' => __('Number of Posts','glimpse-blog'),
    'section' => 'glimpse_blog_blogpage_settings',
    'setting' => 'glimpse_blogblog_page_category_number_of_posts_setting',
    'type'    => 'number'
  )); 




  //-------------------------Footer Settings------------------------------


    $wp_customize->add_section( 'glimpse_blog_footer', array(
        'title'    => __( 'Footer Settings', 'glimpse-blog' ),
        'priority' => 10,
        'panel'    => 'glimpse_blog_panel',
    ) );


  // Add a custom setting for the footer text
  $wp_customize->add_setting( 'glimpse_blog_footer_text', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field',
  ) );

  // Add a custom control for the footer text
  $wp_customize->add_control( 'glimpse_blog_footer_text', array(
    'label' => __( 'Footer Text', 'glimpse-blog' ),
    'section' => 'glimpse_blog_footer',
    'type' => 'text',
  ) );



 //-------------------404 Page-----------

  $wp_customize->add_section( 'glimpse_blog_404page', array(
    'title'    => __( '404 Page Settings', 'glimpse-blog' ),
    'priority' => 12,
    'panel'    => 'glimpse_blog_panel',
    ) );


  // Add a custom setting for the footer text
  $wp_customize->add_setting( 'glimpse_blog_404page_title', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field',
  ) );

  // Add a custom control for the footer text
  $wp_customize->add_control( 'glimpse_blog_404page_title', array(
    'label' => __( 'Page Not Found Title', 'glimpse-blog' ),
    'section' => 'glimpse_blog_404page',
    'type' => 'text',
  ) );

  // Add a custom setting for the footer text
  $wp_customize->add_setting( 'glimpse_blog_404page_text', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field',
  ) );

  // Add a custom control for the footer text
  $wp_customize->add_control( 'glimpse_blog_404page_text', array(
    'label' => __( 'Page Not Found Text', 'glimpse-blog' ),
    'section' => 'glimpse_blog_404page',
    'type' => 'text',
  ) );

//--------------------------------------General Settings------------------------------------------

  $wp_customize->add_section( 'glimpse_blog_general', array(
        'title'    => __( 'General Settings', 'glimpse-blog' ),
        'panel'    => 'glimpse_blog_panel',
    ) );

    $wp_customize->add_setting( 'glimpse_blog_post_meta_toggle_switch_control', array(
        'default'   => true,
        'sanitize_callback' => 'sanitize_text_field', // Use a suitable sanitization function based on your needs
        'transport' => 'refresh', // or 'postMessage' for instant preview without page refresh
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'glimpse_blog_post_meta_toggle_switch_control', array(
        'label'    => __( 'Display Time/Author', 'glimpse-blog' ),
        'section'  => 'glimpse_blog_general',
        'settings' => 'glimpse_blog_post_meta_toggle_switch_control',
        'type'     => 'checkbox',
    ) ) );

    $wp_customize->add_setting( 'glimpse_blog_post_readmore_toggle_switch_control', array(
        'default'   => true,
        'sanitize_callback' => 'sanitize_text_field', // Use a suitable sanitization function based on your needs
        'transport' => 'refresh', // or 'postMessage' for instant preview without page refresh
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'glimpse_blog_post_readmore_toggle_switch_control', array(
        'label'    => __( 'Display Readmore Link', 'glimpse-blog' ),
        'section'  => 'glimpse_blog_general',
        'settings' => 'glimpse_blog_post_readmore_toggle_switch_control',
        'type'     => 'checkbox',
    ) ) );



}
add_action( 'customize_register', 'glimpse_blog_customize_register' );


