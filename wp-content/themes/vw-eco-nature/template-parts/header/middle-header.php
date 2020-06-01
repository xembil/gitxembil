<?php
/**
 * The template part for top header
 *
 * @package VW Eco Nature 
 * @subpackage vw_eco_nature
 * @since VW Eco Nature 1.0
 */
?>

<div id="topbar">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-4">
        <?php if( get_theme_mod( 'vw_eco_nature_donate_url') != '' || get_theme_mod( 'vw_eco_nature_donate_text') != '') {?>
          <div class="donate-btn">
            <a href="<?php echo esc_url(get_theme_mod('vw_eco_nature_donate_url',''));?>"><?php echo esc_html(get_theme_mod('vw_eco_nature_donate_text',''));?><span class="screen-reader-text"><?php esc_html_e( 'DONATE NOW','vw-eco-nature' );?></span></a>
          </div>
        <?php }?>
      </div>
      <div class="col-lg-4 col-md-4">
        <div class="logo">
          <?php if ( has_custom_logo() ) : ?>
            <div class="site-logo"><?php the_custom_logo(); ?></div>
            <?php endif; ?>
            <?php $blog_info = get_bloginfo( 'name' ); ?>
            <?php if( get_theme_mod('vw_eco_nature_logo_title_hide_show',true) != ''){ ?>
              <?php if ( ! empty( $blog_info ) ) : ?>
                <?php if ( is_front_page() && is_home() ) : ?>
                  <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php else : ?>
                  <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php endif; ?>
              <?php endif; ?>
            <?php }?>
            <?php
              $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) :
            ?>
            <?php if( get_theme_mod('vw_eco_nature_tagline_hide_show',true) != ''){ ?>
              <p class="site-description">
                <?php echo esc_html($description); ?>
              </p>
            <?php }?>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-lg-4 col-md-4">
        <?php dynamic_sidebar('social-links'); ?>
      </div>
    </div>
  </div>
</div>