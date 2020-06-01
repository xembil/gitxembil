<?php
/**
 * The template part for displaying grid post
 *
 * @package VW Eco Nature
 * @subpackage vw-eco-nature
 * @since VW Eco Nature 1.0
 */
?>

<div class="col-lg-4 col-md-6">
	<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
	    <div class="post-main-box">
	      	<div class="box-image">
	          	<?php 
		            if(has_post_thumbnail()) { 
		              the_post_thumbnail(); 
		            }
	          	?>
	        </div>
	        <h2 class="section-title"><?php the_title();?></h2>
	        <div class="new-text">
	        	<div class="entry-content">
	        		<p>
			          <?php $excerpt = get_the_excerpt(); echo esc_html( vw_eco_nature_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_eco_nature_excerpt_number','30')))); ?> <?php echo esc_html( get_theme_mod('vw_eco_nature_excerpt_suffix','') ); ?>
			        </p>
	        	</div>
	        </div>
	        <?php if( get_theme_mod('vw_eco_nature_button_text','READ MORE') != ''){ ?>
		        <div class="more-btn">
		          <a href="<?php echo esc_url(get_permalink()); ?>"><i class="<?php echo esc_attr(get_theme_mod('vw_eco_nature_before_blog_button_icon','fas fa-plus')); ?>"></i><?php echo esc_html(get_theme_mod('vw_eco_nature_button_text',__('READ MORE','vw-eco-nature')));?><i class="<?php echo esc_attr(get_theme_mod('vw_eco_nature_after_blog_button_icon','fas fa-angle-right')); ?>"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_eco_nature_button_text',__('READ MORE','vw-eco-nature')));?></span></a>
		        </div>
	        <?php } ?>
	    </div>
	    <div class="clearfix"></div>
  	</article>
</div>