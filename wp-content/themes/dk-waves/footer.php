		
		</div><!-- .wrapper -->
	</main>
	
	
	<!-- ====================
	       FOOTER 
	==================== -->
	<footer id="footer" class="wide-div">
		<ul class="social-icons">
			<?php get_template_part('social_icons-list'); ?>
		</ul>
		
		<div class="widgets">
			<?php get_sidebar( 'footer' ); ?>
		</div>
		
		<div class="bottom">
			<?php if ( get_theme_mod( 'waves_footer_text' ) ): ?> 
				<p><?php echo esc_attr( get_theme_mod( 'waves_footer_text' )); ?></p>
			<?php else: ?>
				<p><?php echo esc_attr( get_bloginfo( 'name' ) ); ?> &copy; <?php esc_html_e('Copyright','dk_waves'); ?> <?php echo date_i18n( 'Y' ); ?>. <?php esc_html_e('All rights reserved.','dk_waves'); ?></p>
			<?php endif; ?>
			
			<p class="grey"><?php echo esc_attr( get_theme_mod( 'waves_footer_text2', 'Powered by WordPress' )); ?></p>
		</div>
	</footer>
</div><!-- #wrapperbox -->

<?php wp_footer(); ?>
</body>
</html>