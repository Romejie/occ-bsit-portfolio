<?php
/**
 * Small helper functions used by the page templates.
 * You normally never need to edit this file.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/** Load a data file from inc/data/ (group, gerome, leah or marvin). */
function occ_data( string $name ): array {
	static $cache = array();
	if ( ! isset( $cache[ $name ] ) ) {
		$cache[ $name ] = require get_theme_file_path( "inc/data/{$name}.php" );
	}
	return $cache[ $name ];
}

/** The three members, keyed by their page slug. */
function occ_people(): array {
	return array(
		'gerome' => occ_data( 'gerome' ),
		'leah'   => occ_data( 'leah' ),
		'marvin' => occ_data( 'marvin' ),
	);
}

/** Escape text for HTML. */
function occ_h( $text ): string {
	return esc_html( (string) $text );
}

/** Escape text for an HTML attribute. */
function occ_a( $text ): string {
	return esc_attr( (string) $text );
}

/** URL of a photo inside a person's image folder. */
function occ_img( array $person, string $file ): string {
	if ( '' === $file ) {
		return '';
	}
	return esc_url( get_theme_file_uri( 'assets/images/' . $person['folder'] . '/' . $file ) );
}

/** URL of a photo inside the group image folder. */
function occ_group_img( string $file ): string {
	return esc_url( get_theme_file_uri( 'assets/images/group/' . $file ) );
}

/** Address of one of the four pages. */
function occ_url( string $slug ): string {
	return esc_url( 'home' === $slug ? home_url( '/' ) : home_url( '/' . $slug . '/' ) );
}

/** Shared navigation links (Home + one per member). */
function occ_nav_links( string $current ): string {
	$items = array( 'home' => 'Home' );
	foreach ( occ_people() as $slug => $person ) {
		$items[ $slug ] = $person['name']['first'];
	}
	$html = '';
	foreach ( $items as $slug => $label ) {
		$aria  = ( $slug === $current ) ? ' aria-current="page"' : '';
		$html .= '<a href="' . occ_url( $slug ) . '"' . $aria . '>' . occ_h( $label ) . '</a>';
	}
	return $html;
}

/** Which of the four designs the current request uses: home, gerome, leah or marvin. */
function occ_current_page(): string {
	$map  = array(
		'front-page.php'   => 'home',
		'page-gerome.php'  => 'gerome',
		'page-leah.php'    => 'leah',
		'page-marvin.php'  => 'marvin',
	);
	$file = isset( $GLOBALS['occ_template'] ) ? $GLOBALS['occ_template'] : '';
	return isset( $map[ $file ] ) ? $map[ $file ] : 'home';
}

/** "Programming Languages" -> "programming_languages" (used by Marvin's code-style skills). */
function occ_snake( string $text ): string {
	$text = strtolower( $text );
	$text = preg_replace( '/[^a-z0-9]+/', '_', $text );
	return trim( (string) $text, '_' );
}
