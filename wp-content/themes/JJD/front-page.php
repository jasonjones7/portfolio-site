<?php
/**
 * Template Name: Front Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>



<div class="container-fluid intro" style="background:#14110D;">
  <div class="row">
    <div class="col-md-12">
      <div class="">
		  <h1 style="color:white;">Jason Jones</h1>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <h2 style="color:white !important; text-align: center;">Designer & front-end developer
      </h2>
    </div>
  </div>
</div> 


<section class="csx" style="padding-top:124px;">
  <div class="csx__inner">
    <header class="csx__header">
      <div>
        <!-- <p class="csx__eyebrow">Selected Work</p> -->
        <h2 class="csx__title">Featured Work</h2>
      </div>
      <!-- <p class="csx__lede">Hover or focus a panel to open it. Each project below shipped to production — real teams, real numbers.</p> -->
    </header>

    <div class="csx__row" id="csxRow">
      
      <article class="csx__panel is-active" tabindex="0">
        <a class="csx__link" href="/visit-wakulla/" aria-label="View Ledgerline case study"></a>
        <img class="csx__img" src="/wp-content/themes/JJD/img/swamp-thumb.jpg" alt="Person reviewing financial data on a laptop">
        <div class="csx__scrim"></div>
        <div class="csx__label"><div class="csx__label-inner">
          <span class="csx__label-title">Visit Wakulla</span>
          <span class="csx__label-industry">Eco-tourism // Branding & web development</span>
        </div></div>
        <div class="csx__content">
          <span class="csx__content-industry">Eco-tourism // Branding & web development</span>
          <h2 class="csx__content-title">Visit Wakulla</h2>
          <p class="csx__content-blurb">Rebuilt and rebranded one of North Florida's most prominent tourism organizations.</p>
          <span class="csx__cta">View case study <span aria-hidden="true">→</span></span>
        </div>
        <!-- <span class="csx__index">01</span> -->
      </article>

      <article class="csx__panel" tabindex="0">
        <a class="csx__link" href="/veterans-florida/" aria-label="View Ledgerline case study"></a>
        <img class="csx__img" src="/wp-content/themes/JJD/img/rocket-thumb.jpg" alt="Abstract blue and pink three-dimensional cubes">
        <div class="csx__scrim"></div>
        <div class="csx__label"><div class="csx__label-inner">
          <span class="csx__label-title">Veterans Florida</span>
          <span class="csx__label-industry">Non-profit // Web development</span>
        </div></div>
        <div class="csx__content">
          <span class="csx__content-industry">Non-profit // Web development</span>
          <h2 class="csx__content-title">Veterans Florida</h2>
          <p class="csx__content-blurb">Developed the online presence for Florida's largest veteran-focused non-profits.</p>
          <span class="csx__cta">View case study <span aria-hidden="true">→</span></span>
        </div>
        <!-- <span class="csx__index">02</span> -->
      </article>

      <article class="csx__panel" tabindex="0">
        <a class="csx__link" href="/saint-johns-episcopal-church" aria-label="View Ledgerline case study"></a>
        <img class="csx__img" src="/wp-content/themes/JJD/img/church-thumb.jpg" alt="Modern building facade covered in living plants">
        <div class="csx__scrim"></div>
        <div class="csx__label"><div class="csx__label-inner">
          <span class="csx__label-title">St. John's Epsicopal Church</span>
          <span class="csx__label-industry">Religious organization // Web development</span>
        </div></div>
        <div class="csx__content">
          <span class="csx__content-industry">Religious Organization // Web Development</span>
          <h2 class="csx__content-title">St. John's Epsicopal Church</h2>
          <p class="csx__content-blurb">Reimagined the online reputation for Tallahassee's largest espicopal church.</p>
          <span class="csx__cta">View case study <span aria-hidden="true">→</span></span>
        </div>
        <!-- <span class="csx__index">03</span> -->
      </article>

      <article class="csx__panel" tabindex="0">
        <a class="csx__link" href="/stahl-meyer/foods-inc/" aria-label="View Ledgerline case study"></a>
        <img class="csx__img" src="/wp-content/themes/JJD/img/hotdog-thumb.jpg" alt="Editorial fashion portrait in a black fur coat and red dress">
        <div class="csx__scrim"></div>
        <div class="csx__label"><div class="csx__label-inner">
          <span class="csx__label-title">Stahl-Meyer Foods, Inc.</span>
          <span class="csx__label-industry">Food Manufacturing // Web development</span>
        </div></div>
        <div class="csx__content">
          <span class="csx__content-industry">Food Manufacturing // Web development</span>
          <h2 class="csx__content-title">Stahl-Meyer Foods, Inc.</h2>
          <p class="csx__content-blurb">Designed and developed the website for one of the nation's oldest food manufacturers.</p>
          <span class="csx__cta">View case study <span aria-hidden="true">→</span></span>
        </div>
        <!-- <span class="csx__index">04</span> -->
      </article>

    </div>
  </div>
</section>

<script>
  (function () {
    var row = document.getElementById('csxRow');
    if (!row) return;
    var panels = row.querySelectorAll('.csx__panel');
    function activate(el) {
      panels.forEach(function (p) { p.classList.remove('is-active'); });
      el.classList.add('is-active');
    }
    panels.forEach(function (panel) {
      panel.addEventListener('mouseenter', function () { activate(panel); });
      panel.addEventListener('focus', function () { activate(panel); });
    });
  })();
</script>


  <div class="jjd-otherwork__wrap" style="background:#14110D;">
    <div class="jjd-otherwork__inner">
      <header class="jjd-otherwork__head">
        <div>
          
          <h2 class="jjd-otherwork__title">Other Work</h2>
        </div>
        
      </header>

      <div class="jjd-otherwork__grid" id="jjd-otherwork-grid"><!-- cards injected by JS --></div>
    </div>
  </div>

  <script>
    (function () {
      var tiles = [
        { label:"Design & Dev", meta:"Web / Product",
          blurb:"Front-end builds where the design survives contact with the browser.",
          href:"/design-development/",
          image:"https://jasonjones.design/wp-content/uploads/2024/05/alltrails-new.jpg",
          alt:"Laptop displaying a web interface design and development project" },
        { label:"Branding", meta:"Identity / Logos",
          blurb:"Logos, systems, and stationery that give a name its voice.",
          href:"/branding/",
          image:"https://jasonjones.design/wp-content/uploads/2024/04/LHSArtboard-13.jpg",
          alt:"Business cards on a wooden surface showing brand identity work" },
        { label:"Email Design", meta:"Campaigns / Newsletters",
          blurb:"Responsive HTML builds and launch-ready promotional sends.",
          href:"/email-design",
          image:"https://jasonjones.design/wp-content/uploads/2026/02/email-thumbnail.jpg",
          alt:"Concert stage lighting used in an event promotion email design" },
        { label:"Social Media Design", meta:"Content / Templates",
          blurb:"Scroll-stopping post systems and reusable content templates.",
          href:"/social-ads",
          image:"https://jasonjones.design/wp-content/uploads/2024/11/LC-social_nov-dec-01.jpg",
          alt:"Camera, laptop, phone and coffee arranged for social media content" }
      ];

      var esc = function (s) {
        return String(s).replace(/[&<>"']/g, function (c) {
          return { "&":"&amp;", "<":"&lt;", ">":"&gt;", '"':"&quot;", "'":"&#39;" }[c];
        });
      };

      var grid = document.getElementById("jjd-otherwork-grid");
      if (!grid) return;

      grid.innerHTML = tiles.map(function (t) {
        return '' +
          '<a class="jjd-otherwork__card" href="' + esc(t.href) + '">' +
            '<div class="jjd-otherwork__media">' +
              '<img class="jjd-otherwork__img" loading="lazy" src="' + esc(t.image) + '" alt="' + esc(t.alt) + '">' +
              '<div class="jjd-otherwork__scrim"></div>' +
              
            '</div>' +
            '<div class="jjd-otherwork__body">' +
              '<span class=".csx__content-industry">' + esc(t.meta) + '</span>' +
              '<h3 class="jjd-otherwork__label">' + esc(t.label) + '</h3>' +
              '<p class="jjd-otherwork__blurb">' + esc(t.blurb) + '</p>' +
              '<span class="jjd-otherwork__view">VIEW <span class="jjd-otherwork__arrow">&rarr;</span></span>' +
            '</div>' +
          '</a>';
      }).join("");
    })();
  </script>
</section>
<!-- ============================================================
     END "OTHER WORK"
     • Swap each tile's href:"#" for the real page (e.g. "/branding/").
     • Replace the Unsplash image URLs with your own uploads.
     ============================================================ -->



<!-- <div class="container-fluid" style="background:#14110d;">
	<div class="row">
 <?php /* Start the Loop */ ?>
<?php while(have_posts()) : the_post(); ?>
<?php the_content();?>
<?php endwhile; ?>
</div>
</div> -->




<section class="panel four">
<div class="m-scroll">
  <div class="m-scroll__title">
    <div class="clip-text">
      <h2>
        <a href="mailto:hello@jasonjones.design">HELLO@JASONJONES.DESIGN</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mailto:hello@jasonjones.design">HELLO@JASONJONES.DESIGN</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mailto:hello@jasonjones.design">HELLO@JASONJONES.DESIGN</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </h2>
     <h2>
        <a href="mailto:hello@jasonjones.design">HELLO@JASONJONES.DESIGN</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mailto:hello@jasonjones.design">HELLO@JASONJONES.DESIGN</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mailto:hello@jasonjones.design">HELLO@JASONJONES.DESIGN</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </h2>
    </div>
  </div>
</div>
</section>

<div id="contact"></div>

<?php get_footer(); ?>