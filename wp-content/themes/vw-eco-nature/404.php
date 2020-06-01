<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package VW Eco Nature
 */

get_header(); ?>

<main id="maincontent" role="main" class="content-vw">
	<div class="container">
		<div class="page-content">
	    	<h1><?php echo esc_html(get_theme_mod('vw_eco_nature_404_page_title',__('404 Not Found','vw-eco-nature')));?></h1>
			<p class="text-404"><?php echo esc_html(get_theme_mod('vw_eco_nature_404_page_content',__('Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.','vw-eco-nature')));?></p>
			<?php if( get_theme_mod('vw_eco_nature_404_page_button_text','GO BACK') != ''){ ?>
				<div class="more-btn">
			        <a href="<?php echo esc_url(home_url()); ?>"><i class="<?php echo esc_attr(get_theme_mod('vw_eco_nature_before_404_page_button_icon','fas fa-plus')); ?>"></i><?php echo esc_html(get_theme_mod('vw_eco_nature_404_page_button_text',__('GO BACK','vw-eco-nature')));?><i class="<?php echo esc_attr(get_theme_mod('vw_eco_nature_after_404_page_button_icon','fas fa-angle-right')); ?>"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_eco_nature_404_page_button_text',__('GO BACK','vw-eco-nature')));?></span></a>
			    </div>
			<?php } ?>
		   </div>
		<div class="clearfix"></div>
	</div>
</main>

<?php get_footer(); ?>