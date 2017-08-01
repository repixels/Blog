<?php
/**
 * Sets up custom filters and actions for the theme.  This does things like sets up sidebars, menus, scripts, and lots of other awesome stuff that WordPress themes do.
 */
 
/* TGM Plugin Activation */
require_once( get_template_directory() . '/theme-functions/class-tgm-plugin-activation.php' );
add_action( 'tgmpa_register', 'waves_register_required_plugins' );

/* Register custom layouts. */
add_action( 'hybrid_register_layouts', 'waves_register_layouts' );

/* Add some body classes */
add_filter( 'body_class','waves_attr_body' );
 
/* Register custom image sizes. */
add_action( 'init', 'waves_register_image_sizes', 5 );

/* Register custom menus. */
add_action( 'init', 'waves_register_menus', 5 );

/* Register sidebar. */
add_action( 'widgets_init', 'waves_widgets_init' );

/* Add js scripts. */
add_action( 'wp_enqueue_scripts', 'waves_load_scripts', 0 );

/* Register css styles. */
add_action( 'wp_enqueue_scripts', 'waves_load_styles', 20 );

/* Change excerpt length and more link */
add_filter( 'excerpt_more', 'waves_custom_excerpt_more');
add_filter( 'excerpt_length', create_function('$waves_a', 'return 20;'));

/* Ajax Pagination */
add_action( 'wp_ajax_nopriv_ajax_pagination', 'waves_ajax_pagination' );
add_action( 'wp_ajax_ajax_pagination', 'waves_ajax_pagination' );

/* Ajax Heart like */
add_action( 'wp_ajax_nopriv_post-like', 'waves_post_like');
add_action( 'wp_ajax_post-like', 'waves_post_like');

/* Allow svg */
add_filter( 'upload_mimes', 'waves_cc_mime_types');

/* Facebook Open Graph */
add_action( 'wp_head', 'waves_fb_opengraph', 5 );


/**
 * Layouts.
 *
 */
function waves_register_layouts() {
	
	hybrid_register_layout( 'default',
        array(
            'label'            	=> esc_html__( 'Default', 'dk_waves' ),
            'is_global_layout' 	=> true,
            'is_post_layout'   	=> true,
		  'image'			=> '%s/imgs/layouts/default.png',
		  'post_types'       => array('post','page')
        )
     );

     hybrid_register_layout( 'grid-1',
        array(
            'label'            	=> esc_html__( 'Grid 1', 'dk_waves' ),
            'is_global_layout' 	=> true,
            'is_post_layout'   	=> true,
		  'image'			=> '%s/imgs/layouts/grid-1.png',
		  'post_types'       => array('post,page')
        )
     );

     hybrid_register_layout( 'grid-2',
        array(
            'label'           	=> esc_html__( 'Grid 2', 'dk_waves' ),
            'is_global_layout' 	=> true,
            'is_post_layout'   	=> true,
		  'image'			=> '%s/imgs/layouts/grid-2.png',
		  'post_types'       => array('post,page')
        )
     );
     
     hybrid_register_layout( 'grid-3',
        array(
            'label'           	=> esc_html__( 'Grid 3', 'dk_waves' ),
            'is_global_layout' 	=> true,
            'is_post_layout'   	=> true,
		  'image'			=> '%s/imgs/layouts/grid-3.png',
		  'post_types'       => array('post,page')
        )
     );
     
     hybrid_register_layout( 'list-1',
        array(
            'label'           	=> esc_html__( 'List 1', 'dk_waves' ),
            'is_global_layout' 	=> true,
            'is_post_layout'   	=> true,
		  'image'			=> '%s/imgs/layouts/list-1.png',
		  'post_types'       => array('post,page')
        )
     );
     
     hybrid_register_layout( 'list-2',
        array(
            'label'           	=> _x( 'List 2', 'theme layout', 'dk_waves' ),
            'is_global_layout' 	=> true,
            'is_post_layout'   	=> true,
		  'image'			=> '%s/imgs/layouts/list-2.png',
		  'post_types'       => array('post,page')
        )
     );
}

/**
 * Body classes.
 *
 */
function waves_attr_body( $classes ) {
	$classes[] = 'loading';
	
	$classes[] = esc_attr( get_theme_mod('waves_wrapper'));
	
	/* Demo POST variables for various layouts */
	//if ( session_id() == '') { session_start(); }
	if ( isset( $_GET['wrapper'] ))  {
		$classes[] = esc_attr( $_GET['wrapper'] );
		$_SESSION['wrapper'] = esc_attr( $_GET['wrapper'] );
	}
	elseif ( isset( $_SESSION['wrapper'] ) ) {
		$classes[] = esc_attr( $_SESSION['wrapper'] );
	}
	/* End Demo */

	return $classes;
}

/**
 * Registers custom image sizes for the theme.
 *
 */
