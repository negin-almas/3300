<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Thirteen
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title"><?php
					if ( is_day() ) :
						$the_date = (function_exists('mps_the_jdate') && $_GET['m'] < 15000000) ? mps_the_jdate($post->post_date, get_option('date_format')) : get_the_date();
						printf( __( 'Daily Archives: %s', 'twentythirteen' ),  $the_date);
					elseif ( is_month() ) :
						$the_date = (function_exists('mps_the_jdate') && $_GET['m'] < 150000) ? mps_the_jdate($post->post_date, 'F Y') : get_the_date( _x( 'F Y', 'monthly archives date format', 'twentythirteen' ) );
						printf( __( 'Monthly Archives: %s', 'twentythirteen' ), $the_date );
					elseif ( is_year() ) :
						$the_date = (function_exists('mps_the_jdate') && $_GET['m'] < 1500) ? mps_the_jdate($post->post_date, 'Y') : get_the_date( _x( 'Y', 'yearly archives date format', 'twentythirteen' ) );
						printf( __( 'Yearly Archives: %s', 'twentythirteen' ), $the_date );
					else :
						_e( 'Archives', 'twentythirteen' );
					endif;
				?></h1>
			</header><!-- .archive-header -->

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php twentythirteen_paging_nav(); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>