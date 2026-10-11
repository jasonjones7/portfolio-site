<?php
/**
 * Template Name: Custom Left Sidebar
 *
 * This template can be used to override the default template and sidebar setup
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="full-width">
<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
<div class="featured-header" style="background: url('<?php echo $thumb['0'];?>'); background-size:cover;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1><?php echo str_replace(' | ', '<br />', get_the_title()); ?></h1>
			</div>
		</div>
	</div>
</div>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<?php get_template_part( 'sidebar-templates/sidebar', 'left' ); ?>

			<div
				class="<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>col-md-8<?php else : ?>col-md-12<?php endif; ?> content-area"
				id="primary">

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

			

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->
</div>

<?php get_footer(); ?>
