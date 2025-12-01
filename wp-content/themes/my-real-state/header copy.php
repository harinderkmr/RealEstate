<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package myRealState
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'my-real-state' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="top-nav">
			<div class="container">
				<div class="d-flex justify-content-between">
					<div>
						<a href="" class='top-nav-menu-item'><?php $email_icon = get_field( 'email_icon', 'option' ); ?>
<?php if ( $email_icon ) : ?>
	<img src="<?php echo esc_url( $email_icon['url'] ); ?>" alt="<?php echo esc_attr( $email_icon['alt'] ); ?>" />
<?php endif; ?><?php the_field( 'nav_email', 'option' ); ?></a>
						<a href="" class='top-nav-menu-item'><?php $phone_icon_ = get_field( 'phone_icon_', 'option' ); ?>
<?php if ( $phone_icon_ ) : ?>
	<img src="<?php echo esc_url( $phone_icon_['url'] ); ?>" alt="<?php echo esc_attr( $phone_icon_['alt'] ); ?>" />
<?php endif; ?><?php the_field( 'nav_phone', 'option' ); ?></a>
					</div>
					<div>
						<a href="" class='top-nav-menu-item'>Login/SignUp</a>
					</div>
				</div>
			</div>
		</div>
		<nav class="navbar navbar-expand-md navbar-light bg-light" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'your-theme-slug' ); ?>">
					<span class="navbar-toggler-icon"></span>
				</button>
				<a class="navbar-brand" href="#">
		<div class="site-branding">
			<?php
			if ( is_front_page() /*&& is_home()*/ ) :
				?>
				<h1 class="site-title"><?php the_custom_logo(); ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><?php the_custom_logo(); ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$my_real_state_description = get_bloginfo( 'description', 'display' );
			if ( $my_real_state_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $my_real_state_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->
		<!-- .Navwalker -->
		</a>
        <?php
        wp_nav_menu( array(
            'theme_location'    => 'primary',
            'depth'             => 3,
            'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse',
            'container_id'      => 'bs-example-navbar-collapse-1',
            'menu_class'        => 'nav navbar-nav ml-auto',
            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            'walker'            => new WP_Bootstrap_Navwalker(),
        ) );
        ?>
		<span class='menu-icon' >
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
</svg>
		</span>
    </div>
</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
