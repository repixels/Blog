<?php get_header(); // Loads the header.php template. ?>

	<?php if ( !is_front_page() && hybrid_is_plural() ) : // If viewing a multi-post page ?>
		<?php locate_template( array( 'loop-meta.php' ), true ); ?>

        <hr class="br">
<h1 class="aligncenter">Engineering @ Vezeeta</h1>
<h4 class="aligncenter grey">Engineering at Vezeeta is not just about writing world-class code. We also like to talk about what we're doing, and to share information about the projects, processes and products we're working on - not to mention a little bit of our famous hacker culture.</h4>
<hr class="br">
<p class="aligncenter"><a class="button login" href="https://www.vezeeta.com/ar/Generic/LifeAtDrBridge">Read More</a></p>
<hr class="br">
		<div class="excerpts">
	<?php endif; ?>

	<?php if ( have_posts() ) : // Checks if any posts were found. ?>
	
		<?php while ( have_posts() ) : // Begins the loop through found posts. ?>

			<?php the_post(); ?>
			<?php hybrid_get_content_template(); // Loads the content-*.php template. ?>

		<?php endwhile; ?>

	<?php if ( !is_front_page() && hybrid_is_plural() ) : // If viewing a multi-post page ?>
		</div><!-- .excerpts -->
		<?php locate_template( array( 'loop-nav.php' ), true ); // Loads the nav template. ?>
	<?php endif; ?>
	<?php else : // If no posts were found. ?>
		<?php locate_template( array( 'loop-error.php' ), true ); // Loads the error template. ?>
	<?php endif;  ?>

<?php get_footer(); // Loads the footer.php template. ?>
