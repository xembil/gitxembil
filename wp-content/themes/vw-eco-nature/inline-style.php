<?php
	
	/*-------------First highlight color-------------------*/

	$vw_eco_nature_first_color = get_theme_mod('vw_eco_nature_first_color');

	$vw_eco_nature_custom_css = '';

	if($vw_eco_nature_first_color != false){
		$vw_eco_nature_custom_css .='#header, #footer-2, .scrollup i, #footer .tagcloud a:hover, input[type="submit"], #sidebar .custom-social-icons i, #footer .custom-social-icons i, .more-btn a, .donate-btn a:hover, #topbar .custom-social-icons i:hover, #sidebar h3, .pagination .current, .pagination a:hover, #sidebar .tagcloud a:hover, #comments input[type="submit"], nav.woocommerce-MyAccount-navigation ul li, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .more-btn a i:first-child, #slider .more-btn a i:first-child, .header-fixed, #comments a.comment-reply-link, #footer a.custom_read_more, #sidebar a.custom_read_more{';
			$vw_eco_nature_custom_css .='background-color: '.esc_html($vw_eco_nature_first_color).';';
		$vw_eco_nature_custom_css .='}';
	}
	if($vw_eco_nature_first_color != false){
		$vw_eco_nature_custom_css .='a, #footer li a:hover, #footer .custom-social-icons i:hover, .icon-space i, #sidebar ul li a:hover, .post-main-box:hover h2, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, .entry-content a, .sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a, .main-navigation ul.sub-menu a:hover{';
			$vw_eco_nature_custom_css .='color: '.esc_html($vw_eco_nature_first_color).';';
		$vw_eco_nature_custom_css .='}';
	}
	if($vw_eco_nature_first_color != false){
		$vw_eco_nature_custom_css .='.donate-btn a:hover, #topbar .custom-social-icons i:hover{';
			$vw_eco_nature_custom_css .='border-color: '.esc_html($vw_eco_nature_first_color).';';
		$vw_eco_nature_custom_css .='}';
	}
	if($vw_eco_nature_first_color != false){
		$vw_eco_nature_custom_css .='.main-navigation ul ul{';
			$vw_eco_nature_custom_css .='border-top-color: '.esc_html($vw_eco_nature_first_color).';';
		$vw_eco_nature_custom_css .='}';
	}
	if($vw_eco_nature_first_color != false){
		$vw_eco_nature_custom_css .='#footer h3:after, .main-navigation ul ul{';
			$vw_eco_nature_custom_css .='border-bottom-color: '.esc_html($vw_eco_nature_first_color).';';
		$vw_eco_nature_custom_css .='}';
	}

	/*---------------------------Second highlight color-------------------*/

	$vw_eco_nature_second_color = get_theme_mod('vw_eco_nature_second_color');

	if($vw_eco_nature_second_color != false){
		$vw_eco_nature_custom_css .='.more-btn a:hover, .main-navigation a:hover, #sidebar .woocommerce-product-search button, #sidebar .widget_price_filter .ui-slider .ui-slider-range, #sidebar .widget_price_filter .ui-slider .ui-slider-handle, #footer .widget_price_filter .ui-slider .ui-slider-range, #footer .widget_price_filter .ui-slider .ui-slider-handle, #footer .woocommerce-product-search button, #sidebar a.custom_read_more:hover, #footer a.custom_read_more:hover{';
			$vw_eco_nature_custom_css .='background-color: '.esc_html($vw_eco_nature_second_color).';';
		$vw_eco_nature_custom_css .='}';
	}
	if($vw_eco_nature_second_color != false){
		$vw_eco_nature_custom_css .='.more-btn a i:first-child, #slider .more-btn a i:first-child{
		box-shadow: inset 2px 2px 10px '.esc_html($vw_eco_nature_second_color).';
		}';
	}

	/*---------------------------Width Layout -------------------*/

	$vw_eco_nature_theme_lay = get_theme_mod( 'vw_eco_nature_width_option','Full Width');
    if($vw_eco_nature_theme_lay == 'Boxed'){
		$vw_eco_nature_custom_css .='body{';
			$vw_eco_nature_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$vw_eco_nature_custom_css .='}';
	}else if($vw_eco_nature_theme_lay == 'Wide Width'){
		$vw_eco_nature_custom_css .='body{';
			$vw_eco_nature_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$vw_eco_nature_custom_css .='}';
	}else if($vw_eco_nature_theme_lay == 'Full Width'){
		$vw_eco_nature_custom_css .='body{';
			$vw_eco_nature_custom_css .='max-width: 100%;';
		$vw_eco_nature_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$vw_eco_nature_theme_lay = get_theme_mod( 'vw_eco_nature_slider_opacity_color','0.5');
	if($vw_eco_nature_theme_lay == '0'){
		$vw_eco_nature_custom_css .='#slider img{';
			$vw_eco_nature_custom_css .='opacity:0';
		$vw_eco_nature_custom_css .='}';
		}else if($vw_eco_nature_theme_lay == '0.1'){
		$vw_eco_nature_custom_css .='#slider img{';
			$vw_eco_nature_custom_css .='opacity:0.1';
		$vw_eco_nature_custom_css .='}';
		}else if($vw_eco_nature_theme_lay == '0.2'){
		$vw_eco_nature_custom_css .='#slider img{';
			$vw_eco_nature_custom_css .='opacity:0.2';
		$vw_eco_nature_custom_css .='}';
		}else if($vw_eco_nature_theme_lay == '0.3'){
		$vw_eco_nature_custom_css .='#slider img{';
			$vw_eco_nature_custom_css .='opacity:0.3';
		$vw_eco_nature_custom_css .='}';
		}else if($vw_eco_nature_theme_lay == '0.4'){
		$vw_eco_nature_custom_css .='#slider img{';
			$vw_eco_nature_custom_css .='opacity:0.4';
		$vw_eco_nature_custom_css .='}';
		}else if($vw_eco_nature_theme_lay == '0.5'){
		$vw_eco_nature_custom_css .='#slider img{';
			$vw_eco_nature_custom_css .='opacity:0.5';
		$vw_eco_nature_custom_css .='}';
		}else if($vw_eco_nature_theme_lay == '0.6'){
		$vw_eco_nature_custom_css .='#slider img{';
			$vw_eco_nature_custom_css .='opacity:0.6';
		$vw_eco_nature_custom_css .='}';
		}else if($vw_eco_nature_theme_lay == '0.7'){
		$vw_eco_nature_custom_css .='#slider img{';
			$vw_eco_nature_custom_css .='opacity:0.7';
		$vw_eco_nature_custom_css .='}';
		}else if($vw_eco_nature_theme_lay == '0.8'){
		$vw_eco_nature_custom_css .='#slider img{';
			$vw_eco_nature_custom_css .='opacity:0.8';
		$vw_eco_nature_custom_css .='}';
		}else if($vw_eco_nature_theme_lay == '0.9'){
		$vw_eco_nature_custom_css .='#slider img{';
			$vw_eco_nature_custom_css .='opacity:0.9';
		$vw_eco_nature_custom_css .='}';
		}

	/*---------------------------Slider Content Layout -------------------*/

	$vw_eco_nature_theme_lay = get_theme_mod( 'vw_eco_nature_slider_content_option','Center');
    if($vw_eco_nature_theme_lay == 'Left'){
		$vw_eco_nature_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_eco_nature_custom_css .='text-align:left; left:15%; right:45%;';
		$vw_eco_nature_custom_css .='}';
	}else if($vw_eco_nature_theme_lay == 'Center'){
		$vw_eco_nature_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_eco_nature_custom_css .='text-align:center; left:20%; right:20%;';
		$vw_eco_nature_custom_css .='}';
	}else if($vw_eco_nature_theme_lay == 'Right'){
		$vw_eco_nature_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_eco_nature_custom_css .='text-align:right; left:45%; right:15%;';
		$vw_eco_nature_custom_css .='}';
	}

	/*--------------------------- Slider -------------------*/

	$vw_eco_nature_slider = get_theme_mod('vw_eco_nature_slider_hide_show');
	if($vw_eco_nature_slider == false){
		$vw_eco_nature_custom_css .='.page-template-custom-home-page #serv-section{';
			$vw_eco_nature_custom_css .='padding: 0;';
		$vw_eco_nature_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$vw_eco_nature_theme_lay = get_theme_mod( 'vw_eco_nature_blog_layout_option','Default');
    if($vw_eco_nature_theme_lay == 'Default'){
		$vw_eco_nature_custom_css .='.post-main-box{';
			$vw_eco_nature_custom_css .='';
		$vw_eco_nature_custom_css .='}';
	}else if($vw_eco_nature_theme_lay == 'Center'){
		$vw_eco_nature_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn{';
			$vw_eco_nature_custom_css .='text-align:center;';
		$vw_eco_nature_custom_css .='}';
		$vw_eco_nature_custom_css .='.post-info, .content-bttn{';
			$vw_eco_nature_custom_css .='margin-top:10px;';
		$vw_eco_nature_custom_css .='}';
		$vw_eco_nature_custom_css .='.post-info hr{';
			$vw_eco_nature_custom_css .='margin:15px auto;';
		$vw_eco_nature_custom_css .='}';
	}else if($vw_eco_nature_theme_lay == 'Left'){
		$vw_eco_nature_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$vw_eco_nature_custom_css .='text-align:Left;';
		$vw_eco_nature_custom_css .='}';
		$vw_eco_nature_custom_css .='.content-bttn{';
			$vw_eco_nature_custom_css .='margin:20px 0;';
		$vw_eco_nature_custom_css .='}';
		$vw_eco_nature_custom_css .='.post-info hr{';
			$vw_eco_nature_custom_css .='margin-bottom:10px;';
		$vw_eco_nature_custom_css .='}';
		$vw_eco_nature_custom_css .='.post-main-box h2{';
			$vw_eco_nature_custom_css .='margin-top:10px;';
		$vw_eco_nature_custom_css .='}';
	}

	/*----------------Responsive Media -----------------------*/

	$vw_eco_nature_resp_topbar = get_theme_mod( 'vw_eco_nature_resp_topbar_hide_show',false);
    if($vw_eco_nature_resp_topbar == true){
    	$vw_eco_nature_custom_css .='@media screen and (max-width:575px) {';
		$vw_eco_nature_custom_css .='.lower-header{';
			$vw_eco_nature_custom_css .='display:block;';
		$vw_eco_nature_custom_css .='} }';
	}else if($vw_eco_nature_resp_topbar == false){
		$vw_eco_nature_custom_css .='@media screen and (max-width:575px) {';
		$vw_eco_nature_custom_css .='.lower-header{';
			$vw_eco_nature_custom_css .='display:none;';
		$vw_eco_nature_custom_css .='} }';
	}

	$vw_eco_nature_resp_stickyheader = get_theme_mod( 'vw_eco_nature_stickyheader_hide_show',false);
    if($vw_eco_nature_resp_stickyheader == true){
    	$vw_eco_nature_custom_css .='@media screen and (max-width:575px) {';
		$vw_eco_nature_custom_css .='.header-fixed{';
			$vw_eco_nature_custom_css .='display:block;';
		$vw_eco_nature_custom_css .='} }';
	}else if($vw_eco_nature_resp_stickyheader == false){
		$vw_eco_nature_custom_css .='@media screen and (max-width:575px) {';
		$vw_eco_nature_custom_css .='.header-fixed{';
			$vw_eco_nature_custom_css .='display:none;';
		$vw_eco_nature_custom_css .='} }';
	}

	$vw_eco_nature_resp_slider = get_theme_mod( 'vw_eco_nature_resp_slider_hide_show',false);
    if($vw_eco_nature_resp_slider == true){
    	$vw_eco_nature_custom_css .='@media screen and (max-width:575px) {';
		$vw_eco_nature_custom_css .='#slider{';
			$vw_eco_nature_custom_css .='display:block;';
		$vw_eco_nature_custom_css .='} }';
	}else if($vw_eco_nature_resp_slider == false){
		$vw_eco_nature_custom_css .='@media screen and (max-width:575px) {';
		$vw_eco_nature_custom_css .='#slider{';
			$vw_eco_nature_custom_css .='display:none;';
		$vw_eco_nature_custom_css .='} }';
	}

	$vw_eco_nature_resp_metabox = get_theme_mod( 'vw_eco_nature_metabox_hide_show',true);
    if($vw_eco_nature_resp_metabox == true){
    	$vw_eco_nature_custom_css .='@media screen and (max-width:575px) {';
		$vw_eco_nature_custom_css .='.post-info{';
			$vw_eco_nature_custom_css .='display:block;';
		$vw_eco_nature_custom_css .='} }';
	}else if($vw_eco_nature_resp_metabox == false){
		$vw_eco_nature_custom_css .='@media screen and (max-width:575px) {';
		$vw_eco_nature_custom_css .='.post-info{';
			$vw_eco_nature_custom_css .='display:none;';
		$vw_eco_nature_custom_css .='} }';
	}

	$vw_eco_nature_resp_sidebar = get_theme_mod( 'vw_eco_nature_sidebar_hide_show',true);
    if($vw_eco_nature_resp_sidebar == true){
    	$vw_eco_nature_custom_css .='@media screen and (max-width:575px) {';
		$vw_eco_nature_custom_css .='#sidebar{';
			$vw_eco_nature_custom_css .='display:block;';
		$vw_eco_nature_custom_css .='} }';
	}else if($vw_eco_nature_resp_sidebar == false){
		$vw_eco_nature_custom_css .='@media screen and (max-width:575px) {';
		$vw_eco_nature_custom_css .='#sidebar{';
			$vw_eco_nature_custom_css .='display:none;';
		$vw_eco_nature_custom_css .='} }';
	}

	/*------------- Top Bar Settings ------------------*/

	$vw_eco_nature_topbar_padding_top_bottom = get_theme_mod('vw_eco_nature_topbar_padding_top_bottom');
	if($vw_eco_nature_topbar_padding_top_bottom != false){
		$vw_eco_nature_custom_css .='.lower-header{';
			$vw_eco_nature_custom_css .='padding-top: '.esc_html($vw_eco_nature_topbar_padding_top_bottom).'; padding-bottom: '.esc_html($vw_eco_nature_topbar_padding_top_bottom).';';
		$vw_eco_nature_custom_css .='}';
	}

	/*------------------ Search Settings -----------------*/
	
	$vw_eco_nature_search_padding_top_bottom = get_theme_mod('vw_eco_nature_search_padding_top_bottom');
	$vw_eco_nature_search_padding_left_right = get_theme_mod('vw_eco_nature_search_padding_left_right');
	$vw_eco_nature_search_font_size = get_theme_mod('vw_eco_nature_search_font_size');
	$vw_eco_nature_search_border_radius = get_theme_mod('vw_eco_nature_search_border_radius');
	if($vw_eco_nature_search_padding_top_bottom != false || $vw_eco_nature_search_padding_left_right != false || $vw_eco_nature_search_font_size != false || $vw_eco_nature_search_border_radius != false){
		$vw_eco_nature_custom_css .='.search-box i{';
			$vw_eco_nature_custom_css .='padding-top: '.esc_html($vw_eco_nature_search_padding_top_bottom).'; padding-bottom: '.esc_html($vw_eco_nature_search_padding_top_bottom).';padding-left: '.esc_html($vw_eco_nature_search_padding_left_right).';padding-right: '.esc_html($vw_eco_nature_search_padding_left_right).';font-size: '.esc_html($vw_eco_nature_search_font_size).';border-radius: '.esc_html($vw_eco_nature_search_border_radius).'px; border: 1px solid #48b42a;';
		$vw_eco_nature_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$vw_eco_nature_button_padding_top_bottom = get_theme_mod('vw_eco_nature_button_padding_top_bottom');
	$vw_eco_nature_button_padding_left_right = get_theme_mod('vw_eco_nature_button_padding_left_right');
	if($vw_eco_nature_button_padding_top_bottom != false || $vw_eco_nature_button_padding_left_right != false){
		$vw_eco_nature_custom_css .='.more-btn a{';
			$vw_eco_nature_custom_css .='padding-top: '.esc_html($vw_eco_nature_button_padding_top_bottom).'; padding-bottom: '.esc_html($vw_eco_nature_button_padding_top_bottom).';padding-left: '.esc_html($vw_eco_nature_button_padding_left_right).';padding-right: '.esc_html($vw_eco_nature_button_padding_left_right).';';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_button_border_radius = get_theme_mod('vw_eco_nature_button_border_radius');
	if($vw_eco_nature_button_border_radius != false){
		$vw_eco_nature_custom_css .='.more-btn a{';
			$vw_eco_nature_custom_css .='border-radius: '.esc_html($vw_eco_nature_button_border_radius).'px;';
		$vw_eco_nature_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_eco_nature_copyright_alingment = get_theme_mod('vw_eco_nature_copyright_alingment');
	if($vw_eco_nature_copyright_alingment != false){
		$vw_eco_nature_custom_css .='.copyright p{';
			$vw_eco_nature_custom_css .='text-align: '.esc_html($vw_eco_nature_copyright_alingment).';';
		$vw_eco_nature_custom_css .='}';
	}

	$vw_eco_nature_copyright_padding_top_bottom = get_theme_mod('vw_eco_nature_copyright_padding_top_bottom');
	if($vw_eco_nature_copyright_padding_top_bottom != false){
		$vw_eco_nature_custom_css .='#footer-2{';
			$vw_eco_nature_custom_css .='padding-top: '.esc_html($vw_eco_nature_copyright_padding_top_bottom).'; padding-bottom: '.esc_html($vw_eco_nature_copyright_padding_top_bottom).';';
		$vw_eco_nature_custom_css .='}';
	}