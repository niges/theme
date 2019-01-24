<div class="sidebar">
	<?php if ( is_active_sidebar( 'custom-side-bar' )) : ?>
	<?php dynamic_sidebar( 'custom-side-bar' ); ?>
	<?php endif; ?>
	<p><strong>Archives</strong></p>
		<?php wp_get_archives( 'type=monthly' ) ?>
	<p><strong>Social</strong></p>
		<?php echo get_option( 'twitter'); ?>
</div>