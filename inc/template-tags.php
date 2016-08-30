<?php
/**
 * Custom template tags for this theme.
 * Eventually, some of the functionality here could be replaced by core features.
 */

if ( ! function_exists( 'zerif_paging_nav' ) ) :

/**
 * Display navigation to next/previous set of posts when applicable.
 */

function zerif_paging_nav($max_num_pages = 0) {

	echo '<div class="clear"></div>';

	?>

	<nav class="navigation paging-navigation">

		<h2 class="screen-reader-text"><?php _e( 'Posts navigation', 'zerif-lite' ); ?></h2>

		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>

			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'zerif-lite' ), $max_num_pages ); ?></div>

			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>

			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'zerif-lite' ) ); ?></div>

			<?php endif; ?>

		</div><!-- .nav-links -->

	</nav><!-- .navigation -->

	<?php

}

endif;

if ( ! function_exists( 'zerif_post_nav' ) ) :

/**
* Display navigation to next/previous post when applicable.
*/

function zerif_post_nav() {

	// Don't print empty markup if there's nowhere to navigate.

	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );

	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {

		return;

	}

	?>

	<nav class="navigation post-navigation">

		<h2 class="screen-reader-text"><?php _e( 'Post navigation', 'zerif-lite' ); ?></h2>

		<div class="nav-links">

			<?php

				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'zerif-lite' ) );

				next_post_link(     '<div class="nav-next">%link</div>',     _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link',     'zerif-lite' ) );

			?>

		</div><!-- .nav-links -->

	</nav><!-- .navigation -->

	<?php

}

endif;

if ( ! function_exists( 'zerif_posted_on' ) ) :

/**

 * Prints HTML with meta information for the current post-date/time and author.

 */

function zerif_posted_on() {

	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';

	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {

		$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';

	}

	$time_string = sprintf( $time_string,

		esc_attr( get_the_date( 'c' ) ),

		esc_html( get_the_date() ),

		esc_attr( get_the_modified_date( 'c' ) ),

		esc_html( get_the_modified_date() )

	);

	printf( __( '<span class="posted-on">Posted on %1$s</span><span class="byline"> by %2$s</span>', 'zerif-lite' ),

		sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>',

			esc_url( get_permalink() ),

			$time_string

		),

		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',

			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),

			esc_html( get_the_author() )

		)

	);

}

endif;

/**

 * Returns true if a blog has more than 1 category.

 *

 * @return bool

 */

function zerif_categorized_blog() {

	if ( false === ( $all_the_cool_cats = get_transient( 'zerif_categories' ) ) ) {

		// Create an array of all the categories that are attached to posts.

		$all_the_cool_cats = get_categories( array(

			'fields'     => 'ids',

			'hide_empty' => 1,



			// We only need to know if there is more than one category.

			'number'     => 2,

		) );



		// Count the number of categories that are attached to the posts.

		$all_the_cool_cats = count( $all_the_cool_cats );



		set_transient( 'zerif_categories', $all_the_cool_cats );

	}



	if ( $all_the_cool_cats > 1 ) {

		// This blog has more than 1 category so zerif_categorized_blog should return true.

		return true;

	} else {

		// This blog has only 1 category so zerif_categorized_blog should return false.

		return false;

	}

}

/**
 * Flush out the transients used in zerif_categorized_blog.
 */

function zerif_category_transient_flusher() {

	delete_transient( 'zerif_categories' );

}

add_action( 'edit_category', 'zerif_category_transient_flusher' );

add_action( 'save_post',     'zerif_category_transient_flusher' );

/********************************/
/*********** HOOKS **************/
/********************************/

function zerif_404_title_function() {

	?><h1 class="entry-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'zerif-lite' ); ?></h1><?php

}

function zerif_404_content_function() {

	?><p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'zerif-lite' ); ?></p><?php

}

function zerif_page_header_function() {

	?><h1 class="entry-title" itemprop="headline"><?php the_title(); ?></h1><?php

}

