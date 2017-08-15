<?php if ( is_single() ) : // BLOG POST  ?>
	<article <?php hybrid_attr( 'post' ); ?>>

		<div class="entry-header">

			<!-- Image ___-->
			<div class="featured-image wide-div">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php get_the_image( array( 'size' => 'post-thumbnail', 'link_to_post' => false )); ?>
				<?php $video_link = get_post(get_post_thumbnail_id())->post_title;
				if ( strpos( $video_link, 'vimeo' ) !== false ): ?>
				<iframe src="https://player.vimeo.com/video/<?php echo intval(basename($video_link)); ?>?autoplay=1&loop=1&title=0&byline=0&portrait=0" width="1040" height="585" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
				<?php endif; ?>
			<?php endif; ?>
			</div>

			<!-- Heading ___-->
			<h2><?php the_title(); ?></h2>

			<!-- Excerpt ___-->
			<div class="entry-excerpt">
				<?php the_excerpt(); ?>
			</div>

			<div class="entry-meta">
				<!-- Author -->
				<div class="entry-author">
	        <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta( 'ID' ))); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 112); ?></a>
	      </div>
				<?php if ( has_category() ): ?>
				<strong><?php the_category(' '); ?></strong> &nbsp; • &nbsp;
				<?php endif; ?>
				<span class="entry-date"><?php the_time(get_option( 'date_format' )) ?></span>
				<a href="<?php the_permalink(); ?>" class="entry-read-time"><span>&nbsp; • &nbsp;</span>
					<?php echo waves_estimated_reading_time() . ' ' . esc_html('read', 'dk_waves'); ?>
				</a>
			</div>
		</div>

		<div class="entry-content">
			<div class="entry-social">

				<div class="like-heart" data-post_id="<?php echo get_the_ID(); ?>">
					<a href="javascript:void(0)">
						<svg width="25" height="23" viewBox="0 0 25 23"><path d="M17.98.5a6.54 6.54 0 0 0-5.48 3 6.52 6.52 0 1 0-10.4 7.8.66.66 0 0 0 .04.06l10 11.08.1.06h.56l.1-.06 9.96-11.08a.3.3 0 0 0 .05-.07A6.52 6.52 0 0 0 18 .5zm4.12 10.2l-.04.05-9.55 10.6-9.56-10.6a.48.48 0 0 0-.04-.06 5.52 5.52 0 1 1 9.14-5.96.53.53 0 0 0 .9 0 5.52 5.52 0 1 1 9.16 5.95z"/></svg>
						<span class="like-count"><?php echo intval( get_post_meta( get_the_ID(), 'votes_count', true )); ?></span>
					</a>
				</div>

				<div class="comment-count">
					<a href="<?php comments_link(); ?>">
						<svg width="24" height="22" viewBox="0 0 24 22"><path d="M3.66 22a.52.52 0 0 1-.5-.36.62.62 0 0 1 .13-.63 15.53 15.53 0 0 0 2.3-3.9C2.14 15.4 0 12.43 0 9.25 0 4.16 5.4 0 12 0s12 4.15 12 9.26-5.38 9.26-12 9.26c-.4 0-.8-.02-1.26-.06A9 9 0 0 1 3.66 22zM12 1.15c-6.04 0-10.95 3.64-10.95 8.1 0 2.86 2.08 5.53 5.43 7a.52.52 0 0 1 .3.3.66.66 0 0 1 0 .45 17.92 17.92 0 0 1-1.93 3.75 8.36 8.36 0 0 0 5.3-3.27.48.48 0 0 1 .42-.2c.55.06 1 .08 1.44.08 6.05 0 10.96-3.63 10.96-8.1s-4.9-8.1-10.96-8.1z"/></svg>
						<span><?php echo get_comments_number(); ?></span>
					</a>
				</div>

				<div class="twitter-share">
					<a target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>&url=<?php echo esc_url( get_permalink() ); ?>">
						<svg width="19" height="16" viewBox="0 0 19 16"><path d="M6.47 15.5a11.68 11.68 0 0 1-5.8-1.66.4.4 0 0 1-.18-.47.38.38 0 0 1 .4-.27 6.86 6.86 0 0 0 4.13-.87 4.27 4.27 0 0 1-2.96-2.46.4.4 0 0 1 .06-.42.38.38 0 0 1 .4-.12 3.46 3.46 0 0 0 .54.1 4.05 4.05 0 0 1-2.1-3.52.4.4 0 0 1 .2-.35.37.37 0 0 1 .43.05 2.35 2.35 0 0 0 .4.26 4.33 4.33 0 0 1-.68-1.44 3.9 3.9 0 0 1 .43-3 .4.4 0 0 1 .3-.18.4.4 0 0 1 .34.14 9.2 9.2 0 0 0 6.48 3.55 3.96 3.96 0 0 1 1.7-3.64 3.9 3.9 0 0 1 4.93.38 8.35 8.35 0 0 0 1.9-.75.37.37 0 0 1 .44 0 .4.4 0 0 1 .16.43 3.62 3.62 0 0 1-.6 1.16 2.78 2.78 0 0 0 .5-.2.4.4 0 0 1 .46.1.4.4 0 0 1 .05.48 7.3 7.3 0 0 1-1.7 1.8 10.2 10.2 0 0 1-2.67 7.35 10 10 0 0 1-7.56 3.55zm-3.93-1.62a10.13 10.13 0 0 0 3.93.82 9.25 9.25 0 0 0 6.98-3.27 9.36 9.36 0 0 0 2.46-6.98.4.4 0 0 1 .18-.37 6.37 6.37 0 0 0 .86-.72 4.5 4.5 0 0 1-.85.12.38.38 0 0 1-.4-.33.4.4 0 0 1 .24-.44 2.32 2.32 0 0 0 .78-.68 6.6 6.6 0 0 1-1.27.38.4.4 0 0 1-.33-.1 3.16 3.16 0 0 0-4.15-.42 3.28 3.28 0 0 0-1.25 3.3.4.4 0 0 1-.08.34.37.37 0 0 1-.32.14 9.94 9.94 0 0 1-7.14-3.4 3.1 3.1 0 0 0-.1 1.86 3.16 3.16 0 0 0 1.25 1.85.4.4 0 0 1 .2.4.4.4 0 0 1-.32.33 2.1 2.1 0 0 1-.43.04 2.36 2.36 0 0 1-.93-.2 3.63 3.63 0 0 0 2.58 2.5.4.4 0 0 1 .2.7 2.03 2.03 0 0 1-1.43.4 3.6 3.6 0 0 0 2.88 1.43.4.4 0 0 1 .35.26.4.4 0 0 1-.1.43 6.97 6.97 0 0 1-3.8 1.62z"/></svg>
						<span><?php esc_html_e('Tweet', 'dk_waves'); ?></span>
					</a>
				</div>

				<div class="facebook-share">
					<a target="_blank" href="https://www.facebook.com/dialog/feed?app_id=<?php echo esc_attr( get_theme_mod( 'waves_facebook_api' )); ?>&display=popup&caption=<?php echo esc_attr( get_bloginfo( 'name' )); ?>:%20<?php echo esc_attr( get_bloginfo( 'description' )); ?>&description=<?php echo get_the_excerpt(); ?>&link=<?php echo esc_url( get_permalink() ); ?>&picture=<?php echo esc_url( wp_get_attachment_image_src( get_post_thumbnail_id(), 'post-thumbnail', false)[0] ); ?>&redirect_uri=<?php echo esc_url( get_permalink() ); ?>">
						<svg width="19" height="19" viewBox="0 0 19 19"><path d="M16.85 18.5h-3.97a.38.38 0 0 1-.38-.38v-6.75a.38.38 0 0 1 .38-.37h2.2l.5-1.5h-2.7a.38.38 0 0 1-.38-.38V6.5c0-1.04 1.28-1.5 2.47-1.5h.53V3.5h-1.28C12.7 3.5 11 4.54 11 5.92v3.2a.38.38 0 0 1-.37.38H8V11h2.63a.38.38 0 0 1 .37.37v6.75a.38.38 0 0 1-.37.38H2.6a2.26 2.26 0 0 1-2.1-2.08V2.17A1.92 1.92 0 0 1 2.6.5h14.25a1.54 1.54 0 0 1 1.65 1.67v14.25a1.88 1.88 0 0 1-1.65 2.08zm-3.6-.75h3.6a1.2 1.2 0 0 0 .9-1.33V2.17a.8.8 0 0 0-.9-.92H2.6a1.2 1.2 0 0 0-1.35.92v14.25a1.54 1.54 0 0 0 1.35 1.33h7.65v-6H7.63a.38.38 0 0 1-.38-.38V9.12a.38.38 0 0 1 .38-.37h2.62V5.92c0-1.87 2.1-3.17 3.98-3.17h1.65a.38.38 0 0 1 .37.37v2.25a.38.38 0 0 1-.37.38h-.9c-.7 0-1.72.23-1.72.74v2.25h2.84a.38.38 0 0 1 .3.16.36.36 0 0 1 .06.34l-.75 2.25a.37.37 0 0 1-.35.25h-2.1v6z"/></svg>
						<span><?php esc_html_e('Share', 'dk_waves'); ?></span>
					</a>
				</div>
			</div><!-- .entry-social -->

			<?php the_content(); ?>

			<div class="entry-footer">
				<?php if (waves_is_post_paginated()) : ?>
				<div class="entry-page-links">
					<?php wp_link_pages( array(
							'before'  => '<p>',
							'after'   => '</p>',
						)); ?>
				</div>
				<?php endif; ?>

				<?php if (has_tag()): ?>
				<div class="entry-tags">
					<p><?php the_tags(' ',' ',' '); ?></p>
				</div>
				<?php endif; ?>

				<!-- Comments ___-->
				<?php comments_template( '', true ); ?>
			</div><!-- .entry-footer -->
		</div><!-- .entry-content -->

	</article>

	<div id="more-excerpts">
		<h2><?php esc_html_e('Keep reading', 'dk_waves'); ?></h2>
		<a href="<?php echo esc_url( home_url('/') ); ?>"><?php esc_html_e('More >', 'dk_waves'); ?></a>

		<div class="excerpts">
		<?php
			$excerpts_args = array(
				'posts_per_page' 	=> get_option( 'posts_per_page' ),
				'post_type' 		=> 'post',
				'post_status' 		=> 'publish',
				'orderby'     		=> 'meta_value_num',
				'order'       		=> 'DESC',
				'post__not_in' 	=> array( get_the_ID() ),
				'ignore_sticky_posts' => true,
			);
			$excerpts_query = new WP_Query( $excerpts_args );
		?>

		<?php while ( $excerpts_query->have_posts() ) :
			$excerpts_query->the_post();
			get_template_part('excerpt'); // excerpt.php ?>
		<?php endwhile; ?>
		</div>
	</div>

<?php else: // BLOG EXCERPT ?>

	<?php get_template_part('excerpt'); ?>

<?php endif; ?>
