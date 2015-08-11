<?php
/**
 * The sidebar containing the main widget area
 *
 */

if (is_active_sidebar( 'sidebar-1' )  ) : ?>
	<div class="sidebar">

		<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>

				<?php dynamic_sidebar( 'sidebar-1' ); ?>
		<?php endif; ?>
	</div>
<?php endif; ?>
