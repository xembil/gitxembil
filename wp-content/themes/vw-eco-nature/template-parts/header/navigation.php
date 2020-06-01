<?php
/**
 * The template part for header
 *
 * @package VW Eco Nature 
 * @subpackage vw_eco_nature
 * @since VW Eco Nature 1.0
 */
?>

<div id="header" class="menubar">
	<div class="header-menu <?php if( get_theme_mod( 'vw_eco_nature_sticky_header') != '') { ?> header-sticky"<?php } else { ?>close-sticky <?php } ?>">
		<div class="container">
			<div class="row">
				<div class="<?php if( get_theme_mod( 'vw_eco_nature_search_hide_show',true) != '') { ?>col-lg-11 col-md-10 col-6"<?php } else { ?>col-lg-12 col-md-10"<?php } ?>">
					<div class="toggle-nav mobile-menu">
					    <button role="tab" onclick="vw_eco_nature_menu_open_nav()"><i class="<?php echo esc_attr(get_theme_mod('vw_eco_nature_res_open_menu_icon','fas fa-bars')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','vw-eco-nature'); ?></span></button>
					</div>
					<div id="mySidenav" class="nav sidenav">
				        <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'vw-eco-nature' ); ?>">
				            <?php 
				              wp_nav_menu( array( 
				                'theme_location' => 'primary',
				                'container_class' => 'main-menu clearfix' ,
				                'menu_class' => 'clearfix',
				                'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
				                'fallback_cb' => 'wp_page_menu',
				              ) ); 
				            ?>
				            <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="vw_eco_nature_menu_close_nav()"><i class="<?php echo esc_attr(get_theme_mod('vw_eco_nature_res_close_menus_icon','fas fa-times')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','vw-eco-nature'); ?></span></a>
				        </nav>
			        </div>
				</div>
				<div class="col-lg-1 col-md-2 col-6">
			        <?php if( get_theme_mod( 'vw_eco_nature_search_hide_show',true) != '') { ?>
				        <div class="search-box">
				        	<a href="#" onclick="vw_eco_nature_search_open()"><span><i class="fas fa-search"></i></span></a>
				        </div>
			        <?php }?>
			    </div>
			</div>
			<div class="serach_outer">
		        <div class="serach_inner">
	          		<?php get_search_form(); ?>
		        </div>
		        <a href="#main" onclick="vw_eco_nature_search_close()" class="closepop"><i class="fa fa-window-close"></i></a>
		      </div>
		</div>
	</div>
</div>