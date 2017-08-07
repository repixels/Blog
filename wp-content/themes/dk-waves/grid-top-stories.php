<?php
/**
 * Template Name: Grid - Top Stories
 */
?>
<?php get_header(); ?>

<hr class="br">
<h1 class="aligncenter">Engineering @ Vezeeta</h1>
<h4 class="aligncenter grey">Engineering at Vezeeta is not just about writing world-class code. We also like to talk about what we're doing, and to share information about the projects, processes and products we're working on - not to mention a little bit of our famous hacker culture.</h4>
<hr class="br">
<p class="aligncenter"><a class="button login" href="https://www.vezeeta.com/ar/Generic/LifeAtDrBridge">Read More</a></p>
<hr class="br">

<?php
	while ( have_posts() ) : the_post(); ?>
		<?php if ( has_post_thumbnail() ) : ?>
		<div class="featured-image">
			<?php get_the_image( array( 'size' => 'post-thumbnail', 'link_to_post' => false )); ?>
			
			<?php $video_link = get_post(get_post_thumbnail_id())->post_title;
			if ( strpos( $video_link, 'vimeo' ) !== false ): ?>
			<iframe src="https://player.vimeo.com/video/<?php echo intval(basename($video_link)); ?>?autoplay=1&loop=1&title=0&byline=0&portrait=0" width="1040" height="585" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
			<?php endif; ?>
			
			<div class="featured-image-caption">
				<?php echo get_post(get_post_thumbnail_id())->post_content; ?>
			</div>
		</div>
		<?php endif; ?>
		
    		<?php the_content(); ?> 
    	<?php
	endwhile;
	wp_reset_query(); 
?>

<?php get_sidebar( 'primary' ); ?>
			
<div class="excerpts">
<?php 			
	if ( is_front_page() )
		$paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
	else $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
	
	$blog_query_args = array(
		'posts_per_page' 	=> get_option( 'posts_per_page' ),
		'paged' 			=> $paged,
		'post_type' 		=> 'post',
		'post_status' 		=> 'publish',
		'orderby'     		=> 'meta_value_num',  
		'meta_key'    		=> ev_get_meta_key(),
		'order'       		=> 'DESC',
		'ignore_sticky_posts' => true,
	);
	$blog_query = new WP_Query( $blog_query_args );
?>

<?php while ( $blog_query->have_posts() ) : 
	$blog_query->the_post(); 
	hybrid_get_content_template(); // content.php ?>
<?php endwhile; ?>
</div>
	
<div id="load-more" data-load_page="<?php echo intval($paged+1); ?>" data-until="<?php echo intval($blog_query->max_num_pages); ?>"><?php echo get_next_posts_link( esc_html('Load More Articles','dk_waves'), $blog_query->max_num_pages ); ?></div>
	
<?php wp_reset_postdata(); ?>
<?php get_footer(); ?>
