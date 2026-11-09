<?php
/**
 * Group homepage (shown at the site address "/").
 * Words come from inc/data/group.php and each member's data file.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$g      = occ_data( 'group' );
$people = occ_people();
get_header();
?>
<header class="top">
	<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Home"><span class="brand__bars" aria-hidden="true"><i></i><i></i><i></i></span><?php echo occ_h( $g['school'] ); ?></a>
	<button class="nav-toggle" type="button" data-nav-toggle aria-expanded="false" aria-controls="nav"><span class="sr-only">Menu</span><span aria-hidden="true"></span></button>
	<nav id="nav" class="nav" data-nav aria-label="Main"><?php echo occ_nav_links( 'home' ); // phpcs:ignore ?></nav>
</header>

<main id="main">
	<section class="hero">
		<div class="hero__text">
			<p class="eyebrow"><?php echo occ_h( $g['hero']['eyebrow'] ); ?></p>
			<h1><?php foreach ( $g['hero']['headline'] as $line ) : ?><span><?php echo occ_h( $line ); ?></span><?php endforeach; ?></h1>
			<p class="hero__lead"><?php echo occ_h( $g['hero']['text'] ); ?></p>
			<ul class="hero__links">
				<?php foreach ( $people as $slug => $m ) : ?>
					<li><a class="pill pill--<?php echo occ_a( $slug ); ?>" href="<?php echo occ_url( $slug ); // phpcs:ignore ?>"><i aria-hidden="true"></i><?php echo occ_h( $m['name']['first'] ); ?><small><?php echo occ_h( $m['role'] ); ?></small></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
		<figure class="hero__photo">
			<span class="hero__stripe" aria-hidden="true"><i></i><i></i><i></i></span>
			<img src="<?php echo occ_group_img( $g['hero']['photo'] ); // phpcs:ignore ?>" alt="<?php echo occ_a( $g['hero']['photoAlt'] ); ?>" width="1006" height="1350" fetchpriority="high">
			<figcaption><?php echo occ_h( $g['hero']['photoCaption'] ); ?></figcaption>
		</figure>
	</section>

	<section class="about" id="about" data-reveal>
		<h2 class="label"><?php echo occ_h( $g['about']['title'] ); ?></h2>
		<p class="about__big"><?php echo occ_h( $g['about']['text'][0] ); ?></p>
		<?php foreach ( array_slice( $g['about']['text'], 1 ) as $para ) : ?>
			<p class="about__small"><?php echo occ_h( $para ); ?></p>
		<?php endforeach; ?>
	</section>

	<section class="members" id="members">
		<h2 class="members__title"><?php echo occ_h( $g['membersTitle'] ); ?></h2>
		<div class="members__grid">
			<?php foreach ( $people as $slug => $m ) : ?>
				<article class="member member--<?php echo occ_a( $slug ); ?>" data-reveal>
					<a class="member__photo" href="<?php echo occ_url( $slug ); // phpcs:ignore ?>" tabindex="-1" aria-hidden="true">
						<img src="<?php echo occ_img( $m, $m['profile'] ); // phpcs:ignore ?>" alt="" loading="lazy" style="object-position:<?php echo occ_a( $m['profilePosition'] ); ?>">
					</a>
					<div class="member__body">
						<p class="member__role"><?php echo occ_h( $m['role'] ); ?></p>
						<h3><?php echo occ_h( $m['name']['full'] ); ?></h3>
						<p class="member__nick">“<?php echo occ_h( $m['name']['nickname'] ); ?>”</p>
						<p><?php echo occ_h( $m['shortIntro'] ); ?></p>
						<a class="btn" href="<?php echo occ_url( $slug ); // phpcs:ignore ?>"><?php echo occ_h( $m['name']['first'] ); ?>’s portfolio <span aria-hidden="true">→</span></a>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</section>

	<section class="snap" id="snapshots">
		<h2 class="label"><?php echo occ_h( $g['galleryTitle'] ); ?></h2>
		<div class="mosaic">
			<?php
			foreach ( $g['gallery'] as $tile ) :
				$owner = isset( $people[ $tile['owner'] ] ) ? $people[ $tile['owner'] ] : null;
				$src   = $owner ? occ_img( $owner, $tile['file'] ) : occ_group_img( $tile['file'] );
				$href  = $owner ? occ_url( $tile['owner'] ) : occ_url( 'home' );
				$who   = $owner ? $owner['name']['first'] : 'Group';
				?>
				<a class="tile<?php echo ! empty( $tile['wide'] ) ? ' tile--wide' : ''; ?>" href="<?php echo $href; // phpcs:ignore ?>" data-reveal>
					<img src="<?php echo $src; // phpcs:ignore ?>" alt="<?php echo occ_a( $tile['caption'] ); ?>" loading="lazy">
					<span class="tile__cap"><b><?php echo occ_h( $who ); ?></b> <?php echo occ_h( $tile['caption'] ); ?></span>
				</a>
			<?php endforeach; ?>
		</div>
	</section>
</main>

<footer class="foot">
	<div class="foot__grid">
		<div>
			<p class="foot__brand"><?php echo occ_h( $g['siteTitle'] ); ?></p>
			<p><?php echo occ_h( $g['footer']['note'] ); ?></p>
		</div>
		<nav aria-label="Footer"><h2 class="label">Pages</h2><div class="foot__links"><?php echo occ_nav_links( 'home' ); // phpcs:ignore ?></div></nav>
		<div>
			<h2 class="label">Contact</h2>
			<ul class="foot__contact">
				<?php foreach ( $people as $m ) : ?>
					<li><b><?php echo occ_h( $m['name']['first'] ); ?></b> <a href="mailto:<?php echo occ_a( $m['contact']['email'] ); ?>"><?php echo occ_h( $m['contact']['email'] ); ?></a><?php foreach ( $m['contact']['links'] as $l ) : ?> · <a href="<?php echo esc_url( $l['url'] ); ?>" target="_blank" rel="noopener"><?php echo occ_h( $l['label'] ); ?></a><?php endforeach; ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</footer>
<?php
get_footer();
