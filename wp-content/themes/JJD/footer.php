<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );
?>


<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>





<div id="wrapper-footer">
<div class="footer">
<div class="top">
	<div class="<?php echo esc_attr( $container ); ?>">
		<div class="row">
			<div class="col-md-10 offset-md-1">
				<div class="social">
			    <ul id="horizontal-list">
			      	<li class="link link-gold"><a href="https://dribbble.com/lazybonez" target="_blank">Dribbble</a></li>
      				<li class="link link-gold"><a href="http://instagram.com/jasonjonesdesign/" class="link link-gold" target="_blank">Instagram</a></li>
      				<li class="link link-gold"><a href="https://www.linkedin.com/in/jasonjones91/" class="link link-gold" target="_blank">LinkedIn</a></li>
			    </ul>
				</div>
			</div>
		</div>
	</div><!-- container end -->
</div>

<div class="credits">
		<p style="margin-top:25px;">
			<?php 
				// PHP program to get the
				// current year
				  
				echo "© "; 
				  
				// Store the year to
				// the variable
				$year = date("Y"); 
				  
				// Display the year
				echo $year; 
				  
				?>&nbsp;
			Jason Jones Design
		</p>
</div>
</div>
</div><!-- wrapper end -->


</div><!-- #page we need this extra closing tag here -->
</div>

<?php wp_footer(); ?>

<!-- Animate on Scroll -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

  	
<script>
	AOS.init({
		once: true,

   });

</script>

<script>
	var circle = document.getElementByClass('circle');

function fadeOutOnScroll(element) {
	if (!element) {
		return;
	}
	
	var distanceToTop = window.pageYOffset + element.getBoundingClientRect().top;
	var elementHeight = element.offsetHeight;
	var scrollTop = document.documentElement.scrollTop;
	
	var opacity = 1;
	
	if (scrollTop > distanceToTop) {
		opacity = 1 - (scrollTop - distanceToTop) / elementHeight;
	}
	
	if (opacity >= 0) {
		element.style.opacity = opacity;
	}
}

function scrollHandler() {
	fadeOutOnScroll(header);
}

window.addEventListener('scroll', scrollHandler);
</script>










</body>

</html>