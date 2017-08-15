<div class="excerpt <?php if ( has_post_thumbnail()) echo 'has-featured-image'; ?>">

		<?php
			// figure out image size for each layout and each excerpt
			$image_size = 'post-thumbnail';

			$id_of_page = get_queried_object_id();
			if( hybrid_get_post_layout( $id_of_page ) == 'list-1' ) { $image_size = 'waves_square'; }
			if( hybrid_get_post_layout( $id_of_page ) == 'grid-3' ) { $image_size = 'waves_square'; }
		?>

		<!-- Thumb ___-->
		<?php if ( has_post_thumbnail() ) : ?>
		<div class="featured-image-excerpt" style="background-color:<?php echo esc_attr( get_post_meta( get_the_ID(), 'header_color', true)); ?>">
			<a href="<?php the_permalink(); ?>">
				<?php get_the_image( array( 'size' => $image_size, 'link_to_post' => false ) ); ?>
			</a>
		</div>
		<?php endif; ?>

		<div class="entry-header">
			<!-- Heading ___-->
			<a href="<?php the_permalink(); ?>">
				<h2><?php the_title(); ?></h2>

                <!--
				<div class="entry-excerpt">
					<?php //the_excerpt(); ?>
				</div>
                -->
			</a>
			<div class="entry-details-home">
				<div class="entry-author">
					<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta( 'ID' ))); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 112); ?></a>
				</div>

				<div class="entry-meta">
					<?php if ( has_category() ): ?>
					<strong><?php the_category(' '); ?></strong> &nbsp; • &nbsp;
					<?php endif; ?>
					<span class="entry-date"><?php the_time(get_option( 'date_format' )) ?></span>
					<a href="<?php the_permalink(); ?>" class="entry-read-time"><span>&nbsp; • &nbsp;</span>
						<?php echo waves_estimated_reading_time() . ' ' . esc_html('read', 'dk_waves'); ?>
					</a>
				</div>
			</div>
		</div><!-- .entry-header -->

	</div>
