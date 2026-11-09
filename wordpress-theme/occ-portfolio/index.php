<?php
/**
 * Fallback template (used for anything that is not one of the four pages).
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
?>
<main id="main" style="max-width:640px;margin:15vh auto;padding:0 1.2rem;font-family:system-ui,sans-serif">
	<h1>Page not found</h1>
	<p>Try one of the portfolio pages:</p>
	<nav class="nav" aria-label="Main" style="display:flex;gap:1rem;flex-wrap:wrap"><?php echo occ_nav_links( '' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></nav>
</main>
<?php
get_footer();