function zerif_page_header_title_archive_function() {

	the_archive_title( '<h1 class="page-title">', '</h1>' );

}

function zerif_page_term_description_archive_function() {

	the_archive_description( '<div class="taxonomy-description">', '</div>' );
}

function zerif_footer_widgets_function() {
	if(is_active_sidebar( 'zerif-sidebar-footer' ) || is_active_sidebar( 'zerif-sidebar-footer-2' ) || is_active_sidebar( 'zerif-sidebar-footer-3' )):
		echo '<div class="footer-widget-wrap"><div class="container">';
		if(is_active_sidebar( 'zerif-sidebar-footer' )):
			echo '<div class="footer-widget col-xs-12 col-sm-4">';
			dynamic_sidebar( 'zerif-sidebar-footer' );
			echo '</div>';
		endif;
		if(is_active_sidebar( 'zerif-sidebar-footer-2' )):
			echo '<div class="footer-widget col-xs-12 col-sm-4">';
			dynamic_sidebar( 'zerif-sidebar-footer-2' );
			echo '</div>';
		endif;
		if(is_active_sidebar( 'zerif-sidebar-footer-3' )):
			echo '<div class="footer-widget col-xs-12 col-sm-4">';
			dynamic_sidebar( 'zerif-sidebar-footer-3' );
			echo '</div>';
		endif;
		echo '</div></div>';
	endif;
}

function zerif_our_focus_header_title_function() {

	$zerif_ourfocus_title = get_theme_mod('zerif_ourfocus_title',__('FEATURES','zerif-lite'));

	if( !empty($zerif_ourfocus_title) ):
		echo '<h2 class="dark-text">'.wp_kses_post( $zerif_ourfocus_title ).'</h2>';
	elseif ( is_customize_preview() ):
		echo '<h2 class="dark-text zerif_hidden_if_not_customizer"></h2>';
	endif;
}

function zerif_our_focus_header_subtitle_function() {

	$zerif_ourfocus_subtitle = get_theme_mod('zerif_ourfocus_subtitle',__('What makes this single-page WordPress theme unique.','zerif-lite'));

	if( !empty($zerif_ourfocus_subtitle) ):
		echo '<div class="section-legend">'.wp_kses_post( $zerif_ourfocus_subtitle ).'</div>';
	elseif ( is_customize_preview() ):
		echo '<div class="section-legend zerif_hidden_if_not_customizer"></div>';
	endif;
}

function zerif_our_team_header_title_function() {

	$zerif_ourteam_title = get_theme_mod('zerif_ourteam_title',__('YOUR TEAM','zerif-lite'));

	if( !empty($zerif_ourteam_title) ):
		echo '<h2 class="dark-text">'.wp_kses_post( $zerif_ourteam_title ).'</h2>';
	elseif ( is_customize_preview() ):
		echo '<h2 class="dark-text zerif_hidden_if_not_customizer"></h2>';
	endif;
}

function zerif_our_team_header_subtitle_function() {

	$zerif_ourteam_subtitle = get_theme_mod('zerif_ourteam_subtitle',__('Prove that you have real people working for you, with some nice looking profile pictures and links to social media.','zerif-lite'));

	if( !empty($zerif_ourteam_subtitle) ):

		echo '<div class="section-legend">'.wp_kses_post( $zerif_ourteam_subtitle ).'</div>';

	elseif ( is_customize_preview() ):

		echo '<div class="section-legend zerif_hidden_if_not_customizer"></div>';

	endif;
}

function zerif_testimonials_header_title_function() {

	$zerif_testimonials_title = get_theme_mod('zerif_testimonials_title',__('Testimonials','zerif-lite'));

	if( !empty($zerif_testimonials_title) ):

		echo '<h2 class="white-text">'.wp_kses_post( $zerif_testimonials_title ).'</h2>';

	elseif ( is_customize_preview() ):

		echo '<h2 class="white-text zerif_hidden_if_not_customizer"></h2>';

	endif;
}

