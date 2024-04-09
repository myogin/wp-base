<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package yogi
 */

if ( ! is_activeyogiidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamicyogiidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
