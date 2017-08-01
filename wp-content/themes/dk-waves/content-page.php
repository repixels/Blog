<?php if( is_singular() ):  ?>

	<h1 class="page-title"><?php the_title(); ?></h1>
	<?php if ( has_excerpt() ) the_excerpt(); ?>
	<hr />
	
	<?php the_content(); ?>
	
	<!-- Page comments __-->
	<?php if ( comments_open() ) { //at least 1 comment
		comments_template( '', true ); 
	} ?>
	

<?php elseif( is_search() ):  ?>

	<!-- Page excerpt - displays in search results __-->
	<?php get_template_part('content'); ?>

<?php endif; ?>
