<?php
/**
 * Template Name: Blog
 */
get_header();
global $wp_query;
global $paged; ?>
<div class="clear"></div>

</header> <!-- / END HOME SECTION  -->
<?php zerif_after_header_trigger(); ?>
<div id="content" class="site-content">

	<div class="container">

		<div class="content-left-wrap col-md-9">

			<div id="primary" class="content-area">

				<main id="main" class="site-main" itemscope itemtype="http://schema.org/Blog">
					<?php
					// Define custom query parameters
					$custom_query_args = array(
						/* Parameters go here */
						'post_type' => 'post',
						'posts_per_page' => 6 );

					// Get current page and append to custom query parameters array
					$custom_query_args['paged'] = ( get_query_var('paged') ? get_query_var('paged') : ( get_query_var('page') ? get_query_var('page') : 1) );
					$paged = $custom_query_args['paged'];

					// Instantiate custom query
					$custom_query = new WP_Query( apply_filters( 'zerif_template_blog_parameters', $custom_query_args ) );

					// Pagination fix
					$temp_query = $wp_query;
					$wp_query   = NULL;
					$wp_query   = $custom_query;

					// Output custom query loop
					if ( $custom_query->have_posts() ) :
						while ( $custom_query->have_posts() ) :
							$custom_query->the_post();
							// Loop output goes here
							get_template_part( 'content', get_post_format() );
						endwhile;
					else :
						get_template_part( 'content', 'none' );
					endif;
					// Reset postdata
					wp_reset_postdata();

					// Custom query loop pagination
					zerif_paging_nav($custom_query->max_num_pages);

					// Reset main query object
					$wp_query = NULL;
					$wp_query = $temp_query; ?>
				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .content-left-wrap -->

		<?php zerif_sidebar_trigger(); ?>

	</div><!-- .container -->
<?php get_footer(); ?>