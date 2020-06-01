<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * @package VW Eco Nature
 */
?>

<h2 class="entry-title"><?php esc_html_e( 'Nothing Found', 'vw-eco-nature' ); ?></h2>

<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
	<p><?php printf( esc_html__( 'Ready to publish your first post? Get started here.', 'vw-eco-nature' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
	<?php elseif ( is_search() ) : ?>
	<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'vw-eco-nature' ); ?></p><br />
		<?php get_search_form(); ?>
	<?php else : ?>
	<p><?php esc_html_e( 'Dont worry&hellip it happens to the best of us.', 'vw-eco-nature' ); ?></p><br />
	<div class="error-btn">
		<a href="<?php echo esc_url(home_url() ); ?>"><?php esc_html_e( 'Back to Home Page', 'vw-eco-nature' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Back to Home Page','vw-eco-nature' );?></span></a>
	</div>
<?php endif; ?>