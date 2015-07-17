<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

if (is_active_sidebar( 'sidebar-1' )  ) : ?>
	<div class="sidebar">

		<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>

				<?php dynamic_sidebar( 'sidebar-1' ); ?>
		<?php endif; ?>
	</div>
<?php endif; ?>
