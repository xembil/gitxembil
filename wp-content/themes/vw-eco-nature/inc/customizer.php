<?php
/**
 * VW Eco Nature Theme Customizer
 *
 * @package VW Eco Nature
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_eco_nature_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_eco_nature_custom_controls' );

function vw_eco_nature_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/customize-homepage/class-customize-homepage.php' );

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'vw_eco_nature_customize_partial_blogname', 
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'vw_eco_nature_customize_partial_blogdescription', 
	));

	//add home page setting pannel
	$VWEcoNatureParentPanel = new VW_Eco_Nature_WP_Customize_Panel( $wp_customize, 'vw_eco_nature_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'VW Settings', 'vw-eco-nature' ),
		'priority' => 10,
	));

	// Layout
	$wp_customize->add_section( 'vw_eco_nature_left_right', array(
    	'title'      => __( 'General Settings', 'vw-eco-nature' ),
		'panel' => 'vw_eco_nature_panel_id'
	) );

	$wp_customize->add_setting('vw_eco_nature_width_option',array(
        'default' => __('Full Width','vw-eco-nature'),
        'sanitize_callback' => 'vw_eco_nature_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Eco_Nature_Image_Radio_Control($wp_customize, 'vw_eco_nature_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','vw-eco-nature'),
        'description' => __('Here you can change the width layout of Website.','vw-eco-nature'),
        'section' => 'vw_eco_nature_left_right',
        'choices' => array(
            'Full Width' => get_template_directory_uri().'/assets/images/full-width.png',
            'Wide Width' => get_template_directory_uri().'/assets/images/wide-width.png',
            'Boxed' => get_template_directory_uri().'/assets/images/boxed-width.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_eco_nature_theme_options',array(
        'default' => __('Right Sidebar','vw-eco-nature'),
        'sanitize_callback' => 'vw_eco_nature_sanitize_choices'	        
	) );
	$wp_customize->add_control('vw_eco_nature_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-eco-nature'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-eco-nature'),
        'section' => 'vw_eco_nature_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-eco-nature'),
            'Right Sidebar' => __('Right Sidebar','vw-eco-nature'),
            'One Column' => __('One Column','vw-eco-nature'),
            'Three Columns' => __('Three Columns','vw-eco-nature'),
            'Four Columns' => __('Four Columns','vw-eco-nature'),
            'Grid Layout' => __('Grid Layout','vw-eco-nature')
        ),
	));

	$wp_customize->add_setting('vw_eco_nature_page_layout',array(
        'default' => __('One Column','vw-eco-nature'),
        'sanitize_callback' => 'vw_eco_nature_sanitize_choices'
	));
	$wp_customize->add_control('vw_eco_nature_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-eco-nature'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-eco-nature'),
        'section' => 'vw_eco_nature_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-eco-nature'),
            'Right Sidebar' => __('Right Sidebar','vw-eco-nature'),
            'One Column' => __('One Column','vw-eco-nature')
        ),
	) );

	//Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_eco_nature_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','vw-eco-nature' ),
		'section' => 'vw_eco_nature_left_right'
    )));

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_eco_nature_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','vw-eco-nature' ),
		'section' => 'vw_eco_nature_left_right'
    )));

	//Pre-Loader
	$wp_customize->add_setting( 'vw_eco_nature_loader_enable',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','vw-eco-nature' ),
        'section' => 'vw_eco_nature_left_right'
    )));

	$wp_customize->add_setting('vw_eco_nature_loader_icon',array(
        'default' => __('Two Way','vw-eco-nature'),
        'sanitize_callback' => 'vw_eco_nature_sanitize_choices'
	));
	$wp_customize->add_control('vw_eco_nature_loader_icon',array(
        'type' => 'select',
        'label' => __('Pre-Loader Type','vw-eco-nature'),
        'section' => 'vw_eco_nature_left_right',
        'choices' => array(
            'Two Way' => __('Two Way','vw-eco-nature'),
            'Dots' => __('Dots','vw-eco-nature'),
            'Rotate' => __('Rotate','vw-eco-nature')
        ),
	) );

	//Topbar
	$wp_customize->add_section( 'vw_eco_nature_topbar', array(
    	'title'      => __( 'Topbar Settings', 'vw-eco-nature' ),
		'panel' => 'vw_eco_nature_panel_id'
	) );

	$wp_customize->add_setting( 'vw_eco_nature_topbar_hide_show',
       array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_topbar_hide_show',
       array(
      'label' => esc_html__( 'Show / Hide Topbar','vw-eco-nature' ),
      'section' => 'vw_eco_nature_topbar'
    )));

    $wp_customize->add_setting('vw_eco_nature_topbar_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_topbar_padding_top_bottom',array(
		'label'	=> __('Topbar Padding Top Bottom','vw-eco-nature'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_topbar',
		'type'=> 'text'
	));

    //Sticky Header
	$wp_customize->add_setting( 'vw_eco_nature_sticky_header',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_sticky_header',array(
        'label' => esc_html__( 'Sticky Header','vw-eco-nature' ),
        'section' => 'vw_eco_nature_topbar'
    )));

	$wp_customize->add_setting( 'vw_eco_nature_search_hide_show',array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_search_hide_show',array(
          'label' => esc_html__( 'Show / Hide Search','vw-eco-nature' ),
          'section' => 'vw_eco_nature_topbar'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_eco_nature_search_hide_show', array( 
		'selector' => '.search-box i', 
		'render_callback' => 'vw_eco_nature_customize_partial_vw_eco_nature_search_hide_show', 
	));

    $wp_customize->add_setting('vw_eco_nature_search_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_search_font_size',array(
		'label'	=> __('Search Font Size','vw-eco-nature'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_search_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_search_padding_top_bottom',array(
		'label'	=> __('Search Padding Top Bottom','vw-eco-nature'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_search_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_search_padding_left_right',array(
		'label'	=> __('Search Padding Left Right','vw-eco-nature'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_eco_nature_search_border_radius', array(
		'default'              => "",
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_eco_nature_search_border_radius', array(
		'label'       => esc_html__( 'Search Border Radius','vw-eco-nature' ),
		'section'     => 'vw_eco_nature_topbar',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	 //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_eco_nature_location_text', array( 
		'selector' => '.icon-space b', 
		'render_callback' => 'vw_eco_nature_customize_partial_vw_eco_nature_location_text', 
	));

    $wp_customize->add_setting('vw_eco_nature_location_icon',array(
		'default'	=> 'fas fa-map-marker-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Eco_Nature_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_eco_nature_location_icon',array(
		'label'	=> __('Add Location Icon','vw-eco-nature'),
		'transport' => 'refresh',
		'section'	=> 'vw_eco_nature_topbar',
		'setting'	=> 'vw_eco_nature_location_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_eco_nature_location_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_location_text',array(
		'label'	=> __('Add Location Text','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( 'LOCATION', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_location',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_location',array(
		'label'	=> __('Add Location','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '828 N. Iqyreesrs Street Liocnss Park', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_phone_number_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Eco_Nature_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_eco_nature_phone_number_icon',array(
		'label'	=> __('Add Phone Number Icon','vw-eco-nature'),
		'transport' => 'refresh',
		'section'	=> 'vw_eco_nature_topbar',
		'setting'	=> 'vw_eco_nature_phone_number_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_eco_nature_phone_number_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_phone_number_text',array(
		'label'	=> __('Add Phone Number Text','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( 'PHONE', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_phone_number',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_phone_number',array(
		'label'	=> __('Add Phone Number','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '+00 987 654 1230', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_email_address_icon',array(
		'default'	=> 'far fa-envelope',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Eco_Nature_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_eco_nature_email_address_icon',array(
		'label'	=> __('Add Email Icon','vw-eco-nature'),
		'transport' => 'refresh',
		'section'	=> 'vw_eco_nature_topbar',
		'setting'	=> 'vw_eco_nature_email_address_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_eco_nature_email_address_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_email_address_text',array(
		'label'	=> __('Add Email Address Text','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( 'EMAIL', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_email_address',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_email_address',array(
		'label'	=> __('Add Email Address','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( 'example@gmail.com', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_donate_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_donate_text',array(
		'label'	=> __('Add Button Text','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( 'DONATE NOW', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_donate_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('vw_eco_nature_donate_url',array(
		'label'	=> __('Add Button URL','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( 'www.example.com', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_topbar',
		'type'=> 'text'
	));
    
	//Slider
	$wp_customize->add_section( 'vw_eco_nature_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'vw-eco-nature' ),
		'panel' => 'vw_eco_nature_panel_id'
	) );

	$wp_customize->add_setting( 'vw_eco_nature_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','vw-eco-nature' ),
      'section' => 'vw_eco_nature_slidersettings'
    )));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_eco_nature_slider_hide_show',array(
		'selector'        => '#slider .inner_carousel h1',
		'render_callback' => 'vw_eco_nature_customize_partial_vw_eco_nature_slider_hide_show',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'vw_eco_nature_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_eco_nature_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_eco_nature_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'vw-eco-nature' ),
			'description' => __('Slider image size (1500 x 590)','vw-eco-nature'),
			'section'  => 'vw_eco_nature_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting('vw_eco_nature_before_slider_button_icon',array(
		'default'	=> 'fas fa-plus',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Eco_Nature_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_eco_nature_before_slider_button_icon',array(
		'label'	=> __('Add Before Slider Button Icon','vw-eco-nature'),
		'transport' => 'refresh',
		'section'	=> 'vw_eco_nature_slidersettings',
		'setting'	=> 'vw_eco_nature_before_slider_button_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_eco_nature_after_slider_button_icon',array(
		'default'	=> 'fas fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Eco_Nature_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_eco_nature_after_slider_button_icon',array(
		'label'	=> __('Add After Slider Button Icon','vw-eco-nature'),
		'transport' => 'refresh',
		'section'	=> 'vw_eco_nature_slidersettings',
		'setting'	=> 'vw_eco_nature_after_slider_button_icon',
		'type'		=> 'icon'
	)));

	//content layout
	$wp_customize->add_setting('vw_eco_nature_slider_content_option',array(
        'default' => __('Center','vw-eco-nature'),
        'sanitize_callback' => 'vw_eco_nature_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Eco_Nature_Image_Radio_Control($wp_customize, 'vw_eco_nature_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','vw-eco-nature'),
        'section' => 'vw_eco_nature_slidersettings',
        'choices' => array(
            'Left' => get_template_directory_uri().'/assets/images/slider-content1.png',
            'Center' => get_template_directory_uri().'/assets/images/slider-content2.png',
            'Right' => get_template_directory_uri().'/assets/images/slider-content3.png',
    ))));

    //Slider excerpt
	$wp_customize->add_setting( 'vw_eco_nature_slider_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_eco_nature_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-eco-nature' ),
		'section'     => 'vw_eco_nature_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_eco_nature_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('vw_eco_nature_slider_opacity_color',array(
      'default'              => 0.5,
      'sanitize_callback' => 'vw_eco_nature_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_eco_nature_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','vw-eco-nature' ),
	'section'     => 'vw_eco_nature_slidersettings',
	'type'        => 'select',
	'settings'    => 'vw_eco_nature_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','vw-eco-nature'),
      '0.1' =>  esc_attr('0.1','vw-eco-nature'),
      '0.2' =>  esc_attr('0.2','vw-eco-nature'),
      '0.3' =>  esc_attr('0.3','vw-eco-nature'),
      '0.4' =>  esc_attr('0.4','vw-eco-nature'),
      '0.5' =>  esc_attr('0.5','vw-eco-nature'),
      '0.6' =>  esc_attr('0.6','vw-eco-nature'),
      '0.7' =>  esc_attr('0.7','vw-eco-nature'),
      '0.8' =>  esc_attr('0.8','vw-eco-nature'),
      '0.9' =>  esc_attr('0.9','vw-eco-nature')
	),
	));
    
	//Our Services section
	$wp_customize->add_section( 'vw_eco_nature_services_section' , array(
    	'title'      => __( 'Our Services Settings', 'vw-eco-nature' ),
		'priority'   => null,
		'panel' => 'vw_eco_nature_panel_id'
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_eco_nature_section_title', array( 
		'selector' => '#serv-section h2', 
		'render_callback' => 'vw_eco_nature_customize_partial_vw_eco_nature_section_title',
	));

	$wp_customize->add_setting('vw_eco_nature_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_section_title',array(
		'label'	=> __('Add Section Title','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( 'We Are The Savious of planet Earth', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_services_section',
		'type'=> 'text'
	));

	$categories = get_categories();
	$cat_post = array();
	$cat_post[]= 'select';
	$i = 0;	
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_eco_nature_our_services',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_eco_nature_sanitize_choices',
	));
	$wp_customize->add_control('vw_eco_nature_our_services',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display Services','vw-eco-nature'),
		'description' => __('Image Size (80 x 80)','vw-eco-nature'),
		'section' => 'vw_eco_nature_services_section',
	));

	$wp_customize->add_setting( 'vw_eco_nature_about_page' , array(
		'default'           => '',
		'sanitize_callback' => 'vw_eco_nature_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'vw_eco_nature_about_page' , array(
		'label'    => __( 'Select About Page', 'vw-eco-nature' ),
		'section'  => 'vw_eco_nature_services_section',
		'type'     => 'dropdown-pages'
	) );

	//Services excerpt
	$wp_customize->add_setting( 'vw_eco_nature_services_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_eco_nature_services_excerpt_number', array(
		'label'       => esc_html__( 'Services Excerpt length','vw-eco-nature' ),
		'section'     => 'vw_eco_nature_services_section',
		'type'        => 'range',
		'settings'    => 'vw_eco_nature_services_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog Post
	$wp_customize->add_panel( $VWEcoNatureParentPanel );

	$BlogPostParentPanel = new VW_Eco_Nature_WP_Customize_Panel( $wp_customize, 'blog_post_parent_panel', array(
		'title' => __( 'Blog Post Settings', 'vw-eco-nature' ),
		'panel' => 'vw_eco_nature_panel_id',
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	$wp_customize->add_section('vw_eco_nature_blog_post',array(
		'title'	=> __('Post Settings','vw-eco-nature'),
		'panel' => 'blog_post_parent_panel',
	));	

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_eco_nature_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'vw_eco_nature_customize_partial_vw_eco_nature_toggle_postdate', 
	));

	$wp_customize->add_setting( 'vw_eco_nature_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vw-eco-nature' ),
        'section' => 'vw_eco_nature_blog_post'
    )));

    $wp_customize->add_setting( 'vw_eco_nature_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_toggle_author',array(
		'label' => esc_html__( 'Author','vw-eco-nature' ),
		'section' => 'vw_eco_nature_blog_post'
    )));

    $wp_customize->add_setting( 'vw_eco_nature_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_toggle_comments',array(
		'label' => esc_html__( 'Comments','vw-eco-nature' ),
		'section' => 'vw_eco_nature_blog_post'
    )));

    $wp_customize->add_setting( 'vw_eco_nature_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_toggle_tags', array(
		'label' => esc_html__( 'Tags','vw-eco-nature' ),
		'section' => 'vw_eco_nature_blog_post'
    )));

    $wp_customize->add_setting( 'vw_eco_nature_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_eco_nature_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-eco-nature' ),
		'section'     => 'vw_eco_nature_blog_post',
		'type'        => 'range',
		'settings'    => 'vw_eco_nature_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog layout
    $wp_customize->add_setting('vw_eco_nature_blog_layout_option',array(
        'default' => __('Default','vw-eco-nature'),
        'sanitize_callback' => 'vw_eco_nature_sanitize_choices'
    ));
    $wp_customize->add_control(new VW_Eco_Nature_Image_Radio_Control($wp_customize, 'vw_eco_nature_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','vw-eco-nature'),
        'section' => 'vw_eco_nature_blog_post',
        'choices' => array(
            'Default' => get_template_directory_uri().'/assets/images/blog-layout1.png',
            'Center' => get_template_directory_uri().'/assets/images/blog-layout2.png',
            'Left' => get_template_directory_uri().'/assets/images/blog-layout3.png',
    ))));

    $wp_customize->add_setting('vw_eco_nature_excerpt_settings',array(
        'default' => __('Excerpt','vw-eco-nature'),
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_eco_nature_sanitize_choices'
	));
	$wp_customize->add_control('vw_eco_nature_excerpt_settings',array(
        'type' => 'select',
        'label' => __('Post Content','vw-eco-nature'),
        'section' => 'vw_eco_nature_blog_post',
        'choices' => array(
        	'Content' => __('Content','vw-eco-nature'),
            'Excerpt' => __('Excerpt','vw-eco-nature'),
            'No Content' => __('No Content','vw-eco-nature')
        ),
	) );

	$wp_customize->add_setting('vw_eco_nature_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_blog_post',
		'type'=> 'text'
	));

	// Button Settings
	$wp_customize->add_section( 'vw_eco_nature_button_settings', array(
		'title' => esc_html__( 'Button Settings','vw-eco-nature'),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting('vw_eco_nature_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_button_padding_top_bottom',array(
		'label'	=> __('Padding Top Bottom','vw-eco-nature'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_button_padding_left_right',array(
		'label'	=> __('Padding Left Right','vw-eco-nature'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_eco_nature_button_border_radius', array(
		'default'              => '',
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_eco_nature_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-eco-nature' ),
		'section'     => 'vw_eco_nature_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_eco_nature_before_blog_button_icon',array(
		'default'	=> 'fas fa-plus',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Eco_Nature_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_eco_nature_before_blog_button_icon',array(
		'label'	=> __('Add Button Icon','vw-eco-nature'),
		'transport' => 'refresh',
		'section'	=> 'vw_eco_nature_button_settings',
		'setting'	=> 'vw_eco_nature_before_blog_button_icon',
		'type'		=> 'icon'
	)));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_eco_nature_button_text', array( 
		'selector' => '.post-main-box .more-btn a', 
		'render_callback' => 'vw_eco_nature_customize_partial_vw_eco_nature_button_text', 
	));

    $wp_customize->add_setting('vw_eco_nature_button_text',array(
		'default'=> 'READ MORE',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_button_text',array(
		'label'	=> __('Add Button Text','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_after_blog_button_icon',array(
		'default'	=> 'fas fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Eco_Nature_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_eco_nature_after_blog_button_icon',array(
		'label'	=> __('Add Button Icon','vw-eco-nature'),
		'transport' => 'refresh',
		'section'	=> 'vw_eco_nature_button_settings',
		'setting'	=> 'vw_eco_nature_after_blog_button_icon',
		'type'		=> 'icon'
	)));

	// Related Post Settings
	$wp_customize->add_section( 'vw_eco_nature_related_posts_settings', array(
		'title' => __( 'Related Posts Settings', 'vw-eco-nature' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_eco_nature_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'vw_eco_nature_customize_partial_vw_eco_nature_related_post_title', 
	));

    $wp_customize->add_setting( 'vw_eco_nature_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_related_post',array(
		'label' => esc_html__( 'Related Post','vw-eco-nature' ),
		'section' => 'vw_eco_nature_related_posts_settings'
    )));

    $wp_customize->add_setting('vw_eco_nature_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_related_post_title',array(
		'label'	=> __('Add Related Post Title','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( 'Related Post', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vw_eco_nature_related_posts_count',array(
		'default'=> '3',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_related_posts_count',array(
		'label'	=> __('Add Related Post Count','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '3', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_related_posts_settings',
		'type'=> 'number'
	));

    //404 Page Setting
	$wp_customize->add_section('vw_eco_nature_404_page',array(
		'title'	=> __('404 Page Settings','vw-eco-nature'),
		'panel' => 'vw_eco_nature_panel_id',
	));	

	$wp_customize->add_setting('vw_eco_nature_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_eco_nature_404_page_title',array(
		'label'	=> __('Add Title','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_eco_nature_404_page_content',array(
		'label'	=> __('Add Text','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_before_404_page_button_icon',array(
		'default'	=> 'fas fa-plus',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Eco_Nature_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_eco_nature_before_404_page_button_icon',array(
		'label'	=> __('Add Button Icon','vw-eco-nature'),
		'transport' => 'refresh',
		'section'	=> 'vw_eco_nature_404_page',
		'setting'	=> 'vw_eco_nature_before_404_page_button_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_eco_nature_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_404_page_button_text',array(
		'label'	=> __('Add Button Text','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( 'GO BACK', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_eco_nature_after_404_page_button_icon',array(
		'default'	=> 'fas fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Eco_Nature_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_eco_nature_after_404_page_button_icon',array(
		'label'	=> __('Add Button Icon','vw-eco-nature'),
		'transport' => 'refresh',
		'section'	=> 'vw_eco_nature_404_page',
		'setting'	=> 'vw_eco_nature_after_404_page_button_icon',
		'type'		=> 'icon'
	)));

	//Responsive Media Settings
	$wp_customize->add_section('vw_eco_nature_responsive_media',array(
		'title'	=> __('Responsive Media','vw-eco-nature'),
		'panel' => 'vw_eco_nature_panel_id',
	));

	$wp_customize->add_setting( 'vw_eco_nature_resp_topbar_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_resp_topbar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Topbar','vw-eco-nature' ),
      'section' => 'vw_eco_nature_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_eco_nature_stickyheader_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_stickyheader_hide_show',array(
      'label' => esc_html__( 'Sticky Header','vw-eco-nature' ),
      'section' => 'vw_eco_nature_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_eco_nature_resp_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_resp_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','vw-eco-nature' ),
      'section' => 'vw_eco_nature_responsive_media'
    )));

	$wp_customize->add_setting( 'vw_eco_nature_metabox_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_metabox_hide_show',array(
      'label' => esc_html__( 'Show / Hide Metabox','vw-eco-nature' ),
      'section' => 'vw_eco_nature_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_eco_nature_sidebar_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_sidebar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Sidebar','vw-eco-nature' ),
      'section' => 'vw_eco_nature_responsive_media'
    )));

    $wp_customize->add_setting('vw_eco_nature_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Eco_Nature_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_eco_nature_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','vw-eco-nature'),
		'transport' => 'refresh',
		'section'	=> 'vw_eco_nature_responsive_media',
		'setting'	=> 'vw_eco_nature_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_eco_nature_res_close_menus_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Eco_Nature_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_eco_nature_res_close_menus_icon',array(
		'label'	=> __('Add Close Menu Icon','vw-eco-nature'),
		'transport' => 'refresh',
		'section'	=> 'vw_eco_nature_responsive_media',
		'setting'	=> 'vw_eco_nature_res_close_menus_icon',
		'type'		=> 'icon'
	)));

	//Content Creation
	$wp_customize->add_section( 'vw_eco_nature_content_section' , array(
    	'title' => __( 'Customize Home Page Settings', 'vw-eco-nature' ),
		'priority' => null,
		'panel' => 'vw_eco_nature_panel_id'
	) );

	$wp_customize->add_setting('vw_eco_nature_content_creation_main_control', array(
		'sanitize_callback' => 'esc_html',
	) );

	$homepage= get_option( 'page_on_front' );

	$wp_customize->add_control(	new VW_Eco_Nature_Content_Creation( $wp_customize, 'vw_eco_nature_content_creation_main_control', array(
		'options' => array(
			esc_html__( 'First select static page in homepage setting for front page.Below given edit button is to customize Home Page. Just click on the edit option, add whatever elements you want to include in the homepage, save the changes and you are good to go.','vw-eco-nature' ),
		),
		'section' => 'vw_eco_nature_content_section',
		'button_url'  => admin_url( 'post.php?post='.$homepage.'&action=edit'),
		'button_text' => esc_html__( 'Edit', 'vw-eco-nature' ),
	) ) );

	//Footer Text
	$wp_customize->add_section('vw_eco_nature_footer',array(
		'title'	=> __('Footer Settings','vw-eco-nature'),
		'panel' => 'vw_eco_nature_panel_id',
	));	

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_eco_nature_footer_text', array( 
		'selector' => '.copyright p', 
		'render_callback' => 'vw_eco_nature_customize_partial_vw_eco_nature_footer_text', 
	));
	
	$wp_customize->add_setting('vw_eco_nature_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_eco_nature_footer_text',array(
		'label'	=> __('Copyright Text','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( 'Copyright 2019, .....', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_footer',
		'type'=> 'text'
	));	

	$wp_customize->add_setting('vw_eco_nature_copyright_alingment',array(
        'default' => __('center','vw-eco-nature'),
        'sanitize_callback' => 'vw_eco_nature_sanitize_choices'
	));
	$wp_customize->add_control(new vw_eco_nature_Image_Radio_Control($wp_customize, 'vw_eco_nature_copyright_alingment', array(
        'type' => 'select',
        'label' => __('Copyright Alignment','vw-eco-nature'),
        'section' => 'vw_eco_nature_footer',
        'settings' => 'vw_eco_nature_copyright_alingment',
        'choices' => array(
            'left' => get_template_directory_uri().'/assets/images/copyright1.png',
            'center' => get_template_directory_uri().'/assets/images/copyright2.png',
            'right' => get_template_directory_uri().'/assets/images/copyright3.png'
    ))));

    $wp_customize->add_setting('vw_eco_nature_copyright_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_eco_nature_copyright_padding_top_bottom',array(
		'label'	=> __('Copyright Padding Top Bottom','vw-eco-nature'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-eco-nature'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-eco-nature' ),
        ),
		'section'=> 'vw_eco_nature_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_eco_nature_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_eco_nature_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Eco_Nature_Toggle_Switch_Custom_Control( $wp_customize, 'vw_eco_nature_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-eco-nature' ),
      	'section' => 'vw_eco_nature_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_eco_nature_scroll_to_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'vw_eco_nature_customize_partial_vw_eco_nature_scroll_to_top_icon', 
	));

    $wp_customize->add_setting('vw_eco_nature_scroll_to_top_icon',array(
		'default'	=> 'fas fa-angle-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Eco_Nature_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_eco_nature_scroll_to_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','vw-eco-nature'),
		'transport' => 'refresh',
		'section'	=> 'vw_eco_nature_footer',
		'setting'	=> 'vw_eco_nature_scroll_to_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_eco_nature_scroll_top_alignment',array(
        'default' => __('Right','vw-eco-nature'),
        'sanitize_callback' => 'vw_eco_nature_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Eco_Nature_Image_Radio_Control($wp_customize, 'vw_eco_nature_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','vw-eco-nature'),
        'section' => 'vw_eco_nature_footer',
        'settings' => 'vw_eco_nature_scroll_top_alignment',
        'choices' => array(
            'Left' => get_template_directory_uri().'/assets/images/layout1.png',
            'Center' => get_template_directory_uri().'/assets/images/layout2.png',
            'Right' => get_template_directory_uri().'/assets/images/layout3.png'
    ))));

    // new Panel
	$wp_customize->register_panel_type( 'VW_Eco_Nature_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'VW_Eco_Nature_WP_Customize_Section' );
}

add_action( 'customize_register', 'vw_eco_nature_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
 	class VW_Eco_Nature_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'vw_eco_nature_panel';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class VW_Eco_Nature_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'vw_eco_nature_section';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
  	}
}

// Enqueue our scripts and styles
function vw_eco_nature_customize_controls_scripts() {
  wp_enqueue_script( 'customizer-controls', get_theme_file_uri( '/assets/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'vw_eco_nature_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Eco_Nature_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Eco_Nature_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new VW_Eco_Nature_Customize_Section_Pro($manager,'example_1',array(
			'priority'   => 1,
			'title'    => esc_html__( 'VW Eco Nature Pro', 'vw-eco-nature' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-eco-nature' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/eco-nature-wordpress-theme/'),
		)));

		// Register sections.
		$manager->add_section(new VW_Eco_Nature_Customize_Section_Pro($manager,'example_2',array(
			'priority'   => 1,
			'title'    => esc_html__( 'Documentation', 'vw-eco-nature' ),
			'pro_text' => esc_html__( 'Docs', 'vw-eco-nature' ),
			'pro_url'  => admin_url('themes.php?page=vw_eco_nature_guide'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-eco-nature-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-eco-nature-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Eco_Nature_Customize::get_instance();