function zerif_testimonials_header_subtitle_function() {

	$zerif_testimonials_subtitle = get_theme_mod('zerif_testimonials_subtitle');

	if( !empty($zerif_testimonials_subtitle) ):

		echo '<h6 class="white-text section-legend">'.wp_kses_post( $zerif_testimonials_subtitle ).'</h6>';

	elseif ( is_customize_preview() ):

		echo '<h6 class="white-text section-legend zerif_hidden_if_not_customizer"></h6>';

	endif;
}

function zerif_latest_news_header_title_function() {

	$zerif_latestnews_title = get_theme_mod('zerif_latestnews_title');

	if( !empty($zerif_latestnews_title) ):

		echo '<h2 class="dark-text">' . wp_kses_post( $zerif_latestnews_title ) . '</h2>';

	else:

		echo '<h2 class="dark-text">' . __('Latest news','zerif-lite') . '</h2>';

	endif;
}

function zerif_latest_news_header_subtitle_function() {

	$zerif_latestnews_subtitle = get_theme_mod('zerif_latestnews_subtitle');

	if( !empty($zerif_latestnews_subtitle) ):

		echo '<div class="dark-text section-legend">'.wp_kses_post( $zerif_latestnews_subtitle ).'</div>';

	elseif ( is_customize_preview() ):

		echo '<div class="dark-text section-legend zerif_hidden_if_not_customizer"></div>';

	endif;
}

function zerif_big_title_text_function() {

	$zerif_bigtitle_title = get_theme_mod('zerif_bigtitle_title',__('ONE OF THE TOP 10 MOST POPULAR THEMES ON WORDPRESS.ORG','zerif-lite'));

	if( !empty($zerif_bigtitle_title) ):

		echo '<h1 class="intro-text">'.wp_kses_post( $zerif_bigtitle_title ).'</h1>';

	elseif ( is_customize_preview() ):

		echo '<h1 class="intro-text zerif_hidden_if_not_customizer"></h1>';

	endif;
}

function zerif_about_us_header_title_function() {
	$zerif_aboutus_title = get_theme_mod('zerif_aboutus_title',__('About','zerif-lite'));

	if( !empty($zerif_aboutus_title) ):
		echo '<h2 class="white-text">'. wp_kses_post( $zerif_aboutus_title ) .'</h2>';
	elseif ( is_customize_preview() ):
		echo '<h2 class="white-text zerif_hidden_if_not_customizer"></h2>';
	endif;
}

function zerif_about_us_header_subtitle_function() {
	$zerif_aboutus_subtitle = get_theme_mod('zerif_aboutus_subtitle',__('Use this section to showcase important details about your business.','zerif-lite'));

	if( !empty($zerif_aboutus_subtitle) ):

		echo '<div class="white-text section-legend">';

		echo wp_kses_post( $zerif_aboutus_subtitle );

		echo '</div>';

	elseif ( is_customize_preview() ):

		echo '<div class="white-text section-legend zerif_hidden_if_not_customizer">'.wp_kses_post( $zerif_aboutus_subtitle ).'</div>';

	endif;
}

function zerif_sidebar_function() {
	?>
	<div class="sidebar-wrap col-md-3 content-left-wrap">
		<?php get_sidebar(); ?>
	</div><!-- .sidebar-wrap -->
	<?php
}

function zerif_primary_navigation_function() {
	?>
	<nav class="navbar-collapse bs-navbar-collapse collapse" id="site-navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
		<a class="screen-reader-text skip-link" href="#content"><?php _e( 'Skip to content', 'zerif-lite' ); ?></a>
		<?php wp_nav_menu( array('theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav navbar-right responsive-nav main-nav-list', 'fallback_cb' => 'zerif_wp_page_menu')); ?>
	</nav>
	<?php
}