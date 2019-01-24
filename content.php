<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
<p><?php the_date(); ?> by <a href="<?php the_author_link(); ?>"><?php the_author(); ?></a> <?php printf(_nx('1 comment', '%1$s comments', get_comments_number(), 'comments title', 'textdomain' ),number_format_i18n( 						get_comments_number())); ?></p>
<p><strong>My Mood is:</strong><?php echo get_post_meta( $post->ID, 'Mood', true ) ?></p>
<?php the_excerpt(); ?>