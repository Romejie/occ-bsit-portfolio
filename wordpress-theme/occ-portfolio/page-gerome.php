<?php
/**
 * Template Name: Gerome Portfolio
 * Army field-manual design. Words come from inc/data/gerome.php.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$p = occ_data( 'gerome' );
$t = $p['titles'];

$chev = '<svg class="rank" viewBox="0 0 40 52" aria-hidden="true"><path d="M4 4h32v10L20 24 4 14z M4 18l16 10 16-10v10L20 38 4 28z M4 32l16 10 16-10v10L20 52 4 42z" fill="currentColor"/></svg>';

$open  = function ( $id, $num, $title, $cls = '' ) {
	?>
<section class="sec <?php echo occ_a( $cls ); ?>" id="<?php echo occ_a( $id ); ?>">
	<div class="wrap">
		<h2 class="sec__title" data-reveal><span class="mono"><?php echo occ_h( $num ); ?></span> <?php echo occ_h( $title ); ?></h2>
	<?php
};
$close = function () {
	?>
	</div>
</section>
	<?php
};

get_header();
?>
<header class="bar">
	<a class="bar__brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Back to the group homepage"><?php echo $chev; // phpcs:ignore ?><span><b><?php echo occ_h( $p['name']['last'] ); ?></b> <i>/ <?php echo occ_h( $p['name']['first'] ); ?></i></span></a>
	<button class="nav-toggle" type="button" data-nav-toggle aria-expanded="false" aria-controls="nav"><span class="sr-only">Menu</span><span aria-hidden="true"></span></button>
	<nav id="nav" class="bar__nav" data-nav aria-label="Main"><?php echo occ_nav_links( 'gerome' ); // phpcs:ignore ?></nav>
</header>

<main id="main">
	<section class="hero camo">
		<div class="hero__shade"></div>
		<div class="wrap hero__grid">
			<div class="hero__copy">
				<p class="mono hero__tag">// Personal portfolio · BSIT 4th year</p>
				<h1><span><?php echo occ_h( $p['name']['first'] ); ?></span><span><?php echo occ_h( $p['name']['last'] ); ?></span></h1>
				<p class="hero__role"><?php echo occ_h( $p['role'] ); ?> <em>·</em> Army Reservist</p>
				<p class="hero__tagline"><?php echo occ_h( $p['tagline'] ); ?></p>
				<blockquote class="hero__quote"><?php echo occ_h( $p['statement'] ); ?></blockquote>
				<div class="hero__cta">
					<a class="btn btn--solid" href="#about">Read the mission brief</a>
					<a class="btn" href="#contact">Contact</a>
				</div>
			</div>
			<figure class="idcard">
				<span class="idcard__corner c1"></span><span class="idcard__corner c2"></span><span class="idcard__corner c3"></span><span class="idcard__corner c4"></span>
				<img src="<?php echo occ_img( $p, $p['profile'] ); // phpcs:ignore ?>" alt="Portrait of <?php echo occ_a( $p['name']['full'] ); ?> in Army uniform" width="1050" height="1400" fetchpriority="high" style="object-position:<?php echo occ_a( $p['profilePosition'] ); ?>">
				<figcaption>
					<span class="tape"><?php echo occ_h( $p['name']['last'] ); ?></span>
					<span class="tape tape--wide"><?php echo occ_h( $p['badge'] ); ?></span>
				</figcaption>
			</figure>
		</div>
	</section>
	<div class="chevrons" aria-hidden="true"></div>

	<?php $open( 'about', '01', $t['about'] ); ?>
		<div class="about">
			<div class="about__text" data-reveal>
				<?php foreach ( $p['about'] as $para ) : ?><p><?php echo occ_h( $para ); ?></p><?php endforeach; ?>
			</div>
			<dl class="dossier" data-reveal>
				<?php foreach ( $p['facts'] as $f ) : ?>
					<div><dt class="mono"><?php echo occ_h( $f['label'] ); ?></dt><dd><?php echo occ_h( $f['value'] ); ?></dd></div>
				<?php endforeach; ?>
			</dl>
		</div>
	<?php $close(); ?>

	<?php $open( 'profile', '02', $t['background'], 'sec--khaki' ); ?>
		<div class="cards">
			<?php foreach ( $p['strengths'] as $i => $s ) : ?>
				<article class="card" data-reveal><p class="mono card__n">STRENGTH 0<?php echo (int) $i + 1; ?></p><h3><?php echo occ_h( $s['title'] ); ?></h3><p><?php echo occ_h( $s['text'] ); ?></p></article>
			<?php endforeach; ?>
		</div>
		<div class="orders" data-reveal>
			<p class="mono">STANDING ORDERS</p>
			<h3><?php echo occ_h( $p['motivation']['title'] ); ?></h3>
			<p><?php echo occ_h( $p['motivation']['text'] ); ?></p>
		</div>
		<div class="objective" data-reveal>
			<p class="mono">OBJECTIVE</p>
			<p><?php echo occ_h( $p['goal'] ); ?></p>
		</div>
	<?php $close(); ?>

	<?php $open( 'field', '03', $t['hobbies'] ); ?>
		<div class="topo">
			<ol class="waypoints">
				<?php foreach ( $p['hobbies'] as $i => $h ) : ?>
					<li class="wp" data-reveal>
						<span class="wp__pin mono">WP-0<?php echo (int) $i + 1; ?></span>
						<h3><?php echo occ_h( $h['title'] ); ?></h3>
						<p><?php echo occ_h( $h['text'] ); ?></p>
					</li>
				<?php endforeach; ?>
			</ol>
			<svg class="compass" viewBox="0 0 120 120" aria-hidden="true"><circle cx="60" cy="60" r="54" fill="none" stroke="currentColor" stroke-width="2"/><circle cx="60" cy="60" r="44" fill="none" stroke="currentColor" stroke-width="1" stroke-dasharray="2 5"/><path d="M60 14l9 46H51z" fill="#c9b27c"/><path d="M60 106l-9-46h18z" fill="currentColor" opacity=".5"/><circle cx="60" cy="60" r="4" fill="#161a10" stroke="currentColor"/><text x="60" y="11" text-anchor="middle" font-size="10" font-family="IBM Plex Mono" fill="currentColor">N</text></svg>
		</div>
	<?php $close(); ?>

	<?php $open( 'loadout', '04', $t['skills'], 'sec--dark2' ); ?>
		<div class="gear">
			<?php foreach ( $p['skills'] as $i => $grp ) : ?>
				<div class="gear__col" data-reveal>
					<p class="mono">SLOT 0<?php echo (int) $i + 1; ?> · <?php echo occ_h( $grp['group'] ); ?></p>
					<ul><?php foreach ( $grp['items'] as $item ) : ?><li class="tape tape--big"><?php echo occ_h( $item ); ?></li><?php endforeach; ?></ul>
				</div>
			<?php endforeach; ?>
		</div>
	<?php $close(); ?>

	<?php $open( 'training', '05', $t['education'], 'sec--khaki' ); ?>
		<ol class="timeline">
			<?php foreach ( $p['education'] as $e ) : ?>
				<li data-reveal><?php echo $chev; // phpcs:ignore ?><div><h3><?php echo occ_h( $e['school'] ); ?></h3><p><?php echo occ_h( $e['level'] ); ?></p><?php if ( ! empty( $e['period'] ) ) : ?><p class="mono"><?php echo occ_h( $e['period'] ); ?></p><?php endif; ?></div></li>
			<?php endforeach; ?>
		</ol>
	<?php $close(); ?>

	<?php $open( 'operations', '06', $t['projects'] ); ?>
		<ol class="oplog">
			<?php foreach ( $p['projects'] as $i => $pr ) : ?>
				<li data-reveal>
					<span class="mono oplog__n">OP-0<?php echo (int) $i + 1; ?></span>
					<div><h3><?php echo occ_h( $pr['title'] ); ?></h3><?php if ( ! empty( $pr['description'] ) ) : ?><p><?php echo occ_h( $pr['description'] ); ?></p><?php endif; ?></div>
					<span class="oplog__role mono">ROLE: <?php echo occ_h( $pr['role'] ); ?></span>
					<?php if ( ! empty( $pr['photo'] ) ) : ?><img src="<?php echo occ_img( $p, $pr['photo'] ); // phpcs:ignore ?>" alt="" loading="lazy"><?php endif; ?>
				</li>
			<?php endforeach; ?>
		</ol>
	<?php $close(); ?>

	<?php $open( 'commendations', '07', $t['achievements'], 'sec--dark2' ); ?>
		<div class="awards">
			<?php foreach ( $p['achievements'] as $a ) : ?>
				<article class="award" data-reveal>
					<?php if ( ! empty( $a['photo'] ) ) : ?><img src="<?php echo occ_img( $p, $a['photo'] ); // phpcs:ignore ?>" alt="" loading="lazy"><?php endif; ?>
					<div><h3><?php echo occ_h( $a['title'] ); ?></h3><?php if ( ! empty( $a['detail'] ) ) : ?><p><?php echo occ_h( $a['detail'] ); ?></p><?php endif; ?></div>
				</article>
			<?php endforeach; ?>
		</div>
	<?php $close(); ?>

	<?php $open( 'photos', '08', $t['gallery'], 'sec--khaki' ); ?>
		<div class="sheet">
			<?php foreach ( $p['gallery'] as $gi ) : ?>
				<button type="button" class="shot" data-lightbox data-caption="<?php echo occ_a( $gi['caption'] ); ?>" data-reveal>
					<img src="<?php echo occ_img( $p, $gi['file'] ); // phpcs:ignore ?>" alt="<?php echo occ_a( $gi['caption'] ); ?>" loading="lazy">
					<span class="tape"><?php echo occ_h( $gi['caption'] ); ?></span>
				</button>
			<?php endforeach; ?>
		</div>
	<?php $close(); ?>

	<?php $open( 'contact', '09', $t['contact'] ); ?>
		<div class="comms" data-reveal>
			<a class="comms__mail" href="mailto:<?php echo occ_a( $p['contact']['email'] ); ?>"><?php echo occ_h( $p['contact']['email'] ); ?></a>
			<ul><?php foreach ( $p['contact']['links'] as $l ) : ?><li><a class="btn" href="<?php echo esc_url( $l['url'] ); ?>" target="_blank" rel="noopener"><?php echo occ_h( $l['label'] ); ?> ↗</a></li><?php endforeach; ?></ul>
		</div>
	<?php $close(); ?>
</main>

<footer class="foot">
	<div class="chevrons" aria-hidden="true"></div>
	<div class="wrap foot__in">
		<p class="mono"><?php echo occ_h( $p['name']['full'] ); ?> · BSIT · Opol Community College</p>
		<nav class="foot__nav" aria-label="Footer"><?php echo occ_nav_links( 'gerome' ); // phpcs:ignore ?></nav>
	</div>
</footer>
<?php
get_footer();
