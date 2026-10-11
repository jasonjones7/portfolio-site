<?php
/**
 * Template Name: JJD Full Width
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

<div class="full-width">
<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
<!-- <div class="featured-header" style="background-image: url('<?php echo $thumb['0'];?>')">
	<div class="container">
		<div class="row">
			<div class="col-md-12" role="complementary" aria-labelledby="pagetitle">
				<h1 id="pagetitle"><?php echo str_replace(' | ', '<br />', get_the_title()); ?></h1>
				
			</div>
		</div>
	</div>
</div> -->

	<div class="<?php echo esc_attr( $container ); ?> section" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'loop-templates/content', 'page' ); ?>

						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :

							comments_template();

						endif;
						?>

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div>

<?php get_footer(); ?>
