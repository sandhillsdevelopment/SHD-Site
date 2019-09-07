<?php
/**
 * Adjustments to theme header
 */

/**
 * Add custom site header structure
 */
function shd_site_header() {

	// Set up default container classes.
	$container_classes = array( 'container pt-md-7 pb-md-6 pt-5 pb-5 justify-content-center' );
	?>

	<div id="masthead" class="site-header" role="banner">
		<div class="navbar navbar-expand-md px-0 py-0">
			<?php echo themedd_navbar_toggler(); ?>
		</div>
		<div id="navbar-mobile" class="navbar px-0 px-md-3 py-0 d-md-none">
			<div class="container">
				<nav class="navbar-collapse collapse" id="nav-mobile">
					<?php echo themedd_mobile_menu(); ?>
				</nav>
			</div>
		</div>

		<div class="navbar-header navbar-expand-md px-0 py-0">
			<div class="<?php echo themedd_output_classes( $container_classes ); ?>">
				<div class="row no-gutters">
					<div class="col-md-3">
						<?php echo shd_site_branding(); ?>
					</div>
					<div class="col-md-9 secondary-menu-container-right">
						<nav id="nav-secondary" class="navbar-collapse collapse justify-content-end">
							<?php echo themedd_secondary_navigation( array( 'menu_classes' => array( 'navbar-right' ) ) ); ?>
						</nav>
					</div>
				</div>
			</div>
		</div>

		<?php
		if ( is_front_page() ) {
			get_template_part( 'template-parts/content', 'front-page-hero' );
		} if ( is_home() ) {
			get_template_part( 'template-parts/content', 'blog-hero' );
		}
		?>

	</div>

	<?php
}
remove_action( 'themedd_site_header', 'themedd_site_header', 20 );
add_action( 'themedd_site_header', 'shd_site_header', 20 );


/**
 * Custom site logo with SVG support
 */
function shd_site_branding() {
	$classes    = array( 'site-title', 'mb-0' );
	$logo_color = is_front_page() || is_home() ? 'light' : 'dark';
	?>

	<div class="site-branding<?php if ( ! display_header_text() ) { echo ' sr-only'; } ?>">

		<?php do_action( 'themedd_site_branding_start' ); ?>

		<span class="<?php echo themedd_output_classes( $classes ); ?>">
			<a class="shd-logo-anchor navbar-brand mr-0" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<img class="shd-logo" src="<?php echo SHD_IMAGES . 'logos/shd-logo-' . $logo_color . '.svg'; ?>" alt="Sandhills Development" data-fallback="<?php echo SHD_IMAGES . 'logos/shd-logo-' . $logo_color . '.png'; ?>">
			</a>
		</span>

	</div>
	<?php
}