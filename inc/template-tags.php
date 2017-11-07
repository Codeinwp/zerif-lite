<?php
/**
 * Custom template tags for this theme.
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package zerif-lite
 */

if ( ! function_exists( 'zerif_post_nav' ) ) :

	/**
	 * Display navigation to next/previous post when applicable.
	 */
	function zerif_post_nav() {

		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );

		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {

			return;

		}

		?>

		<nav class="navigation post-navigation">

		<h2 class="screen-reader-text"><?php _e( 'Post navigation', 'zerif-lite' ); ?></h2>

		<div class="nav-links">

			<?php

				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'zerif-lite' ) );

				next_post_link( '<div class="nav-next">%link</div>', _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'zerif-lite' ) );

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

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

			printf(
				/* translators: 1 - Publish date, 2 - Author */
				__( '<span class="posted-on">Posted on %1$s</span><span class="byline"> by %2$s</span>', 'zerif-lite' ),
				sprintf(
					'<a href="%1$s" rel="bookmark">%2$s</a>',
					esc_url( get_permalink() ),
					$time_string
				),
				sprintf(
					'<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
					esc_html( get_the_author() )
				)
			);

	}

endif;

if ( ! function_exists( 'zerif_categorized_blog' ) ) :
	/**

	 * Returns true if a blog has more than 1 category.
	 *
	 * @return bool
	 */
	function zerif_categorized_blog() {

		if ( false === ( $all_the_cool_cats = get_transient( 'zerif_categories' ) ) ) {

			// Create an array of all the categories that are attached to posts.
			$all_the_cool_cats = get_categories(
				array(

					'fields'     => 'ids',

					'hide_empty' => 1,

					// We only need to know if there is more than one category.
					'number'     => 2,

				)
			);

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
endif;

if ( ! function_exists( 'zerif_category_transient_flusher' ) ) :
	/**
	 * Flush out the transients used in zerif_categorized_blog.
	 */
	function zerif_category_transient_flusher() {

		delete_transient( 'zerif_categories' );

	}
endif;

add_action( 'edit_category', 'zerif_category_transient_flusher' );

add_action( 'save_post', 'zerif_category_transient_flusher' );

if ( ! function_exists( 'zerif_404_title_function' ) ) :
	/**
	 * Add title on 404 pages
	 */
	function zerif_404_title_function() {

		echo '<h1 class="entry-title">' . __( 'Oops! That page can&rsquo;t be found.', 'zerif-lite' ) . '</h1>';

	}
endif;

if ( ! function_exists( 'zerif_404_content_function' ) ) :
	/**
	 * Add content on 4040 pages
	 */
	function zerif_404_content_function() {

		echo '<p>' . __( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'zerif-lite' ) . '</p>';

	}
endif;

if ( ! function_exists( 'zerif_page_header_function' ) ) :
	/**
	 * Add header title on pages
	 */
	function zerif_page_header_function() {

		?>
		<h1 class="entry-title" itemprop="headline"><?php the_title(); ?></h1>
		<?php

	}
endif;

if ( ! function_exists( 'zerif_page_header_title_archive_function' ) ) :
	/**
	 * Add archive title
	 */
	function zerif_page_header_title_archive_function() {

		the_archive_title( '<h1 class="page-title">', '</h1>' );

	}
endif;

if ( ! function_exists( 'zerif_page_term_description_archive_function' ) ) :
	/**
	 * Add archive description
	 */
	function zerif_page_term_description_archive_function() {

		the_archive_description( '<div class="taxonomy-description">', '</div>' );
	}
endif;

if ( ! function_exists( 'zerif_footer_widgets_function' ) ) :
	/**
	 * Footer widgets areas
	 */
	function zerif_footer_widgets_function() {
		if ( is_active_sidebar( 'zerif-sidebar-footer' ) || is_active_sidebar( 'zerif-sidebar-footer-2' ) || is_active_sidebar( 'zerif-sidebar-footer-3' ) ) :
			echo '<div class="footer-widget-wrap"><div class="container">';
			if ( is_active_sidebar( 'zerif-sidebar-footer' ) ) :
				echo '<div class="footer-widget col-xs-12 col-sm-4">';
				dynamic_sidebar( 'zerif-sidebar-footer' );
				echo '</div>';
			endif;
			if ( is_active_sidebar( 'zerif-sidebar-footer-2' ) ) :
				echo '<div class="footer-widget col-xs-12 col-sm-4">';
				dynamic_sidebar( 'zerif-sidebar-footer-2' );
				echo '</div>';
			endif;
			if ( is_active_sidebar( 'zerif-sidebar-footer-3' ) ) :
				echo '<div class="footer-widget col-xs-12 col-sm-4">';
				dynamic_sidebar( 'zerif-sidebar-footer-3' );
				echo '</div>';
			endif;
			echo '</div></div>';
		endif;
	}
endif;

if ( ! function_exists( 'zerif_our_focus_header_title_function' ) ) :
	/**
	 * Title in the header area of the Our Focus section
	 */
	function zerif_our_focus_header_title_function() {

		$zerif_ourfocus_title_default = get_theme_mod( 'zerif_ourfocus_title' );

		if ( ! empty( $zerif_ourfocus_title_default ) ) {

			$zerif_ourfocus_title = get_theme_mod( 'zerif_ourfocus_title_2', $zerif_ourfocus_title_default );

		} elseif ( current_user_can( 'edit_theme_options' ) ) {

			$zerif_ourfocus_title = get_theme_mod( 'zerif_ourfocus_title_2', sprintf( '<a href="%1$s" class="zerif-default-links">%2$s</a>', esc_url( admin_url( 'customize.php?autofocus&#91;control&#93;=zerif_ourfocus_title' ) ), __( 'FEATURES', 'zerif-lite' ) ) );

		} else {
			$zerif_ourfocus_title = get_theme_mod( 'zerif_ourfocus_title_2' );
		}

		if ( ! empty( $zerif_ourfocus_title ) ) :
			echo '<h2 class="dark-text">' . wp_kses_post( $zerif_ourfocus_title ) . '</h2>';
		elseif ( is_customize_preview() ) :
			echo '<h2 class="dark-text zerif_hidden_if_not_customizer"></h2>';
		endif;
	}
endif;

if ( ! function_exists( 'zerif_our_focus_header_subtitle_function' ) ) :
	/**
	 * Subtitle in the header area of the Our Focus section
	 */
	function zerif_our_focus_header_subtitle_function() {

		if ( current_user_can( 'edit_theme_options' ) ) {
			/* translators: Our focus section in customizer */
			$zerif_ourfocus_subtitle = get_theme_mod( 'zerif_ourfocus_subtitle', sprintf( __( 'Change this subtitle in %s', 'zerif-lite' ), sprintf( '<a href="%1$s" class="zerif-default-links">%2$s</a>', esc_url( admin_url( 'customize.php?autofocus&#91;control&#93;=zerif_ourfocus_subtitle' ) ), __( 'Our focus section', 'zerif-lite' ) ) ) );
		} else {
			$zerif_ourfocus_subtitle = get_theme_mod( 'zerif_ourfocus_subtitle' );
		}

		if ( ! empty( $zerif_ourfocus_subtitle ) ) :
			echo '<div class="section-legend">' . wp_kses_post( $zerif_ourfocus_subtitle ) . '</div>';
		elseif ( is_customize_preview() ) :
			echo '<div class="section-legend zerif_hidden_if_not_customizer"></div>';
		endif;
	}
endif;

if ( ! function_exists( 'zerif_our_team_header_title_function' ) ) :
	/**
	 * Title in the header area of the Our Team section
	 */
	function zerif_our_team_header_title_function() {

		if ( current_user_can( 'edit_theme_options' ) ) {
			$zerif_ourteam_title = get_theme_mod( 'zerif_ourteam_title', sprintf( '<a href="%1$s" class="zerif-default-links">%2$s</a>', esc_url( admin_url( 'customize.php?autofocus&#91;control&#93;=zerif_ourteam_title' ) ), __( 'YOUR TEAM', 'zerif-lite' ) ) );
		} else {
			$zerif_ourteam_title = get_theme_mod( 'zerif_ourteam_title' );
		}

		if ( ! empty( $zerif_ourteam_title ) ) :
			echo '<h2 class="dark-text">' . wp_kses_post( $zerif_ourteam_title ) . '</h2>';
		elseif ( is_customize_preview() ) :
			echo '<h2 class="dark-text zerif_hidden_if_not_customizer"></h2>';
		endif;
	}
endif;

if ( ! function_exists( 'zerif_our_team_header_subtitle_function' ) ) :
	/**
	 * Subtitle in the header area of the Our Team section
	 */
	function zerif_our_team_header_subtitle_function() {

		if ( current_user_can( 'edit_theme_options' ) ) {
			/* translators: Our team section in customizer */
			$zerif_ourteam_subtitle = get_theme_mod( 'zerif_ourteam_subtitle', sprintf( __( 'Change this subtitle in %s', 'zerif-lite' ), sprintf( '<a href="%1$s" class="zerif-default-links">%2$s</a>', esc_url( admin_url( 'customize.php?autofocus&#91;control&#93;=zerif_ourteam_subtitle' ) ), __( 'Our team section', 'zerif-lite' ) ) ) );
		} else {
			$zerif_ourteam_subtitle = get_theme_mod( 'zerif_ourteam_subtitle' );
		}

		if ( ! empty( $zerif_ourteam_subtitle ) ) :

			echo '<div class="section-legend">' . wp_kses_post( $zerif_ourteam_subtitle ) . '</div>';

		elseif ( is_customize_preview() ) :

			echo '<div class="section-legend zerif_hidden_if_not_customizer"></div>';

		endif;
	}
endif;

if ( ! function_exists( 'zerif_testimonials_header_title_function' ) ) :
	/**
	 * Title in the header area of the Testimonials section
	 */
	function zerif_testimonials_header_title_function() {

		if ( current_user_can( 'edit_theme_options' ) ) {
			$zerif_testimonials_title = get_theme_mod( 'zerif_testimonials_title', sprintf( '<a href="%1$s" class="zerif-default-links">%2$s</a>', esc_url( admin_url( 'customize.php?autofocus&#91;control&#93;=zerif_testimonials_title' ) ), __( 'Testimonials', 'zerif-lite' ) ) );
		} else {
			$zerif_testimonials_title = get_theme_mod( 'zerif_testimonials_title' );
		}

		if ( ! empty( $zerif_testimonials_title ) ) :

			echo '<h2 class="white-text">' . wp_kses_post( $zerif_testimonials_title ) . '</h2>';

		elseif ( is_customize_preview() ) :

			echo '<h2 class="white-text zerif_hidden_if_not_customizer"></h2>';

		endif;
	}
endif;

if ( ! function_exists( 'zerif_testimonials_header_subtitle_function' ) ) :
	/**
	 * Subtitle in the header area of the Testimonials section
	 */
	function zerif_testimonials_header_subtitle_function() {

		$zerif_testimonials_subtitle = get_theme_mod( 'zerif_testimonials_subtitle' );

		if ( ! empty( $zerif_testimonials_subtitle ) ) :

			echo '<h6 class="white-text section-legend">' . wp_kses_post( $zerif_testimonials_subtitle ) . '</h6>';

		elseif ( is_customize_preview() ) :

			echo '<h6 class="white-text section-legend zerif_hidden_if_not_customizer"></h6>';

		endif;
	}
endif;

if ( ! function_exists( 'zerif_latest_news_header_title_function' ) ) :
	/**
	 * Title in the header area of the Latest News section
	 */
	function zerif_latest_news_header_title_function() {

		$zerif_latestnews_title = get_theme_mod( 'zerif_latestnews_title' );

		if ( ! empty( $zerif_latestnews_title ) ) :

			echo '<h2 class="dark-text">' . wp_kses_post( $zerif_latestnews_title ) . '</h2>';

		else :

			echo '<h2 class="dark-text">' . __( 'Latest news', 'zerif-lite' ) . '</h2>';

		endif;
	}
endif;

if ( ! function_exists( 'zerif_latest_news_header_subtitle_function' ) ) :
	/**
	 * Subtitle in the header area of the Latest News section
	 */
	function zerif_latest_news_header_subtitle_function() {

		$zerif_latestnews_subtitle = get_theme_mod( 'zerif_latestnews_subtitle' );

		if ( ! empty( $zerif_latestnews_subtitle ) ) :

			echo '<div class="dark-text section-legend">' . wp_kses_post( $zerif_latestnews_subtitle ) . '</div>';

		elseif ( is_customize_preview() ) :

			echo '<div class="dark-text section-legend zerif_hidden_if_not_customizer"></div>';

		endif;
	}
endif;

if ( ! function_exists( 'zerif_big_title_text_function' ) ) :
	/**
	 * Title in the header area of the Big title section
	 */
	function zerif_big_title_text_function() {

		$zerif_bigtitle_title_default = get_theme_mod( 'zerif_bigtitle_title' );

		if ( ! empty( $zerif_bigtitle_title_default ) ) {

			$zerif_bigtitle_title = get_theme_mod( 'zerif_bigtitle_title_2', $zerif_bigtitle_title_default );

		} elseif ( current_user_can( 'edit_theme_options' ) ) {

			/* translators: Customizer link for Big title section */
			$zerif_bigtitle_title = get_theme_mod( 'zerif_bigtitle_title_2', sprintf( __( 'This piece of text can be changed in %s', 'zerif-lite' ), sprintf( '<a href="%1$s" class="zerif-default-links">%2$s</a>', esc_url( admin_url( 'customize.php?autofocus&#91;control&#93;=zerif_bigtitle_title_2' ) ), __( 'Big title section', 'zerif-lite' ) ) ) );

		} else {
			$zerif_bigtitle_title = get_theme_mod( 'zerif_bigtitle_title_2' );
		}

		if ( ! empty( $zerif_bigtitle_title ) ) :

			echo '<h1 class="intro-text">' . wp_kses_post( $zerif_bigtitle_title ) . '</h1>';

		elseif ( is_customize_preview() ) :

			echo '<h1 class="intro-text zerif_hidden_if_not_customizer"></h1>';

		endif;
	}
endif;

if ( ! function_exists( 'zerif_about_us_header_title_function' ) ) :
	/**
	 * Title in the header area of the About us section
	 */
	function zerif_about_us_header_title_function() {

		if ( current_user_can( 'edit_theme_options' ) ) {
			$zerif_aboutus_title = get_theme_mod( 'zerif_aboutus_title', sprintf( '<a href="%1$s" class="zerif-default-links">%2$s</a>', esc_url( admin_url( 'customize.php?autofocus&#91;control&#93;=zerif_aboutus_title' ) ), __( 'About', 'zerif-lite' ) ) );
		} else {
			$zerif_aboutus_title = get_theme_mod( 'zerif_aboutus_title' );
		}

		if ( ! empty( $zerif_aboutus_title ) ) :
			echo '<h2 class="white-text">' . wp_kses_post( $zerif_aboutus_title ) . '</h2>';
		elseif ( is_customize_preview() ) :
			echo '<h2 class="white-text zerif_hidden_if_not_customizer"></h2>';
		endif;
	}
endif;

if ( ! function_exists( 'zerif_about_us_header_subtitle_function' ) ) :
	/**
	 * Subtitle in the header area of the About us section
	 */
	function zerif_about_us_header_subtitle_function() {

		if ( current_user_can( 'edit_theme_options' ) ) {
			/* translators: About us section in customizer */
			$zerif_aboutus_subtitle = get_theme_mod( 'zerif_aboutus_subtitle', sprintf( __( 'Change this subtitle in %s', 'zerif-lite' ), sprintf( '<a href="%1$s" class="zerif-default-links">%2$s</a>', esc_url( admin_url( 'customize.php?autofocus&#91;control&#93;=zerif_aboutus_subtitle' ) ), __( 'About us section', 'zerif-lite' ) ) ) );
		} else {
			$zerif_aboutus_subtitle = get_theme_mod( 'zerif_aboutus_subtitle' );
		}

		if ( ! empty( $zerif_aboutus_subtitle ) ) :

			echo '<div class="white-text section-legend">';

			echo wp_kses_post( $zerif_aboutus_subtitle );

			echo '</div>';

		elseif ( is_customize_preview() ) :

			echo '<div class="white-text section-legend zerif_hidden_if_not_customizer">' . wp_kses_post( $zerif_aboutus_subtitle ) . '</div>';

		endif;
	}
endif;

if ( ! function_exists( 'zerif_sidebar_function' ) ) :
	/**
	 * Get the sidebar
	 */
	function zerif_sidebar_function() {
		?>
		<div class="sidebar-wrap col-md-3 content-left-wrap">
			<?php get_sidebar(); ?>
		</div><!-- .sidebar-wrap -->
		<?php
	}
endif;

if ( ! function_exists( 'zerif_primary_navigation_function' ) ) :
	/**
	 * Display the primary navigation
	 */
	function zerif_primary_navigation_function() {
		?>
		<nav class="navbar-collapse bs-navbar-collapse collapse" id="site-navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
			<a class="screen-reader-text skip-link" href="#content"><?php _e( 'Skip to content', 'zerif-lite' ); ?></a>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'nav navbar-nav navbar-right responsive-nav main-nav-list',
					'fallback_cb'    => 'zerif_wp_page_menu',
				)
			);
	?>
		</nav>
		<?php
	}
endif;
