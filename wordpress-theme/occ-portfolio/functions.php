<?php
/**
 * OCC Portfolio theme setup.
 * You normally never need to edit this file — edit inc/data/*.php instead.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once get_theme_file_path( 'inc/helpers.php' );

/** Basic theme features. */
add_action(
	'after_setup_theme',
	function () {
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', array( 'script', 'style' ) );
	}
);

/** Remember which template file WordPress picked (needed to load the right design). */
add_filter(
	'template_include',
	function ( $template ) {
		$GLOBALS['occ_template'] = basename( $template );
		return $template;
	}
);

/** Page-specific body class, e.g. "page-gerome" (the CSS files use it). */
add_filter(
	'body_class',
	function ( $classes ) {
		$classes[] = 'page-' . occ_current_page();
		return $classes;
	}
);

/** Browser-tab titles. */
add_filter(
	'pre_get_document_title',
	function ( $title ) {
		$page = occ_current_page();
		if ( 'home' === $page ) {
			$g = occ_data( 'group' );
			return $g['siteTitle'];
		}
		$p = occ_data( $page );
		return $p['name']['first'] . ' ' . $p['name']['last'] . ' — ' . $p['tagline'];
	}
);

/** Load the fonts, CSS and JavaScript for the current page only. */
add_action(
	'wp_enqueue_scripts',
	function () {
		$page    = occ_current_page();
		$version = wp_get_theme()->get( 'Version' );

		$fonts = array(
			'home'   => 'family=Bricolage+Grotesque:opsz,wght@12..96,400;12..96,700;12..96,800&family=Instrument+Sans:wght@400;500;600',
			'gerome' => 'family=Barlow+Condensed:wght@500;600;700&family=Barlow:wght@400;500;600&family=IBM+Plex+Mono:wght@400;500;600&family=Stardos+Stencil:wght@700',
			'leah'   => 'family=Playfair+Display:ital,wght@0,500;0,700;0,900;1,500;1,700&family=DM+Sans:wght@400;500;600',
			'marvin' => 'family=Space+Grotesk:wght@400;500;700&family=JetBrains+Mono:wght@400;500;700',
		);

		wp_enqueue_style( 'occ-fonts', 'https://fonts.googleapis.com/css2?' . $fonts[ $page ] . '&display=swap', array(), null );
		wp_enqueue_style( 'occ-base', get_theme_file_uri( 'assets/css/base.css' ), array(), $version );
		wp_enqueue_style( 'occ-' . $page, get_theme_file_uri( "assets/css/{$page}.css" ), array( 'occ-base', 'occ-fonts' ), $version );

		wp_enqueue_script( 'occ-site', get_theme_file_uri( 'assets/js/site.js' ), array(), $version, true );
		if ( in_array( $page, array( 'gerome', 'marvin' ), true ) ) {
			wp_enqueue_script( 'occ-' . $page, get_theme_file_uri( "assets/js/{$page}.js" ), array( 'occ-site' ), $version, true );
		}
	}
);

/** Tab icon. */
add_action(
	'wp_head',
	function () {
		if ( ! has_site_icon() ) {
			echo '<link rel="icon" href="' . esc_url( get_theme_file_uri( 'assets/images/favicon.svg' ) ) . '" type="image/svg+xml">' . "\n";
		}
	}
);

/**
 * When the theme is activated: create the four pages (Home, Gerome, Leah, Marvin),
 * make Home the front page, and switch on pretty links like /gerome/.
 */
add_action(
	'after_switch_theme',
	function () {
		$pages = array(
			'home'   => 'Home',
			'gerome' => 'Gerome',
			'leah'   => 'Leah',
			'marvin' => 'Marvin',
		);
		$ids   = array();
		foreach ( $pages as $slug => $title ) {
			$existing = get_page_by_path( $slug );
			if ( $existing ) {
				$ids[ $slug ] = $existing->ID;
				continue;
			}
			$ids[ $slug ] = wp_insert_post(
				array(
					'post_title'   => $title,
					'post_name'    => $slug,
					'post_status'  => 'publish',
					'post_type'    => 'page',
					'post_content' => '',
				)
			);
		}
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $ids['home'] );

		global $wp_rewrite;
		$wp_rewrite->set_permalink_structure( '/%postname%/' );
		flush_rewrite_rules();
	}
);
