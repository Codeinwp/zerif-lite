<?php

get_header();

    if( ! zerif_check_if_old_version_of_theme() ) {

    $blog_header_title = get_theme_mod( 'zerif_blog_header_title', esc_html__( 'Blog', 'zerif-lite' ) );
    $blog_header_subtitle = get_theme_mod( 'zerif_blog_header_subtitle', esc_html__( 'Zerif supports a custom frontpage', 'zerif-lite' ) );

    if ( ! empty( $blog_header_title ) || ! empty( $blog_header_subtitle ) ) { ?>
    <div class="blog-header-wrap">
        <div class="blog-header-content-wrap">
			<?php if ( ! empty( $blog_header_title ) ) { ?>
                <h1 class="intro-text"><?php echo esc_html( $blog_header_title ); ?></h1>
			<?php }
			if ( ! empty( $blog_header_subtitle ) ) { ?>
                <p class="blog-header-subtitle"><?php echo esc_html( $blog_header_subtitle ); ?></p>
			<?php } ?>
        </div>
    </div>
<?php }
}
?>
<div class="clear"></div>

</header> <!-- / END HOME SECTION  -->
<?php zerif_after_header_trigger(); ?>
<div id="content" class="site-content">

	<div class="container">

		<div class="content-left-wrap col-md-9">

			<div id="primary" class="content-area">

				<main id="main" class="site-main">

				<?php
					if ( have_posts() ) :
				
						while ( have_posts() ) : the_post();

							/* Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */

							get_template_part( 'content', get_post_format() );

						endwhile;

						echo get_the_posts_navigation( array( 'next_text' => sprintf( __( 'Newer posts %s','zerif-lite' ), '<span class="meta-nav">&rarr;</span>' ), 'prev_text' => sprintf( __( '%s Older posts', 'zerif-lite' ) , '<span class="meta-nav">&larr;</span>' ) ) );

					else :
					
						get_template_part( 'content', 'none' );
						
					endif; ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .content-left-wrap -->

		<?php zerif_sidebar_trigger(); ?>

	</div><!-- .container -->

<?php get_footer(); ?>