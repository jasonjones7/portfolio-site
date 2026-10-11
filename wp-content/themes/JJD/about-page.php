<div id="home">
<?php
/**
 * Template Name: About Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="container-fluid" id="about" style="background:white; color:white; position: relative; z-index: 1000; margin-top:0 !important;">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				
			
				<p style="margin-top:15px;">
					<span id="title"><span class="ital">Hi, </span>I'm Jason
				</p>

				 <p>I'm a product designer and front-end developer with an extensive background spanning eight years within the advertising and marketing sector. I've worked with clients ranging from government organizations to prominent national food brands.</p>

         <p style="margin-top:25px;">When I'm not pushing pixels, you can find me outdoors camping, kayaking, and spending time with my partner and pets.</p>

         <p style="margin-top:25px;">Currently a Senior Web Designer at <span class="link link-gold"><a href="https://bowstern.com" target="_blank">Bowstern Marketing and Communications.</a></span></p>
			</div>

			<div class="col-md-6">
				<img src="https://jasonjones.design/wp-content/uploads/2024/05/meeee.jpg" style="border-radius:500px;">
			</div>
		</div>
	
		

		<div class="row skills">
			<div class="col-md-6">
				<h4>
					SKILLS & TECH
				</h4>
				<p style="text-align:left; padding-left:25px;">
					Figma, Adobe Creative Suite, HTML5, CSS3, JS, WordPress
				</p>
                
                <ul id="skills-list">
                <li>UX/UI design</li>
                <li>Front-end development</li>
                <li>Logo & brand development</li>
                <li>Digital design</li>
                <li>Email marketing</li>
                <li>Windows and MacOS unicorn</li>
                </ul>
			</div>
			<div class="col-md-5 offset-md-1">
				<h4>
					AWARDS & CERTS
				</h4>
				<p>
					<ul id="awards-list">
					<li>Multiple American Advertising Awards</li>
					<li class="link link-gold"><a href="https://www.credly.com/badges/17b6562a-e405-43a2-abbb-59dfbecaa72b/public_url" target="_blank">Google UX Certificate</a></li>
					<li>HubSpot SEO Certificate</li>
					<li class="link link-gold"><a href="https://jasonjones.design/wp-content/uploads/2024/04/doty.jpeg">Designer of the Year</a></li>
				  </ul>
				</p>
			</div>
		</div>
	</div>
</div>



<?php get_footer(); ?>
