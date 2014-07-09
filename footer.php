<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div><!-- #main .wrapper -->
	<footer id="colophon" role="contentinfo">
		<div class="footer-menus" role="navigation">
			<?php wp_nav_menu(array('theme_location' => 'footer_project_menu')); ?>
			<?php wp_nav_menu(array('theme_location' => 'footer_research_menu')); ?>
			<?php wp_nav_menu(array('theme_location' => 'footer_development_menu')); ?>
			<?php wp_nav_menu(array('theme_location' => 'footer_dissemination_menu')); ?>
			<?php wp_nav_menu(array('theme_location' => 'footer_utilities_menu')); ?>
		</div>
	</footer>
	<footer id="footer-ops">
		<div class="site-info" id="ec-info" role="complementary">
			<h2>Funded by</h2>
			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/europe-flag.png" width="74" height="50" alt="European Union Flag" />	
			<p>This project has received funding from the European Union’s Seventh Framework Programme for research, technological development and demonstration under grant agreement no 289016.</p>
		</div>
		<div class="site-info" role="complementary">
			<h2>Led by</h2>
			<a href="http://technosite.es" title="Visit Technosite's website" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo_technosite_f.png" width="101" height="36" alt="Technosite Logo" /></a>
		</div>
		<div class="site-info" role="complementary">
			<h2>Powered by</h2>
			<?php do_action( 'twentytwelve_credits' ); ?>
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'twentytwelve' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'twentytwelve' ); ?>"><?php printf( __( 'Proudly powered by %s', 'twentytwelve' ), 'WordPress' ); ?></a>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>