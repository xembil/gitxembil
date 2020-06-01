<?php
/**
 * The template part for displaying single post content
 *
 * @package VW Eco Nature
 * @subpackage vw-eco-nature
 * @since VW Eco Nature 1.0
 */
?>
<?php 
  $vw_eco_nature_archive_year  = get_the_time('Y'); 
  $vw_eco_nature_archive_month = get_the_time('m'); 
  $vw_eco_nature_archive_day   = get_the_time('d'); 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
    <div class="single-post">
        <h2><?php the_title(); ?></h2>
        <?php if( get_theme_mod( 'vw_eco_nature_toggle_postdate',true) != '' || get_theme_mod( 'vw_eco_nature_toggle_author',true) != '' || get_theme_mod( 'vw_eco_nature_toggle_comments',true) != '') { ?>
            <div class="post-info">
                <?php if(get_theme_mod('vw_eco_nature_toggle_postdate',true)==1){ ?>
                    <i class="fas fa-calendar-alt"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $vw_eco_nature_archive_year, $vw_eco_nature_archive_month, $vw_eco_nature_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><span>|</span>
                <?php } ?>
                
                <?php if(get_theme_mod('vw_eco_nature_toggle_author',true)==1){ ?>
                    <i class="far fa-user"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span><span>|</span>
                <?php } ?>

                <?php if(get_theme_mod('vw_eco_nature_toggle_comments',true)==1){ ?>
                    <i class="fa fa-comments" aria-hidden="true"></i><span class="entry-comments"><?php comments_number( __('0 Comment', 'vw-eco-nature'), __('0 Comments', 'vw-eco-nature'), __('% Comments', 'vw-eco-nature') ); ?> </span>
                <?php } ?>
            </div>
        <?php } ?>
        <?php if(has_post_thumbnail()) { ?>
            <div class="feature-box">   
              <?php the_post_thumbnail(); ?>
            </div>                 
        <?php } ?> 
        <div class="entry-content">
            <?php the_content(); ?>
            <?php if(get_theme_mod('vw_eco_nature_toggle_tags',true)==1){ ?>
                <div class="tags"><?php the_tags(); ?></div> 
            <?php }?>   
        </div> 
        <?php
            // If comments are open or we have at least one comment, load up the comment template
            if ( comments_open() || '0' != get_comments_number() )
            comments_template();

            if ( is_singular( 'attachment' ) ) {
                // Parent post navigation.
                the_post_navigation( array(
                    'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'vw-eco-nature' ),
                ) );
            } elseif ( is_singular( 'post' ) ) {
                // Previous/next post navigation.
                the_post_navigation( array(
                    'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'vw-eco-nature' ) . '</span> ' .
                        '<span class="screen-reader-text">' . __( 'Next post:', 'vw-eco-nature' ) . '</span> ' .
                        '<span class="post-title">%title</span>',
                    'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'vw-eco-nature' ) . '</span> ' .
                        '<span class="screen-reader-text">' . __( 'Previous post:', 'vw-eco-nature' ) . '</span> ' .
                        '<span class="post-title">%title</span>',
                ) );
            }
        ?>
    </div>
    <?php get_template_part('template-parts/related-posts'); ?>
</article>