function waves_register_image_sizes() {
	
	/* Sets the 'post-thumbnail' size. */
	set_post_thumbnail_size( 1040, 464, true );

	/* Adds the additional image sizes. */
	add_image_size( 'waves_square', 640, 640, true );
} 

/**
 * Registers nav menu locations.
 *
 */
function waves_register_menus() {
	register_nav_menu( 'primary',   _x( 'Primary',   'nav menu location', 'dk_waves' ) );
}

/**
 * Registers sidebar.
 *
 */
function waves_widgets_init(){
	register_sidebar(
		array(
			'id'=>'sidebar',
			'name'=>__( 'Sidebar', 'dk_waves' ),
			'description'=>__('Sidebar for widgets.','dk_waves'),
			'before_widget'=>'<div class="widget %2$s">',
			'after_widget'=>'</div>',
			'before_title'=>'<h3>',
			'after_title'=>'</h3>'
	));
	register_sidebar(
		array(
			'id'=>'footer',
			'name'=>__( 'Footer', 'dk_waves' ),
			'description'=>__('Footer for widgets.','dk_waves'),
			'before_widget'=>'<div class="widget %2$s">',
			'after_widget'=>'</div>',
			'before_title'=>'<h3>',
			'after_title'=>'</h3>'
	));
}
 
/**
 * Enqueues scripts.
 *
 */
function waves_load_scripts() {
	
	/* main scripts file */
	wp_enqueue_script( 'imagesloaded' );
	wp_enqueue_script( 'waves-scripts', get_template_directory_uri() . '/js/waves-scripts.js', array( 'jquery' ), null, true );

	/* ajaxify */
	wp_localize_script( 'waves-scripts', 'ajax_var', array(
	    'url' => admin_url('admin-ajax.php'),
	    'nonce' => wp_create_nonce('ajax-nonce'),
	    'template' => get_page_template_slug()
	));
}

/**
 * Registers custom stylesheets for the front-send.
 *
 */
function waves_load_styles() {
	
	// Load editor-style first.
	wp_enqueue_style( 'editor-style', get_template_directory_uri() . '/editor-style.css' );
	
	// Load parent theme stylesheet if child theme is active.
	if ( is_child_theme() )
		wp_enqueue_style( 'hybrid-parent' );
	
	// Load active theme stylesheet.
	wp_enqueue_style( 'hybrid-style' );

}


/**
 * TGM Plugins Activation 
 *
 */
function waves_register_required_plugins() {
 
    $plugins = array(
		array(
            	'name'      => esc_html__('WordPress Social Login','dk_waves'), 
            	'slug'      => 'wordpress-social-login',  
            	'required'  => true,
		),
		array(
            	'name'      => esc_html__('Lazy Load XT','dk_waves'), 
            	'slug'      => 'lazy-load-xt',  
            	'required'  => true,
		),
		array(
            	'name'      => esc_html__('Entry Views','dk_waves'), 
            	'slug'      => 'entry-views', 
            	'source'    => get_template_directory() . '/plugins/entry-views.zip', 
            	'required'  => true,
		)
    );
 
    $config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);
 
    tgmpa( $plugins, $config );
}

/**
 * Change excerpt more link
 * 
*/
function waves_custom_excerpt_more($more) {
	return ' ...';
}

/**
 * Is post paginated?
 * 
*/
function waves_is_post_paginated() {					
	global $multipage;			
	return 0 !== $multipage;				
}

/**
 * Ajax Load More Pagination
 * 
*/
function waves_ajax_pagination() {
	
	$paged = $_POST['page'];
	$template = $_POST['template'];
		
	/* build query */
	if ( $template == 'grid-top-stories.php' ){
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
	}
	
	if ( $template == 'grid-new-stories.php' ){
		$blog_query_args = array(
			'posts_per_page' 	=> get_option( 'posts_per_page' ),
			'paged' 			=> $paged,
			'post_type' 		=> 'post',
			'post_status' 		=> 'publish',
			'orderby'     		=> 'date',
			'order'       		=> 'DESC',
			'ignore_sticky_posts' => true,
		);
	}
	
	if ( $template == 'grid-editors-picks.php' ){
		$blog_query_args = array(
			'posts_per_page' 	=> get_option( 'posts_per_page' ),
			'paged' 			=> $paged,
			'post_type' 		=> 'post',
			'post_status' 		=> 'publish',
			'orderby'     		=> 'date',  
			'order'       		=> 'DESC',
			'post__in'            => get_option( 'sticky_posts' ),
			'ignore_sticky_posts' => true,
		);
	}
	
	$loaded_posts = new WP_Query( $blog_query_args );

   	while ( $loaded_posts->have_posts() ) { 
     	$loaded_posts->the_post();
		hybrid_get_content_template();
   	}

    	die();
}

