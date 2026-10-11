<?php
/**
 * Template Name: Front Page Claude */

get_header();

$asset_base = get_stylesheet_directory_uri() . '/assets/portfolio';

// Case studies — edit names / tags / links / thumbs here.
$studies = array(
  array( 'num' => '01', 'name' => 'Visit Wakulla', 'tag' => 'Tourism',       'thumb' => $asset_base . '/thumbs/01.jpg', 'href' => '/visit-wakulla' ),
  array( 'num' => '02', 'name' => 'Veterans Florida', 'tag' => 'Non-profit',    'thumb' => $asset_base . '/thumbs/02.png', 'href' => '/veterans-florida' ),
  array( 'num' => '03', 'name' => "St. John's Episcopal", 'tag' => 'Religious org', 'thumb' => $asset_base . '/thumbs/03.jpg', 'href' => '/saint-johns-episcopal-church' ),
  array( 'num' => '04', 'name' => 'Stahl-Meyer Foods, Inc.',     'tag' => 'Manufacturing', 'thumb' => $asset_base . '/thumbs/04.jpg', 'href' => '/stahl-meyer-foods-inc' ),
);

// Other work — edit names / tags / links / thumbs here.
$work = array(
  array( 'num' => '05', 'name' => 'Design & Development',          'thumb' => $asset_base . '/thumbs/05.jpg', 'href' => '/design-development' ),
  array( 'num' => '06', 'name' => 'Brand Identity',       'thumb' => $asset_base . '/thumbs/06.jpg', 'href' => '/branding' ),
  array( 'num' => '07', 'name' => "Social Media",   'thumb' => $asset_base . '/thumbs/07.jpg', 'href' => '/social-ads' ),
  array( 'num' => '08', 'name' => 'Email Design',      'thumb' => $asset_base . '/thumbs/08.jpg', 'href' => '/email-design' ),
);
?>

<main class="jj-portfolio">
  <div class="jj-hero">
    <div class="jj-marquee-col">
      <h1 class="jj-name">Jason Jones</h1>
      <p class="jj-role">Designer &amp; Front-End Developer</p>
      <div class="jj-mrow"><div class="jj-mtrack jj-m3"><span>BRANDING · DESIGN · DEVELOPMENT · EMAIL · SOCIAL · UX / UI · BRANDING · DESIGN · DEVELOPMENT · EMAIL · SOCIAL ·  UX / UI · </span></div></div>
    </div>
    <!-- <div class="jj-photo">
      <canvas id="jj-cnv-swell" data-photo="<?php echo esc_attr( $asset_base . '/meeee-1536x1536.jpg' ); ?>"></canvas>
    </div> -->
    <div class="jj-photo"><img src="/wp-content/themes/JJD/assets/portfolio/meee.jpg"></div>
  </div>

  <section id="work">
    <div class="jj-index-label">INDEX / SELECTED CASE STUDIES</div>
    <?php foreach ( $studies as $s ) : ?>
      <a class="jj-row" href="<?php echo esc_url( $s['href'] ); ?>" data-study-row data-thumb="<?php echo esc_attr( $s['thumb'] ); ?>">
        <span class="jj-num"><?php echo esc_html( $s['num'] ); ?></span>
        <span class="jj-name-cell"><?php echo esc_html( $s['name'] ); ?></span>
        <span class="jj-tag"><?php echo esc_html( $s['tag'] ); ?></span>
        <span class="jj-arrow">&#8599;</span>
      </a>
    <?php endforeach; ?>
  </section>

  <section id="work">
    <div class="jj-index-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/ OTHER WORK</div>
    <?php foreach ( $work as $s ) : ?>
      <a class="jj-row" href="<?php echo esc_url( $s['href'] ); ?>" data-study-row data-thumb="<?php echo esc_attr( $s['thumb'] ); ?>">
        <span class="jj-num"><?php echo esc_html( $s['num'] ); ?></span>
        <span class="jj-name-cell"><?php echo esc_html( $s['name'] ); ?></span>
        <span class="jj-tag"><?php echo esc_html( $s['tag'] ); ?></span>
        <span class="jj-arrow">&#8599;</span>
      </a>
    <?php endforeach; ?>
  </section>
</main>

<!--<section class="panel four">-->
<!--<div class="m-scroll">-->
<!--  <div class="m-scroll__title">-->
<!--    <div class="clip-text">-->
<!--      <h2>-->
<!--        <a href="mailto:hello@jasonjones.design">HELLO@JASONJONES.DESIGN</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mailto:hello@jasonjones.design">HELLO@JASONJONES.DESIGN</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mailto:hello@jasonjones.design">HELLO@JASONJONES.DESIGN</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
<!--      </h2>-->
<!--     <h2>-->
<!--        <a href="mailto:hello@jasonjones.design">HELLO@JASONJONES.DESIGN</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mailto:hello@jasonjones.design">HELLO@JASONJONES.DESIGN</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mailto:hello@jasonjones.design">HELLO@JASONJONES.DESIGN</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
<!--      </h2>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->
<!--</section>-->

<div id="contact"></div>


<script>
(function () {
  var thumb = document.createElement('img');
  thumb.id = 'jj-cursor-thumb'; thumb.alt = '';
  document.body.appendChild(thumb);
  thumb.addEventListener('error', function () { thumb.style.opacity = '0'; });
  var rows = document.querySelectorAll('[data-study-row]');
  for (var i = 0; i < rows.length; i++) {
    (function (row) {
      row.addEventListener('pointerenter', function () {
        var src = row.getAttribute('data-thumb');
        if (src) thumb.src = src;
        thumb.style.opacity = '1'; thumb.style.transform = 'translate(-50%,-50%) scale(1)';
      });
      row.addEventListener('pointerleave', function () {
        thumb.style.opacity = '0'; thumb.style.transform = 'translate(-50%,-50%) scale(0.96)';
      });
    })(rows[i]);
  }
})();
</script>


<?php get_footer(); ?>
