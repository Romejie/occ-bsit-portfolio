<?php
/**
 * Template Name: Leah Portfolio
 * Cinematic design. Words come from inc/data/leah.php.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$p     = occ_data( 'leah' );
$t     = $p['titles'];
$roman = array( 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII' );

$marquee = 'Now showing &nbsp;✦&nbsp; ' . occ_h( $p['name']['full'] ) . ' &nbsp;✦&nbsp; ' . occ_h( $p['role'] ) . ' &nbsp;✦&nbsp; Bachelor of Science in Information Technology &nbsp;✦&nbsp; ';

$open  = function ( $id, $kicker, $title, $cls = '' ) {
	?>
<section class="sec <?php echo occ_a( $cls ); ?>" id="<?php echo occ_a( $id ); ?>">
	<div class="wrap">
		<header class="sec__head" data-reveal>
			<p class="kicker"><?php echo occ_h( $kicker ); ?></p>
			<h2><?php echo occ_h( $title ); ?></h2>
		</header>
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
<div class="marquee" aria-hidden="true"><div class="marquee__track"><span><?php echo str_repeat( $marquee, 4 ); // phpcs:ignore ?></span><span><?php echo str_repeat( $marquee, 4 ); // phpcs:ignore ?></span></div></div>
<header class="mast">
	<a class="mast__brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo occ_h( $p['name']['first'] ); ?> <i><?php echo occ_h( $p['name']['last'] ); ?></i></a>
	<button class="nav-toggle" type="button" data-nav-toggle aria-expanded="false" aria-controls="nav"><span class="sr-only">Menu</span><span aria-hidden="true"></span></button>
	<nav id="nav" class="mast__nav" data-nav aria-label="Main"><?php echo occ_nav_links( 'leah' ); // phpcs:ignore ?></nav>
</header>

<main id="main">
	<section class="hero">
		<div class="wrap hero__grid">
			<div class="hero__copy">
				<p class="hero__pre">A BSIT story in four chapters</p>
				<h1><span><?php echo occ_h( $p['name']['first'] ); ?> <em>Mae</em></span><span><?php echo occ_h( $p['name']['last'] ); ?></span></h1>
				<p class="hero__tag"><?php echo occ_h( $p['tagline'] ); ?></p>
				<blockquote>“<?php echo occ_h( $p['statement'] ); ?>”</blockquote>
				<div class="hero__cta">
					<a class="btn btn--red" href="#story">Read the story</a>
					<a class="btn" href="#contact">Say hello</a>
				</div>
			</div>
			<figure class="poster">
				<span class="poster__circle" aria-hidden="true"></span>
				<div class="poster__arch"><img src="<?php echo occ_img( $p, $p['profile'] ); // phpcs:ignore ?>" alt="Portrait of <?php echo occ_a( $p['name']['full'] ); ?>" width="1101" height="1048" fetchpriority="high" style="object-position:<?php echo occ_a( $p['profilePosition'] ); ?>"></div>
				<figcaption><?php echo occ_h( $p['role'] ); ?> · Opol Community College · 4th year</figcaption>
			</figure>
		</div>
	</section>

	<?php $open( 'story', 'Chapter one', $t['about'] ); ?>
		<div class="story">
			<div class="story__text" data-reveal><?php foreach ( $p['about'] as $para ) : ?><p><?php echo occ_h( $para ); ?></p><?php endforeach; ?></div>
			<aside class="cast" data-reveal aria-label="<?php echo occ_a( $t['background'] ); ?>">
				<h3><?php echo occ_h( $t['background'] ); ?></h3>
				<dl><?php foreach ( $p['facts'] as $f ) : ?><div><dt><?php echo occ_h( $f['label'] ); ?></dt><dd><?php echo occ_h( $f['value'] ); ?></dd></div><?php endforeach; ?></dl>
			</aside>
		</div>
		<div class="traits" data-reveal>
			<p class="traits__intro"><?php echo occ_h( $p['strengths']['intro'] ); ?></p>
			<ul><?php foreach ( $p['strengths']['items'] as $s ) : ?><li><?php echo occ_h( $s ); ?></li><?php endforeach; ?></ul>
		</div>
	<?php $close(); ?>

	<section class="drive" aria-labelledby="drive-h">
		<div class="wrap drive__grid">
			<div data-reveal><p class="kicker kicker--light"><?php echo occ_h( $p['motivation']['title'] ); ?></p><p class="drive__quote" id="drive-h"><?php echo occ_h( $p['motivation']['text'] ); ?></p></div>
			<div data-reveal><p class="kicker kicker--light">The dream</p><p class="drive__goal"><?php echo occ_h( $p['goal'] ); ?></p></div>
		</div>
	</section>

	<?php $open( 'offscreen', 'Chapter two', $t['hobbies'] ); ?>
		<?php if ( ! empty( $p['hobbiesIntro'] ) ) : ?><p class="lead" data-reveal><?php echo occ_h( $p['hobbiesIntro'] ); ?></p><?php endif; ?>
		<div class="posters">
			<?php foreach ( $p['hobbies'] as $i => $h ) : ?>
				<article class="mini mini--<?php echo (int) ( $i % 3 ); ?>" data-reveal>
					<span class="mini__n" aria-hidden="true"><?php echo esc_html( str_pad( (string) ( $i + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
					<h3><?php echo occ_h( $h['title'] ); ?></h3>
					<p><?php echo occ_h( $h['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	<?php $close(); ?>

	<section class="credits" id="credits">
		<div class="wrap">
			<header class="sec__head sec__head--center" data-reveal><p class="kicker kicker--light">The skills</p><h2><?php echo occ_h( $t['skills'] ); ?></h2></header>
			<?php foreach ( $p['skills'] as $grp ) : ?>
				<div class="credits__group" data-reveal>
					<p class="credits__role"><?php echo occ_h( $grp['group'] ); ?></p>
					<ul><?php foreach ( $grp['items'] as $item ) : ?><li><?php echo occ_h( $item ); ?></li><?php endforeach; ?></ul>
				</div>
			<?php endforeach; ?>
		</div>
	</section>

	<?php $open( 'chapters', 'Where it started', $t['education'], 'sec--tint' ); ?>
		<ol class="chapters">
			<?php foreach ( array_reverse( $p['education'] ) as $i => $e ) : ?>
				<li data-reveal>
					<span class="chapters__n" aria-hidden="true"><?php echo occ_h( isset( $roman[ $i ] ) ? $roman[ $i ] : (string) ( $i + 1 ) ); ?></span>
					<h3><?php echo occ_h( $e['school'] ); ?></h3>
					<p><?php echo occ_h( $e['level'] ); ?></p>
					<?php if ( ! empty( $e['period'] ) ) : ?><p class="chapters__now"><?php echo occ_h( $e['period'] ); ?></p><?php endif; ?>
				</li>
			<?php endforeach; ?>
		</ol>
	<?php $close(); ?>

	<?php $open( 'work', 'Featured work', $t['projects'] ); ?>
		<?php if ( ! empty( $p['projectsIntro'] ) ) : ?><p class="lead" data-reveal><?php echo occ_h( $p['projectsIntro'] ); ?></p><?php endif; ?>
		<ul class="reels">
			<?php foreach ( $p['projects'] as $i => $pr ) : ?>
				<li data-reveal>
					<span class="reels__n">№ <?php echo (int) $i + 1; ?></span>
					<h3><?php echo occ_h( $pr['title'] ); ?></h3>
					<p class="reels__role"><?php echo occ_h( $pr['role'] ); ?></p>
					<?php if ( ! empty( $pr['description'] ) ) : ?><p><?php echo occ_h( $pr['description'] ); ?></p><?php endif; ?>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php $close(); ?>

	<?php $open( 'awards', 'Applause', $t['achievements'], 'sec--tint' ); ?>
		<div class="awards">
			<?php foreach ( $p['achievements'] as $a ) : ?>
				<article class="award<?php echo ! empty( $a['photo'] ) ? ' award--photo' : ''; ?>" data-reveal>
					<?php if ( ! empty( $a['photo'] ) ) : ?><button type="button" class="award__pic" data-lightbox data-caption="<?php echo occ_a( $a['title'] ); ?>"><img src="<?php echo occ_img( $p, $a['photo'] ); // phpcs:ignore ?>" alt="<?php echo occ_a( $a['title'] ); ?>" loading="lazy"></button><?php endif; ?>
					<div><h3><?php echo occ_h( $a['title'] ); ?></h3><?php if ( ! empty( $a['detail'] ) ) : ?><p><?php echo occ_h( $a['detail'] ); ?></p><?php endif; ?></div>
				</article>
			<?php endforeach; ?>
		</div>
	<?php $close(); ?>

	<section class="roll" id="roll">
		<div class="wrap"><header class="sec__head" data-reveal><p class="kicker kicker--light">Behind the scenes</p><h2><?php echo occ_h( $t['gallery'] ); ?></h2></header></div>
		<div class="roll__scroll" tabindex="0" role="region" aria-label="<?php echo occ_a( $t['gallery'] ); ?> — scroll sideways">
			<div class="roll__track">
				<?php foreach ( $p['gallery'] as $gi ) : ?>
					<button type="button" class="frame" data-lightbox data-caption="<?php echo occ_a( $gi['caption'] ); ?>">
						<img src="<?php echo occ_img( $p, $gi['file'] ); // phpcs:ignore ?>" alt="<?php echo occ_a( $gi['caption'] ); ?>" loading="lazy">
						<span><?php echo occ_h( $gi['caption'] ); ?></span>
					</button>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<?php $open( 'contact', 'Last scene', $t['contact'] ); ?>
		<div class="ticket" data-reveal>
			<div class="ticket__main">
				<p class="kicker">Admit one conversation</p>
				<a class="ticket__mail" href="mailto:<?php echo occ_a( $p['contact']['email'] ); ?>"><?php echo occ_h( $p['contact']['email'] ); ?></a>
			</div>
			<ul class="ticket__stub"><?php foreach ( $p['contact']['links'] as $l ) : ?><li><a href="<?php echo esc_url( $l['url'] ); ?>" target="_blank" rel="noopener"><?php echo occ_h( $l['label'] ); ?> ↗</a></li><?php endforeach; ?></ul>
		</div>
	<?php $close(); ?>
</main>

<footer class="foot">
	<div class="wrap foot__in">
		<p><?php echo occ_h( $p['name']['full'] ); ?> · BSIT · Opol Community College</p>
		<nav aria-label="Footer"><?php echo occ_nav_links( 'leah' ); // phpcs:ignore ?></nav>
	</div>
</footer>
<?php
get_footer();
