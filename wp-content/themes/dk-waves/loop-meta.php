<?php
/* If viewing a singular page, return. */
if ( is_singular() || is_home() )
	return;
?>

<div id="meta-heading">	
<?php if ( is_category() ) : ?>
	<h2><?php single_cat_title(); ?></h2>
	<?php echo category_description(); ?>

<?php elseif ( is_tag() ) : ?>
	<h2><?php esc_html_e('Tag','dk_waves'); ?> </h2>
	<p><?php single_tag_title(); ?></p>

<?php elseif ( is_tax() ) : ?>
	<h2><?php esc_html_e('Term','dk_waves'); ?> </h2>
	<p><?php single_term_title(); ?></p>

<?php elseif ( is_author() ) : ?>
	<?php echo get_avatar( get_the_author_meta( 'ID' ), 112); ?>
	<h2><?php the_author_meta( 'first_name', get_query_var( 'author' ) ); ?> <?php the_author_meta( 'last_name', get_query_var( 'author' ) ); ?></h2>
	<p><?php the_author_meta( 'description', get_query_var( 'author' ) ); ?> &nbsp; • &nbsp;
	<a href="<?php the_author_meta( 'user_url', get_query_var( 'author' ) ); ?>" target-"_blank"><?php the_author_meta( 'user_url', get_query_var( 'author' ) ); ?></a></p>
	
<?php elseif ( is_search() ) : ?>
	<h2><?php esc_html_e('Search','dk_waves'); ?> </h2>
	<p><?php echo esc_attr( get_search_query() ); ?></p>

<?php elseif ( is_post_type_archive() ) : ?>
	<?php $post_type = get_post_type_object( get_query_var( 'post_type' ) ); ?>
	<h2><?php esc_html_e('Post Type','dk_waves'); ?> </h2>
	<p><?php post_type_archive_title(); ?></p>

<?php elseif ( is_day() || is_month() || is_year() ) : ?>
	<?php
		if ( is_day() )
			$date = get_the_time( esc_html__( 'F d, Y', 'dk_waves' ) );
		elseif ( is_month() )
			$date = get_the_time( esc_html__( 'F Y', 'dk_waves' ) );
		elseif ( is_year() )
			$date = get_the_time( esc_html__( 'Y', 'dk_waves' ) );
	?>
	<h2><?php esc_html_e('Archive','dk_waves'); ?> </h2>
	<p><?php echo esc_attr($date); ?></p>

<?php elseif ( is_archive() ) : ?>
	<h2><?php esc_html_e('Archive','dk_waves'); ?> </h2>
	<p><?php echo esc_attr($date); ?></p>
	
<?php endif; ?>
</div>
