<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package loose
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-md-12' ); ?>>
	
	<div class="row">
		<div class="entry-content col-md-10 col-md-push-2">
			<?php loose_the_content(); ?>
		</div><!-- .entry-content -->
		<div class="entry-meta  col-xs-12">
			<?php
			echo loose_post_format_icon( get_the_ID() ); // WPCS: XSS OK.
			loose_entry_meta();
			?>
		</div><!-- .entry-meta -->
	</div><!-- .row -->
		
</article><!-- #post-## -->

