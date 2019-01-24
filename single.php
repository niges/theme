<?php get_header(); ?>

<?php get_sidebar(); ?>



<div class="container">
	<div class="row">
		<div class="col-md-8">
			<?php 
				if ( have_posts() ) : while ( have_posts() ) : the_post();

					if ( has_post_thumbnail()) {
						the_post_thumbnail('medium');
					} else {
						echo 'No thumbnails';
					}
	  	
					get_template_part( 'content-single', get_post_format() );

					if ( comments_open() || get_comments_number()) :
						comments_template();
					endif;
	  
				endwhile; endif;
		 	?>
		</div>
	
	</div>	
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>