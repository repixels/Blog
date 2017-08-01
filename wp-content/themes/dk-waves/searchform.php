<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" id="searchbar">
	<fieldset>
		<input type="text" name="s" value="<?php the_search_query(); ?>" placeholder="<?php esc_html_e( 'Search', 'dk_waves' ); ?>" />
		<button type="button"><svg width="19" height="19.3" viewBox="0 0 19 19.3"><circle stroke="#000" stroke-width="2" fill="none" cx="8.5" cy="8.5" r="7.5"/><path stroke-width="2" fill-rule="evenodd" d="M13 13.4a1 1 0 0 1 1.5 0l4.2 4.2a1 1 0 0 1-1.4 1.4L13 14.8a1 1 0 0 1 0-1.4z"/></svg></button>
	</fieldset>
</form>