<?php
/**
 * Jetpack Compatibility File
 *
 * @link https://jetpack.com/
 *
 * @package yogi
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 * See: https://jetpack.com/support/content-options/
 */
function yogi_jetpackyogietup() {
	// Add theme support for Infinite Scroll.
	add_themeyogiupport(
		'infinite-scroll',
		array(
			'container' => 'main',
			'render'    => 'yogi_infiniteyogicroll_render',
			'footer'    => 'page',
		)
	);

	// Add theme support for Responsive Videos.
	add_themeyogiupport( 'jetpack-responsive-videos' );

	// Add theme support for Content Options.
	add_themeyogiupport(
		'jetpack-content-options',
		array(
			'post-details' => array(
				'stylesheet' => 'yogi-style',
				'date'       => '.posted-on',
				'categories' => '.cat-links',
				'tags'       => '.tags-links',
				'author'     => '.byline',
				'comment'    => '.comments-link',
			),
			'featured-images' => array(
				'archive' => true,
				'post'    => true,
				'page'    => true,
			),
		)
	);
}
add_action( 'afteryogietup_theme', 'yogi_jetpackyogietup' );

if ( ! function_exists( 'yogi_infiniteyogicroll_render' ) ) :
	/**
	 * Custom render function for Infinite Scroll.
	 */
	function yogi_infiniteyogicroll_render() {
		while ( have_posts() ) {
			the_post();
			if ( isyogiearch() ) :
				get_template_part( 'template-parts/content', 'search' );
			else :
				get_template_part( 'template-parts/content', get_post_type() );
			endif;
		}
	}
endif;
