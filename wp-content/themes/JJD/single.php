<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>


<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
          
  <div class="header-wrap" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat; background-size: cover;">
     <header class="entry-header">
    <h1 class="entry-title"><?php the_title(); ?></h1>

    <?php foreach((get_the_category()) as $category) 
{
    echo $category->cat_name . ' '; 
}

?>
     </header>
  </div>



<div class="wrapper" id="single-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<div class="col-lg-12">
				<main class="site-main" id="main">
					<div class="card-blog">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop-templates/content', 'single' ); ?>

					<?php understrap_post_nav(); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // end of the loop. ?>

					</div>
				</main><!-- #main -->
			</div>
		

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->

<?php get_footer(); ?>
