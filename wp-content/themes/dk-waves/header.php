<!DOCTYPE html>
<html <?php language_attributes( 'html' ); ?> itemscope itemtype="http://schema.org/Blog">
<head>	
	<!-- wp_head __-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="loadscreen">
<?php if ( get_theme_mod('waves_loading_image') && is_front_page() ) : ?>
	<img src="<?php echo esc_url( get_theme_mod( 'waves_loading_image' )); ?>" alt="" />
<?php endif; ?>
</div>
	
<div id="wrapperbox">
	
<!-- ====================
	       HEADER 
	==================== -->
	<header id="header">

		<!-- Logo __-->
		<h1 id="logo">
			<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<a href="<?php echo esc_url( home_url('/') ); ?>" rel="home">
					<?php echo esc_attr( get_bloginfo( 'name' )); ?>
				</a>
			<?php endif; ?>
			<span id="tagline"><?php echo esc_attr( get_bloginfo( 'description' )); ?></span>
		</h1>
		
		<div id="extras">
			<?php get_search_form(); ?>
			
			<a href="https://vezeeta.bamboohr.com/jobs/" class="button"><?php echo esc_attr( get_theme_mod( 'waves_login_button_text', esc_html__('Write','dk_waves') )); ?></a>
		</div>
				
		<!-- Main menu __-->
		<nav id="menu">
			<?php get_template_part( 'menu', 'primary' ); // menu-primary.php ?>
		</nav>
		
		<div id="login-popup">
			<a href="#" class="close"><svg width="14.7" height="14.7" viewBox="0 0 14.7 14.7"><path  d="M1.7.3L14.4 13a1 1 0 0 1-1.4 1.4L.3 1.7A1 1 0 1 1 1.7.3zm12.7 0a1 1 0 0 1 0 1.4L1.7 14.4A1 1 0 0 1 .3 13L13 .3a1 1 0 0 1 1.4 0z"/></svg></a>
			
			<?php // get content of page with 'login' slug
				$login_page = get_page_by_path('login', OBJECT, 'page'); 
				if ( $login_page ) {
					echo balanceTags( wpautop($login_page->post_content) );
				}
			?>
			
			<?php // social buttons 
				if ( function_exists('_wsl__') ) {
					do_action( 'wordpress_social_login' ); 
				}
			?> 
			
			<a href="<?php echo esc_url(wp_login_url()); ?>" class="wp accent"><?php esc_html_e('Login with WordPress','dk_waves'); ?></a>
		</div>
	
	</header>
	<!-- END #header -->

<!-- ====================
	       CONTENT 
	==================== -->
	<main id="content">
		<div class="wrapper">

		<hr class="br">
		<h1 class="aligncenter">Engineering @ Vezeeta</h1>
		<h4 class="aligncenter grey">Engineering at Vezeeta is not just about writing world-class code. We also like to talk about what we're doing, and to share information about the projects, processes and products we're working on - not to mention a little bit of our famous hacker culture.</h4>
		<hr class="br">
		<p class="aligncenter"><a class="button login" href="https://www.vezeeta.com/ar/Generic/LifeAtDrBridge">Read More</a></p>
		<hr class="br">