/**
 * Ajax Heart like
 * 
*/
function waves_post_like() {
    // Check for nonce security
    $nonce = $_POST['nonce'];
  
    if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ))
        die( '!' );
     
    if ( isset($_POST['post_like']) ) {
        // Retrieve user IP address
        $ip = $_SERVER['REMOTE_ADDR'];
        $post_id = $_POST['post_id'];
         
        // Get voters'IPs for the current post
        $meta_IP = get_post_meta($post_id, "voted_IP");
        $voted_IP = $meta_IP[0];
 
        if ( !is_array($voted_IP) )
            $voted_IP = array();
         
        // Get votes count for the current post
        $meta_count = get_post_meta($post_id, "votes_count", true);
 
        // Use has already voted ?
        if ( !waves_hasAlreadyVoted($post_id) )
        {
            $voted_IP[$ip] = time();
 
            // Save IP and increase votes count
            update_post_meta($post_id, "voted_IP", $voted_IP);
            update_post_meta($post_id, "votes_count", ++$meta_count);
             
            // Display count (ie jQuery return value)
            echo intval($meta_count);
        }
        else { echo "already"; }
      
    }
    exit;
}

function waves_hasAlreadyVoted( $post_id ) {
	// Retrieve post votes IPs
	$meta_IP = get_post_meta($post_id, "voted_IP");
	$voted_IP = $meta_IP[0];
     
	if ( !is_array($voted_IP) )
		$voted_IP = array();
         
	// Retrieve current user IP
	$ip = $_SERVER['REMOTE_ADDR'];
     
	// If user has already voted
	if ( in_array($ip, array_keys($voted_IP)) ) {
		$time = $voted_IP[$ip];
		$now = time();
         
		// Compare between current time and vote time
		if ( round(($now - $time) / 60) > 120 ) //2 hours
			return false;
             
		return true;
	}
     
	return false;
}

/**
 * Allow .svg via Media Uploader
 * 
*/
function waves_cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}


/**
 * Estimate time required to read the article
 *
 * @return string
 */
function waves_estimated_reading_time() {
    $post = get_post();

    $words = str_word_count( strip_tags( $post->post_content ) );
    $minutes = floor( $words / 120 );
    $seconds = floor( $words % 120 / ( 120 / 60 ) );

    if ( $minutes >= 1 ) {
        $estimated_time = $minutes . ' min';
    } else {
        $estimated_time = '1 min';
    }

    return $estimated_time;
}


/**
 * Facebook OpenGraph
 * 
*/
function waves_fb_opengraph() {
	if ( is_singular() ) {
	?>    
		<meta property="og:title" content="<?php the_title(); ?>" />
		<meta property="og:description" content="<?php echo strip_tags( get_the_excerpt(get_the_ID()) ); ?>" />
		<meta property="og:url" content="<?php the_permalink(); ?>" />
		<?php $fb_image = wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID() ), 'thumbnail'); ?>
		<?php if ($fb_image) : ?>
		<meta property="og:image" content="<?php echo esc_url( $fb_image[0] ); ?>" />
		<?php endif; ?>
		<meta property="og:type" content="<?php if ( is_single() ) { echo "article"; } else { echo "website"; } ?>" />
		<meta property="og:site_name" content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
	<?php
	}
}

/**
 * Color Picker for Posts
 *
*/
add_action( 'add_meta_boxes', 'waves_add_meta_box' );
function waves_add_meta_box(){
	add_meta_box( 'header-page-metabox-options', esc_html__('Post Background Color', 'dk_waves' ), 'waves_header_meta_box', 'post', 'side', 'low');
}

add_action( 'admin_enqueue_scripts', 'waves_backend_scripts');
function waves_backend_scripts( $hook ) {
	wp_enqueue_style( 'wp-color-picker');
	wp_enqueue_script( 'wp-color-picker');
}

function waves_header_meta_box( $post ) {
	$custom = get_post_custom( $post->ID );
	$header_color = ( isset( $custom['header_color'][0] ) ) ? $custom['header_color'][0] : '';
	wp_nonce_field( 'waves_header_meta_box', 'waves_header_meta_box_nonce' );
	?>
	<script>
	jQuery(document).ready(function($){
	    $('.color_field').each(function(){
   		$(this).wpColorPicker();
		    });
	});
	</script>
	<div class="pagebox">
	    <p><?php esc_attr_e('Choose a color under image:', 'dk_waves' ); ?></p>
	    <input class="color_field" type="hidden" name="header_color" value="<?php echo esc_attr( $header_color ); ?>"/>
	</div>
	<?php
}

function waves_save_header_meta_box( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if( !current_user_can( 'edit_pages' ) ) {
		return;
	}
	if ( !isset( $_POST['header_color'] ) || !wp_verify_nonce( $_POST['waves_header_meta_box_nonce'], 'waves_header_meta_box' ) ) {
		return;
	}
	$header_color = (isset($_POST['header_color']) && $_POST['header_color']!='') ? $_POST['header_color'] : '';
	update_post_meta($post_id, 'header_color', $header_color);
}
add_action( 'save_post', 'waves_save_header_meta_box' );


	

