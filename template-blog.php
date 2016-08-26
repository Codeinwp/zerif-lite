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
					$zerif_posts_per_page = ( get_option('posts_per_page') ) ? get_option('posts_per_page') : '6';
					$zerif_custom_query_args = array(
						/* Parameters go here */
						'post_type' => 'post',
						'posts_per_page' => $zerif_posts_per_page );

					// Get current page and append to custom query parameters array
					$zerif_custom_query_args['paged'] = ( get_query_var('paged') ? get_query_var('paged') : ( get_query_var('page') ? get_query_var('page') : 1) );
					$paged = $zerif_custom_query_args['paged'];

					// Instantiate custom query
					$zerif_custom_query = new WP_Query( apply_filters( 'zerif_template_blog_parameters', $zerif_custom_query_args ) );

					// Pagination fix
					$zerif_temp_query = $wp_query;
					$wp_query   = NULL;
					$wp_query   = $zerif_custom_query;

					// Output custom query loop
					if ( $zerif_custom_query->have_posts() ) :
						while ( $zerif_custom_query->have_posts() ) :
							$zerif_custom_query->the_post();
							// Loop output goes here
							get_template_part( 'content', get_post_format() );
						endwhile;
					else :
						get_template_part( 'content', 'none' );
					endif;
					// Reset postdata
					wp_reset_postdata();

					// Custom query loop pagination
					zerif_paging_nav($zerif_custom_query->max_num_pages);

					// Reset main query object
					$wp_query = NULL;
					$wp_query = $zerif_temp_query; ?>
				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .content-left-wrap -->

		<?php zerif_sidebar_trigger(); ?>

	</div><!-- .container -->
<?php get_footer(); ?>