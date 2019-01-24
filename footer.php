</div>

<div class="footer-sidebar">
	<?php if ( is_active_sidebar( 'footer-sidebar' )) : ?>
		<?php dynamic_sidebar( 'footer-sidebar' ); ?>
	<?php endif; ?>
</div>

<div class="footer-2">
	<?php if (is_active_sidebar( 'footer-2' )): ?>
		<?php dynamic_sidebar( 'footer-2' ); ?>
	<?php endif; ?>
</div>
	

<?php wp_footer(); ?>

</body>
</html>