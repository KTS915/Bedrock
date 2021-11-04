<?php
/**
 * The header for our theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'bedrock' ); ?></a>

	<nav id="secondary-nav" class="secondary-nav outer-width">
		<div id="top-menu" class="top-menu">

			<div class="social-menu">
				<a href="https://forums.classicpress.net/" target="_blank" title="Forums" rel="noreferrer noopener"><i class="cpicon-discourse"></i></a>
				<a href="https://www.classicpress.net/join-slack/" target="_blank" title="Slack" rel="noreferrer noopener"><i class="cpicon-slack"></i></a>
				<a href="https://github.com/ClassicPress" target="_blank" title="GitHub" rel="noreferrer noopener"><i class="cpicon-github"></i></a>
				<a href="https://twitter.com/GetClassicPress" target="_blank" title="Twitter" rel="noreferrer noopener"><i class="cpicon-twitter"></i></a>
			</div>

			<div class="buttons-menu">
				<small>
					<ul>
						<li class="switchbutton donate">
							<a href="https://www.classicpress.net/donate/">Donate</a>
						</li>
						<li class="switchbutton download">
							<a href="https://www.classicpress.net/get-classicpress/">Get ClassicPress</a>
						</li>
					</ul>
				</small>
			</div>

		</div><!-- #top-menu -->
	</nav><!-- #secondary-nav -->

	<header id="masthead" class="masthead outer-width">

		<div id="masthead-inner" class="masthead-inner">

			<span class="logo">
				<?php
				if ( has_custom_logo() ) :
					the_custom_logo();
				else :
				?>
					<a class="custom-logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img class="custom-logo" alt="ClassicPress logo" src="<?php echo esc_url( get_template_directory_uri() . '/images/classicpress-logo-coin-gradient-on-white.svg' ); ?>">
						<span class="screen-reader-text"><?php esc_html_e( 'Home', 'bedrock' ); ?></span>
					</a>
				<?php
				endif;
				?>
			</span>

			<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

		</div>

		<?php
		/*
		 * Note that if you delete the tag line below, you will also
		 * need to reduce the margin-top of .menu-toggles in the
		 * style.css file
		 */
		?>
		<h2><?php bloginfo( 'description' ); ?></h2>

		<div class="menu-toggles">
			<button id="menu-toggle" class="menu-toggle" type="button" aria-haspopup="true" aria-controls="primary-menu" aria-expanded="false" tabindex="0">
				<svg class="icon icon-menu-toggle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/></svg>
				<span id="menu-toggle-text" class="menu-toggle-text screen-reader-text"><?php esc_html_e( 'Primary Menu', 'bedrock' ); ?></span>
			</button>

			<button id="menu-toggle-close" class="menu-toggle" type="button" aria-haspopup="true" aria-controls="primary-menu" aria-expanded="true" tabindex="0" hidden>
				<svg class="icon icon-menu-toggle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
				<span id="menu-toggle-close-text" class="menu-toggle-text screen-reader-text"><?php esc_html_e( 'Close menu', 'bedrock' ); ?></span>
			</button>
		</div><!-- .menu-toggles -->
			
		<div class="menu" role="navigation" aria-labelledby="nav-label">
			<span id="nav-label" class="screen-reader-text">Primary Menu</span>

			<div class="main-navigation-wrapper" id="main-navigation-wrapper">
				<nav id="menu-header" class="main-navigation">

					<?php wp_nav_menu( ['theme_location' => 'menu-1'] ); ?>

				</nav><!-- #menu-header -->
			</div><!-- .main-navigation-wrapper -->
		</div>

	</header><!-- #masthead -->

	<div id="outer-content" class="outer-content outer-width">

		<?php get_sidebar(); ?>

		<div id="content" class="content">
