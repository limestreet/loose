<?php
/**
 * Searchform template
 *
 * @package loose
 */

?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
			<span class="screen-reader-text"><?php esc_html_e( 'Search for: ', 'loose' ); ?></span>
			<input type="search" class="search-field" placeholder="<?php esc_html_e( 'Type and hit enter', 'loose' ); ?>" value="" name="s" title="<?php esc_html_e( 'Search for:', 'loose' ); ?>" />
	</label>
	<input type="submit" class="search-submit" value="Search" />
</form>   
