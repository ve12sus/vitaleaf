<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Maisha
 */

get_header(); ?>
	<div class="hfeed site">
	<?php
	
	$args = array(
	'post_type' => 'give_forms',
	'posts_per_page' => get_theme_mod( 'maisha_forms_number' ),
	);

	$form_query = new WP_Query( $args );
	if ( $form_query->have_posts() ) : ?>
		<div class="content site-content">
			<main class="main site-main" role="main">
				<div class="single-themes-page clear news">
					<div class="posts columns clear">
						<?php
						/* Start the Loop */
						while ( $form_query->have_posts() ) : $form_query->the_post();

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'content-grid-give', get_post_format() );

						endwhile;

						else :

						get_template_part( 'content', 'none' );

						endif; ?>

					</div><!-- .posts -->
					<div class="primary content-area sidebar-right-layout">
						<div class="site-main" role="main">
							<?php // Previous/next page navigation.
								the_posts_pagination( array(
								'prev_text'          => esc_html__( 'Previous page', 'maisha' ),
								'next_text'          => esc_html__( 'Next page', 'maisha' ),
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'maisha' ) . ' </span>',
							) ); ?>
						</div><!-- .site-main -->
					</div><!-- #primary -->
				</div>
			</main><!-- .content-area -->
		</div><!-- .site-content -->
	</div><!-- .site -->

<?php get_footer();