<?php if( is_404() ): ?>	
	<div>
		<p class="size-xxl"><a>404</a></p>
		<h3><?php esc_html_e( 'Oops!... Something went wrong', 'dk_waves' ); ?></h3>
		<p><?php esc_html_e( 'This page cannot be found.', 'dk_waves' ); ?></p>
		<p><a href="#" onclick="window.history.go(-1)" class="button"><?php esc_html_e( 'Go back', 'dk_waves' ); ?></a></p>
	</div>
	
<?php else: ?>
	<div>
		<h3><?php esc_html_e( 'Oops!... Search term not found!', 'dk_waves' ); ?></h3>
		<p><a href="#" onclick="window.history.go(-1)" class="button"><?php esc_html_e( 'Go back', 'dk_waves' ); ?></a></p>
	</div>	
<?php endif; ?>
