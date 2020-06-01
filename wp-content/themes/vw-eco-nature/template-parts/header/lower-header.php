<?php
/**
 * The template part for header
 *
 * @package VW Eco Nature 
 * @subpackage vw_eco_nature
 * @since VW Eco Nature 1.0
 */
?>
<?php if( get_theme_mod('vw_eco_nature_topbar_hide_show') != ''){ ?>
  <div class="container">
    <div class="lower-header">
      <div class="row">
        <div class="col-lg-5 col-md-5">
          <?php if( get_theme_mod( 'vw_eco_nature_location') != '') { ?>
            <div class="icon-space">
              <i class="<?php echo esc_attr(get_theme_mod('vw_eco_nature_location_icon','fas fa-map-marker-alt')); ?>"></i><b><?php echo esc_html(get_theme_mod('vw_eco_nature_location_text',''));?>:</b><span><?php echo esc_html(get_theme_mod('vw_eco_nature_location',''));?></span>
            </div>
          <?php }?>
        </div>
        <div class="col-lg-3 col-md-3">
          <?php if( get_theme_mod( 'vw_eco_nature_phone_number') != '') { ?>
            <div class="icon-space">
              <i class="<?php echo esc_attr(get_theme_mod('vw_eco_nature_phone_number_icon','fas fa-phone')); ?>"></i><b><?php echo esc_html(get_theme_mod('vw_eco_nature_phone_number_text',''));?>:</b><span><?php echo esc_html(get_theme_mod('vw_eco_nature_phone_number',''));?></span>
            </div>
          <?php }?>
        </div>
        <div class="col-lg-4 col-md-4">
          <?php if( get_theme_mod( 'vw_eco_nature_email_address') != '') { ?>
            <div class="icon-space">
              <i class="<?php echo esc_attr(get_theme_mod('vw_eco_nature_email_address_icon','far fa-envelope')); ?>"></i><b><?php echo esc_html(get_theme_mod('vw_eco_nature_email_address_text',''));?>:</b><span><?php echo esc_html(get_theme_mod('vw_eco_nature_email_address',''));?></span>
            </div>
          <?php }?>
        </div>
      </div>
    </div>
  </div>
<?php } ?>