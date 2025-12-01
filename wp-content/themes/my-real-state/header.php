<?php
/**
 * The header for our theme
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

	<!-- Top Navigation -->
	<div class="top-nav">
		<div class="container">
			<div class="d-flex justify-content-between align-items-center flex-wrap">
				<div class="d-flex gap-3">
					<?php $email = get_field( 'nav_email', 'option' ); ?>
					<?php $email_icon = get_field( 'email_icon', 'option' ); ?>
					<?php if ( $email ) : ?>
						<a href="mailto:<?php echo esc_attr( $email ); ?>" class="top-nav-menu-item">
							<?php if ( $email_icon ) : ?>
								<img src="<?php echo esc_url( $email_icon['url'] ); ?>" alt="<?php echo esc_attr( $email_icon['alt'] ); ?>" loading="lazy" />
							<?php endif; ?>
							<?php echo esc_html( $email ); ?>
						</a>
					<?php endif; ?>

					<?php $phone = get_field( 'nav_phone', 'option' ); ?>
					<?php $phone_icon = get_field( 'phone_icon_', 'option' ); ?>
					<?php if ( $phone ) : ?>
						<a href="tel:<?php echo esc_attr( $phone ); ?>" class="top-nav-menu-item">
							<?php if ( $phone_icon ) : ?>
								<img src="<?php echo esc_url( $phone_icon['url'] ); ?>" alt="<?php echo esc_attr( $phone_icon['alt'] ); ?>" loading="lazy" />
							<?php endif; ?>
							<?php echo esc_html( $phone ); ?>
						</a>
					<?php endif; ?>
				</div>

				<div>
					<a href="#" class="top-nav-menu-item">Login / SignUp</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Main Navigation -->
	<header id="masthead" class="site-header">
		<nav class="navbar navbar-expand-md navbar-light bg-light" role="navigation" aria-label="Main Navigation">
			<div class="container">
				<!-- Mobile Toggler -->
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'my-real-state' ); ?>">
					<span class="navbar-toggler-icon"></span>
				</button>

				<!-- Branding -->
				<div class="site-branding">
					<?php if ( has_custom_logo() ) : ?>
						<div class="site-logo"><?php the_custom_logo(); ?></div>
					<?php endif; ?>
					<?php if ( is_front_page() ) : ?>
						<h1 class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
						</h1>
					<?php else : ?>
						<p class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
						</p>
					<?php endif; ?>

					<?php
					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo esc_html( $description ); ?></p>
					<?php endif; ?>
				</div>

				<!-- Menu -->
				<?php
				wp_nav_menu( array(
					'theme_location'  => 'primary',
					'depth'           => 3,
					'container'       => 'div',
					'container_class' => 'collapse navbar-collapse',
					'container_id'    => 'main-menu',
					'menu_class'      => 'nav navbar-nav ml-auto',
					'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
					'walker'          => new WP_Bootstrap_Navwalker(),
				) );
				?>
			</div>
		</nav>
	</header><!-- #masthead -->
</div><!-- #page -->
