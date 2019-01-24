<?php get_header(); ?>
<?php get_sidebar(); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-8 blog-main">
			<?php 
			if ( have_posts() ) : while ( have_posts() ) : the_post();

				if ( has_post_thumbnail()) {
					the_post_thumbnail('medium');
				} else {
					echo 'No thumbnails';
				}
  	
				get_template_part( 'content', get_post_format() );
				echo '<hr>';
  
			endwhile; endif;
		 	?>
			
		</div>
	</div>	
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>

<?php 
$args = array(
  'category_name' => 'hello',
  'post_status' => 'publish'
 );
 $postLoop = new WP_Query($args);

 if( $postLoop->have_posts() ) : ?>
 <?php while( $postLoop->have_posts() ): ?>
 <?php $postLoop->the_post(); ?>
<?php
the_title();
the_content();
?>
<?php
 endwhile;endif;
 ?>
