<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package loose
 */

?>

	</div><!-- #content -->

		
			<div id="left-sidebar" class="left-sidebar-area">
				<div class="left-sidebar-content">
					<div class="left-header">
					<div class="left-logo">
						<?php $loose_header_logo = get_theme_mod( 'header_logo' );
							if ( ! empty( $loose_header_logo ) ) : ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo esc_url( get_theme_mod( 'header_logo' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" ></a>
						<?php else : ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
						<?php endif; ?>
					<button class="left-sidebar-close" title="<?php esc_html_e( 'Close', 'loose' ); ?>"><svg><path d="M18.984 6.422l-5.578 5.578 5.578 5.578-1.406 1.406-5.578-5.578-5.578 5.578-1.406-1.406 5.578-5.578-5.578-5.578 1.406-1.406 5.578 5.578 5.578-5.578z"></path></svg></button>
					</div>
					</div>
					<nav id="site-navigation" class="main-navigation" role="navigation">
								<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
					</nav><!-- #site-navigation -->
					<div class="left-nav-social">
					    <?php echo loose_social_profiles(); // WPCS: XSS OK. ?>
					</div>
					<?php get_sidebar( 'left' ); ?>
					<div class="site-info">
			<?php echo wp_kses_post( get_theme_mod( 'footer_text', '<p>&copy; 2016 ' . get_bloginfo( 'name' ) . '</p>' ) ); ?>
					</div><!-- .site-info -->
				</div>
			</div> 
		<div class="left-sidebar-bg">
		</div><!-- .left-sidebar-bg -->
		
		<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
		<?php if ( ! empty( $loose_header_logo ) ) :
		?>
		    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img src="<?php echo esc_url( $loose_header_logo ); ?>" alt="<?php bloginfo( 'name' ); ?>" >
		    </a>
		<?php endif;
		echo wp_kses_post( get_theme_mod( 'footer_text', '<p>&copy; 2016 ' . get_bloginfo( 'name' ) . '</p>' ) );
		?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
		
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
