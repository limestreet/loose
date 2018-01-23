<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package loose
 */
?>
<div class=" col-xs-12 col-md-6 masonry">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	    <?php if (has_post_thumbnail()) : ?>
		    <div class="featured-image">
			<a href="<?php the_permalink(); ?>" rel="bookmark">
			    <?php the_post_thumbnail('medium'); ?>   
			</a>
		    </div>
	    <?php endif; ?>
	    <?php echo loose_post_format_icon(get_the_ID()); // WPCS: XSS OK. ?>
	    <?php if (!has_post_format('aside') && !has_post_format('link') && !has_post_format('quote')) :
		    ?>
	    <div class="featured-image-cat">
		<?php
		echo wp_kses(
			get_the_category_list(__('<span> &#124; </span>', 'loose')), array(
			'a' => array(
				'href' => array(),
			),
			'span' => '',
			)
		);
		?>
	    </div>
	    <?php endif;
	    
	    if (!has_post_format('aside') && !has_post_format('link') && !has_post_format('quote')) {
		    the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');
	    }

	    if (has_post_format('aside') || has_post_format('quote') || has_post_format('link') ) {
		    the_content( __( 'Continue reading &rarr;', 'loose' ) );
	    } else {
		    if ( 'content' === get_theme_mod('show_content_or_excerpt', 'title') ) {
			    the_content( __( 'Continue reading &rarr;', 'loose' ) );
		    } elseif( 'excerpt' === get_theme_mod('show_content_or_excerpt', 'title') ) {
			    the_excerpt();
		    }
	    }
	    ?>

	    <?php if ('post' == get_post_type()) : ?>
		    <div class="entry-meta">
			<?php loose_posted_on(); ?>
		    </div><!-- .entry-meta -->
	    <?php endif; ?>
	</header><!-- .entry-header -->
    </article><!-- #post-## -->
</div>
