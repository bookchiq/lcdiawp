<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package _s
 * @since _s 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php
		/*
		 * Print the <title> tag based on what is being viewed.
		 */
		global $page, $paged;

		wp_title( '|', true, 'right' );

		// Add the blog name.
		bloginfo( 'name' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";

		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s', '_s' ), max( $paged, $page ) );

		?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header content-section" role="banner">
		<span class="section-description"><?php _e( 'Header', 'lcdia' ); ?></span>
		<?php dynamic_sidebar( 'header' ); ?>
	</header><!-- #masthead .site-header -->

	<nav role="navigation" class="site-navigation main-navigation content-section">
		<span class="section-description"><?php _e( 'Main Menu', 'lcdia' ); ?></span>

		<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
	</nav><!-- .site-navigation .main-navigation -->

	<div id="main" class="site-main content-section">
		<span class="section-description"><?php _e( 'Main Content', 'lcdia' ); ?></span>
		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">

			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header class="entry-header">
							<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'lcdia' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						</header><!-- .entry-header -->

						<div class="entry-content">
							<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'lcdia' ) ); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'lcdia' ), 'after' => '</div>' ) ); ?>
						</div><!-- .entry-content -->
					</article><!-- #post-<?php the_ID(); ?> -->


				<?php endwhile; ?>
			<?php else : ?>

				<p>No content here, yet.</p>

			<?php endif; ?>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

	</div><!-- #main .site-main -->
	<div class="content-section secondary-content">
		<span class="section-description"><?php _e( 'Secondary Content', 'lcdia' ); ?></span>
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>

	<div class="content-section site-structure">
		<span class="section-description"><?php _e( 'Site Structure', 'lcdia' ); ?></span>
		<p><em>This area is only for reference; it doesn't reflect any particular type of content, just a quick way to see all of the content that's currently mapped out.</em></p>
		<br>
		<div class="wrapper">
			<ul id="site-structure-list">
				<?php wp_list_pages( array( 'title_li' => '' ) ); ?>
			</ul>
		</div>
	</div>

	
</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>

</body>
</html>