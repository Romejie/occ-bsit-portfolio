<?php
/**
 * Template Name: Marvin Portfolio
 * Developer-terminal design. Words come from inc/data/marvin.php.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$p = occ_data( 'marvin' );
$t = $p['titles'];

$sections = array(
	'about'    => $t['about'],
	'profile'  => $t['background'],
	'offduty'  => $t['hobbies'],
	'stack'    => $t['skills'],
	'history'  => $t['education'],
	'projects' => $t['projects'],
	'certs'    => $t['achievements'],
	'shots'    => $t['gallery'],
	'contact'  => $t['contact'],
);

$term_lines = array(
	array( 'cmd' => 'whoami', 'out' => $p['name']['full'] ),
	array( 'cmd' => 'cat role.txt', 'out' => $p['role'] . ' · BSIT 4th year · Opol Community College' ),
	array( 'cmd' => 'echo $MOTTO', 'out' => '“' . $p['statement'] . '”' ),
);

$open  = function ( $id, $title ) {
	?>
<section class="win" id="<?php echo occ_a( $id ); ?>" data-reveal>
	<div class="win__bar"><span class="dots" aria-hidden="true"><i></i><i></i><i></i></span><h2><?php echo occ_h( $title ); ?></h2></div>
	<div class="win__body">
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
<header class="top">
	<a class="top__brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><span><?php echo occ_h( strtolower( $p['name']['first'] ) ); ?></span>@occ:~$</a>
	<button class="nav-toggle" type="button" data-nav-toggle aria-expanded="false" aria-controls="nav"><span class="sr-only">Menu</span><span aria-hidden="true"></span></button>
</header>

<div class="shell">
	<aside class="side" id="nav" data-nav>
		<p class="side__prompt"><span><?php echo occ_h( strtolower( $p['name']['first'] ) ); ?></span>@occ:~$</p>
		<nav aria-label="Pages"><p class="side__h">pages</p><?php echo occ_nav_links( 'marvin' ); // phpcs:ignore ?></nav>
		<nav class="side__sections" aria-label="On this page"><p class="side__h">sections</p>
			<?php foreach ( $sections as $id => $label ) : ?><a href="#<?php echo occ_a( $id ); ?>"><?php echo occ_h( $label ); ?></a><?php endforeach; ?>
		</nav>
	</aside>

	<main id="main">
		<section class="hero">
			<div class="hero__term" aria-label="Terminal introduction">
				<div class="win__bar"><span class="dots" aria-hidden="true"><i></i><i></i><i></i></span><span class="win__file">intro.sh</span></div>
				<div class="term" data-term>
					<?php foreach ( $term_lines as $l ) : ?>
						<p class="term__cmd"><span class="term__ps">$</span> <span data-type><?php echo occ_h( $l['cmd'] ); ?></span></p><p class="term__out" data-type><?php echo occ_h( $l['out'] ); ?></p>
					<?php endforeach; ?>
					<p class="term__cmd"><span class="term__ps">$</span> <span class="term__cursor" aria-hidden="true"></span></p>
				</div>
				<div class="hero__cta">
					<a class="btn btn--sun" href="#projects">View projects</a>
					<a class="btn" href="#contact">Contact</a>
				</div>
			</div>
			<figure class="avatar">
				<div class="sun" aria-hidden="true"></div>
				<img src="<?php echo occ_img( $p, $p['profile'] ); // phpcs:ignore ?>" alt="Portrait of <?php echo occ_a( $p['name']['full'] ); ?>" width="1000" height="1000" fetchpriority="high" style="object-position:<?php echo occ_a( $p['profilePosition'] ); ?>">
				<figcaption><b><?php echo occ_h( $p['name']['nickname'] ); ?></b> / <?php echo occ_h( $p['name']['full'] ); ?></figcaption>
			</figure>
		</section>

		<?php $open( 'about', $t['about'] ); ?>
			<div class="md">
				<?php foreach ( $p['about'] as $i => $para ) : ?><p><span class="md__n" aria-hidden="true"><?php echo esc_html( str_pad( (string) ( $i + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span><?php echo occ_h( $para ); ?></p><?php endforeach; ?>
			</div>
		<?php $close(); ?>

		<?php $open( 'profile', $t['background'] ); ?>
			<div class="profile">
				<pre class="json" aria-label="Profile facts"><span class="ln">{</span><?php foreach ( $p['facts'] as $i => $f ) : ?><span class="ln"><span class="k">"<?php echo occ_h( $f['label'] ); ?>"</span>: <span class="s">"<?php echo occ_h( $f['value'] ); ?>"</span><?php echo $i < count( $p['facts'] ) - 1 ? ',' : ''; ?></span><?php endforeach; ?><span class="ln">}</span></pre>
				<div>
					<p class="cm">// strengths</p>
					<p class="traits-intro"><?php echo occ_h( $p['strengths']['intro'] ); ?></p>
					<ul class="tags"><?php foreach ( $p['strengths']['items'] as $s ) : ?><li>#<?php echo occ_h( strtolower( $s ) ); ?></li><?php endforeach; ?></ul>
				</div>
			</div>
			<div class="why">
				<div><p class="cm">// <?php echo occ_h( strtolower( $p['motivation']['title'] ) ); ?></p><p><?php echo occ_h( $p['motivation']['text'] ); ?></p></div>
				<div><p class="cm">// career goal</p><p><?php echo occ_h( $p['goal'] ); ?></p></div>
			</div>
		<?php $close(); ?>

		<?php $open( 'offduty', $t['hobbies'] ); ?>
			<?php if ( ! empty( $p['hobbiesIntro'] ) ) : ?><p class="lead"><?php echo occ_h( $p['hobbiesIntro'] ); ?></p><?php endif; ?>
			<div class="hob">
				<?php foreach ( $p['hobbies'] as $i => $h ) : ?>
					<article class="hob__item hob__item--<?php echo (int) ( $i % 4 ); ?>">
						<h3><?php echo occ_h( $h['title'] ); ?></h3>
						<?php if ( ! empty( $h['text'] ) ) : ?><p><?php echo occ_h( $h['text'] ); ?></p><?php endif; ?>
						<?php if ( ! empty( $h['tags'] ) ) : ?><ul class="games"><?php foreach ( $h['tags'] as $tag ) : ?><li><?php echo occ_h( $tag ); ?></li><?php endforeach; ?></ul><?php endif; ?>
					</article>
				<?php endforeach; ?>
			</div>
		<?php $close(); ?>

		<?php $open( 'stack', $t['skills'] ); ?>
			<pre class="code" aria-label="Skills"><?php
			$first = true;
			foreach ( $p['skills'] as $grp ) :
				if ( ! $first ) :
					?><span class="ln"></span><?php
				endif;
				$first = false;
				?><span class="ln"><span class="kw">const</span> <span class="v"><?php echo occ_h( occ_snake( $grp['group'] ) ); ?></span> = [</span><?php foreach ( $grp['items'] as $i => $item ) : ?><span class="ln ind"><span class="s">"<?php echo occ_h( $item ); ?>"</span><?php echo $i < count( $grp['items'] ) - 1 ? ',' : ''; ?></span><?php endforeach; ?><span class="ln">];</span><?php
			endforeach;
			?></pre>
		<?php $close(); ?>

		<?php $open( 'history', $t['education'] ); ?>
			<ol class="log">
				<?php foreach ( $p['education'] as $e ) : ?>
					<li><span class="log__t"><?php echo occ_h( ! empty( $e['period'] ) ? $e['period'] : 'earlier' ); ?></span><div><h3><?php echo occ_h( $e['school'] ); ?></h3><p><?php echo occ_h( $e['level'] ); ?></p></div></li>
				<?php endforeach; ?>
			</ol>
		<?php $close(); ?>

		<?php $open( 'projects', $t['projects'] ); ?>
			<div class="proj">
				<?php foreach ( $p['projects'] as $pr ) : ?>
					<article class="proj__item">
						<div>
							<p class="cm">// role: <?php echo occ_h( $pr['role'] ); ?></p>
							<h3><?php echo occ_h( $pr['title'] ); ?></h3>
							<?php if ( ! empty( $pr['description'] ) ) : ?><p><?php echo occ_h( $pr['description'] ); ?></p><?php endif; ?>
						</div>
						<?php if ( ! empty( $pr['photo'] ) ) : ?><button type="button" class="proj__pic" data-lightbox data-caption="<?php echo occ_a( $pr['title'] ); ?>"><img src="<?php echo occ_img( $p, $pr['photo'] ); // phpcs:ignore ?>" alt="<?php echo occ_a( $pr['title'] ); ?>" loading="lazy"></button><?php endif; ?>
					</article>
				<?php endforeach; ?>
			</div>
		<?php $close(); ?>

		<?php $open( 'certs', $t['achievements'] ); ?>
			<ul class="certs">
				<?php foreach ( $p['achievements'] as $a ) : ?>
					<li><span class="ok" aria-hidden="true">✓</span><div><h3><?php echo occ_h( $a['title'] ); ?></h3><?php if ( ! empty( $a['detail'] ) ) : ?><p><?php echo occ_h( $a['detail'] ); ?></p><?php endif; ?></div></li>
				<?php endforeach; ?>
			</ul>
		<?php $close(); ?>

		<?php $open( 'shots', $t['gallery'] ); ?>
			<div class="shots">
				<?php foreach ( $p['gallery'] as $i => $gi ) : ?>
					<button type="button" class="shot shot--<?php echo (int) ( $i % 5 ); ?>" data-lightbox data-caption="<?php echo occ_a( $gi['caption'] ); ?>">
						<img src="<?php echo occ_img( $p, $gi['file'] ); // phpcs:ignore ?>" alt="<?php echo occ_a( $gi['caption'] ); ?>" loading="lazy">
						<span><?php echo occ_h( $gi['file'] ); ?> — <?php echo occ_h( $gi['caption'] ); ?></span>
					</button>
				<?php endforeach; ?>
			</div>
		<?php $close(); ?>

		<?php $open( 'contact', $t['contact'] ); ?>
			<div class="term term--static">
				<p class="term__cmd"><span class="term__ps">$</span> mail --to <?php echo occ_h( strtolower( $p['name']['first'] ) ); ?></p>
				<p class="term__out"><a class="big" href="mailto:<?php echo occ_a( $p['contact']['email'] ); ?>"><?php echo occ_h( $p['contact']['email'] ); ?></a></p>
				<?php foreach ( $p['contact']['links'] as $l ) : ?>
					<p class="term__cmd"><span class="term__ps">$</span> open <?php echo occ_h( strtolower( $l['label'] ) ); ?></p>
					<p class="term__out"><a href="<?php echo esc_url( $l['url'] ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $l['url'] ); ?> ↗</a></p>
				<?php endforeach; ?>
			</div>
		<?php $close(); ?>

		<footer class="foot">
			<p>// <?php echo occ_h( $p['name']['full'] ); ?> · BSIT · Opol Community College</p>
		</footer>
	</main>
</div>
<?php
get_footer();
