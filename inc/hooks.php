<?php
/**
 * Zerif Lite Hooks
 *
 * @package zerif-lite
 */

/**
 * 404 page
 */

/**
 * Title of 404 pages
 *
 * HTML context: within `header.entry-header`
 */
function zerif_404_title_trigger() {
	do_action( 'zerif_404_title' );
}

/**
 * Content of 404 pages
 *
 * HTML context: within `div.entry-content`
 */
function zerif_404_content_trigger() {
	do_action( 'zerif_404_content' );
}

/*************** Sidebar *************************/

/**
 * Before sidebar
 *
 * HTML context: before `div#secondary`
 */
function zerif_before_sidebar_trigger() {
	do_action( 'zerif_before_sidebar' );
}

/**
 * After sidebar
 *
 * HTML context: after `div#secondary`
 */
function zerif_after_sidebar_trigger() {
	do_action( 'zerif_after_sidebar' );
}

/**
 * Top of sidebar
 *
 * HTML context: within `div#secondary`
 */
function zerif_top_sidebar_trigger() {
	do_action( 'zerif_top_sidebar' );
}

/**
 * Bottom of sidebar
 *
 * HTML context: within `div#secondary`
 */
function zerif_bottom_sidebar_trigger() {
	do_action( 'zerif_bottom_sidebar' );
}

/**
 * Sidebar
 */
function zerif_sidebar_trigger() {
	do_action( 'zerif_sidebar' );
}


/******************** Footer *********************/

/**
 * Before footer
 *
 * HTML context: before `footer`
 */
function zerif_before_footer_trigger() {
	do_action( 'zerif_before_footer' );
}

/**
 * After footer
 *
 * HTML context: after `footer`
 */
function zerif_after_footer_trigger() {
	do_action( 'zerif_after_footer' );
}

/**
 * Top of footer
 *
 * HTML context: within `footer div.container`
 */
function zerif_top_footer_trigger() {
	do_action( 'zerif_top_footer' );
}

/**
 * Bottom of footer
 *
 * HTML context: within `footer div.container`
 */
function zerif_bottom_footer_trigger() {
	do_action( 'zerif_bottom_footer' );
}

/**
 * The 3 footer sidebars in footer
 *
 * HTML context: inside footer
 */
function zerif_footer_widgets_trigger() {
	do_action( 'zerif_footer_widgets' );
}

/***************** Search page ******************/

/**
 * Before search
 *
 * HTML context: within `main` at the beginning
 */
function zerif_before_search_trigger() {
	do_action( 'zerif_before_search' );
}

/**
 * After search
 *
 * HTML context: after `main` at the end
 */
function zerif_after_search_trigger() {
	do_action( 'zerif_after_search' );
}

/********************* Body ********************/
/**
 * Top of body
 *
 * HTML context: within `body`
 */
function zerif_top_body_trigger() {
	do_action( 'zerif_top_body' );
}

/**
 * Bottom of body
 *
 * HTML context: within `body`
 */
function zerif_bottom_body_trigger() {
	do_action( 'zerif_bottom_body' );
}

/******************* Head ******************/
/**
 * Top of head
 *
 * HTML context: within `head`
 */
function zerif_top_head_trigger() {
	do_action( 'zerif_top_head' );
}

/**
 * Bottom of head
 *
 * HTML context: within `head`
 */
function zerif_bottom_head_trigger() {
	do_action( 'zerif_bottom_head' );
}

/***************** Page ********************/

/**
 * Top of page content
 *
 * HTML context: within `content-left-wrap` at the beginning
 */
function zerif_top_page_content_trigger() {
	do_action( 'zerif_top_page_content' );
}

/**
 * Bottom of page content
 *
 * HTML context: within `content-left-wrap` at the end
 */
function zerif_bottom_page_content_trigger() {
	do_action( 'zerif_bottom_page_content' );
}

/**
 * Before page content
 *
 * HTML context: before `content-left-wrap`
 */
function zerif_before_page_content_trigger() {
	do_action( 'zerif_before_page_content' );
}

/**
 * After page content
 *
 * HTML context: after `content-left-wrap`
 */
function zerif_after_page_content_trigger() {
	do_action( 'zerif_after_page_content' );
}

/**
 * Page header
 *
 * HTML context: within `.entry-header`
 */
function zerif_page_header_trigger() {
	do_action( 'zerif_page_header' );
}

/************ Our Focus section ********************/

/**
 * Before Our focus section
 *
 * HTML context: before `.focus`
 */
function zerif_before_our_focus_trigger() {
	do_action( 'zerif_before_our_focus' );
}

/**
 * After Our focus section
 *
 * HTML context: after `.focus`
 */
function zerif_after_our_focus_trigger() {
	do_action( 'zerif_after_our_focus' );
}

/**
 * Top of Our focus section
 *
 * HTML context: within `.focus`
 */
function zerif_top_our_focus_trigger() {
	do_action( 'zerif_top_our_focus' );
}

/**
 * Bottom of Our focus section
 *
 * HTML context: within `.focus`
 */
function zerif_bottom_our_focus_trigger() {
	do_action( 'zerif_bottom_our_focus' );
}

/**
 * Our focus section title
 *
 * HTML context: inside `.focus .section-header`
 */
function zerif_our_focus_header_title_trigger() {
	do_action( 'zerif_our_focus_header_title' );
}

/**
 * Our focus section subtitle
 *
 * HTML context: inside `.focus .section-header`
 */
function zerif_our_focus_header_subtitle_trigger() {
	do_action( 'zerif_our_focus_header_subtitle' );
}

/************ About us section ********************/

/**
 * Before About us section
 *
 * HTML context: before `.about-us`
 */
function zerif_before_about_us_trigger() {
	do_action( 'zerif_before_about_us' );
}

/**
 * After About us section
 *
 * HTML context: after `.about-us`
 */
function zerif_after_about_us_trigger() {
	do_action( 'zerif_after_about_us' );
}

/**
 * Top of About us section
 *
 * HTML context: within `.about-us`
 */
function zerif_top_about_us_trigger() {
	do_action( 'zerif_top_about_us' );
}

/**
 * Bottom of About us section
 *
 * HTML context: within `.about-us`
 */
function zerif_bottom_about_us_trigger() {
	do_action( 'zerif_bottom_about_us' );
}

/**
 * About us section title
 *
 * HTML context: inside `.about-us .section-header`
 */
function zerif_about_us_header_title_trigger() {
	do_action( 'zerif_about_us_header_title' );
}

/**
 * About us section subtitle
 *
 * HTML context: inside `.about-us .section-header`
 */
function zerif_about_us_header_subtitle_trigger() {
	do_action( 'zerif_about_us_header_subtitle' );
}


/************ Latest news section *****************/

/**
 * Before Latest news section
 *
 * HTML context: before `.latest-news`
 */
function zerif_before_latest_news_trigger() {
	do_action( 'zerif_before_latest_news' );
}

/**
 * After Latest news section
 *
 * HTML context: after `.latest-news`
 */
function zerif_after_latest_news_trigger() {
	do_action( 'zerif_after_latest_news' );
}

/**
 * Top of Latest news section
 *
 * HTML context: within `.latest-news`
 */
function zerif_top_latest_news_trigger() {
	do_action( 'zerif_top_latest_news' );
}

/**
 * Bottom of Latest news section
 *
 * HTML context: within `.latest-news`
 */
function zerif_bottom_latest_news_trigger() {
	do_action( 'zerif_bottom_latest_news' );
}

/**
 * Latest news section title
 *
 * HTML context: inside `.latest-news .section-header`
 */
function zerif_latest_news_header_title_trigger() {
	do_action( 'zerif_latest_news_header_title' );
}

/**
 * Latest news section subtitle
 *
 * HTML context: inside `.latest-news .section-header`
 */
function zerif_latest_news_header_subtitle_trigger() {
	do_action( 'zerif_latest_news_header_subtitle' );
}


/************ Our team section *****************/

/**
 * Before Our team section
 *
 * HTML context: before `.our-team`
 */
function zerif_before_our_team_trigger() {
	do_action( 'zerif_before_our_team' );
}

/**
 * After Our team section
 *
 * HTML context: after `.our-team`
 */
function zerif_after_our_team_trigger() {
	do_action( 'zerif_after_our_team' );
}

/**
 * Top of Our team section
 *
 * HTML context: within `.our-team`
 */
function zerif_top_our_team_trigger() {
	do_action( 'zerif_top_our_team' );
}

/**
 * Bottom of Our team section
 *
 * HTML context: within `.our-team`
 */
function zerif_bottom_our_team_trigger() {
	do_action( 'zerif_bottom_our_team' );
}

/**
 * Our team section title
 *
 * HTML context: inside `.our-team .section-header`
 */
function zerif_our_team_header_title_trigger() {
	do_action( 'zerif_our_team_header_title' );
}

/**
 * Our team section subtitle
 *
 * HTML context: inside `.our-team .section-header`
 */
function zerif_our_team_header_subtitle_trigger() {
	do_action( 'zerif_our_team_header_subtitle' );
}

/************ Testimonials section *****************/

/**
 * Before Testimonials section
 *
 * HTML context: before `.testimonial`
 */
function zerif_before_testimonials_trigger() {
	do_action( 'zerif_before_testimonials' );
}

/**
 * After Testimonials section
 *
 * HTML context: after `.testimonial`
 */
function zerif_after_testimonials_trigger() {
	do_action( 'zerif_after_testimonials' );
}

/**
 * Top of Testimonials section
 *
 * HTML context: within `.testimonial`
 */
function zerif_top_testimonials_trigger() {
	do_action( 'zerif_top_testimonials' );
}

/**
 * Bottom of Testimonials section
 *
 * HTML context: within `.testimonial`
 */
function zerif_bottom_testimonials_trigger() {
	do_action( 'zerif_bottom_testimonials' );
}

/**
 * Testimonials section title
 *
 * HTML context: inside `.testimonial .section-header`
 */
function zerif_testimonials_header_title_trigger() {
	do_action( 'zerif_testimonials_header_title' );
}

/**
 * Testimonials section subtitle
 *
 * HTML context: inside `.testimonial .section-header`
 */
function zerif_testimonials_header_subtitle_trigger() {
	do_action( 'zerif_testimonials_header_subtitle' );
}

/************ Big title section *****************/

/**
 * Add content inside div.buttons
 *
 * HTML context: within `.buttons`
 */
function zerif_big_title_buttons_top_trigger() {
	do_action( 'zerif_big_title_buttons_top' );
}

/**
 * Add content inside div.buttons
 *
 * HTML context: within `.buttons`
 */
function zerif_big_title_buttons_bottom_trigger() {
	do_action( 'zerif_big_title_buttons_bottom' );
}

/**
 * Big title section text
 */
function zerif_big_title_text_trigger() {
	do_action( 'zerif_big_title_text' );
}
/************ General *****************/

/**
 * Add content after the header tag is closed
 *
 * HTML context: after `header` is closed
 */
function zerif_after_header_trigger() {
	do_action( 'zerif_after_header' );
}

/**
 * Add the main navigation menu
 */
function zerif_primary_navigation_trigger() {
	do_action( 'zerif_primary_navigation' );
}

/************ Archive *****************/

/**
 * Archive page header title
 *
 * HTML context: inside .archive header.page-header
 */
function zerif_page_header_title_archive_trigger() {
	do_action( 'zerif_page_header_title_archive' );
}

/**
 * Archive page - optional term description
 *
 * HTML context: inside .archive header.page-header
 */
function zerif_page_term_description_archive_trigger() {
	do_action( 'zerif_page_term_description_archive' );
}

/**
 * Before Archive content
 *
 * HTML context: before `.content-left-wrap`
 */
function zerif_before_archive_content_trigger() {
	do_action( 'zerif_before_archive_content' );
}

/**
 * After Archive content
 *
 * HTML context: after `.content-left-wrap`
 */
function zerif_after_archive_content_trigger() {
	do_action( 'zerif_after_archive_content' );
}

/**
 * Top of Archive content
 *
 * HTML context: within `.content-left-wrap`
 */
function zerif_top_archive_content_trigger() {
	do_action( 'zerif_top_archive_content' );
}

/**
 * Bottom of Archive content
 *
 * HTML context: within `.content-left-wrap`
 */
function zerif_bottom_archive_content_trigger() {
	do_action( 'zerif_bottom_archive_content' );
}

/***************** Single post ********************/

/**
 * Top of single post
 *
 * HTML context: within `content-left-wrap` at the beginning
 */
function zerif_top_single_post_trigger() {
	do_action( 'zerif_top_single_post' );
}

/**
 * Bottom of single post
 *
 * HTML context: within `content-left-wrap` at the end
 */
function zerif_bottom_single_post_trigger() {
	do_action( 'zerif_bottom_single_post' );
}

/**
 * Before single post
 *
 * HTML context: before `content-left-wrap`
 */
function zerif_before_single_post_trigger() {
	do_action( 'zerif_before_single_post' );
}

/**
 * After single post
 *
 * HTML context: after `content-left-wrap`
 */
function zerif_after_single_post_trigger() {
	do_action( 'zerif_after_single_post' );
}

/**
 * Before navbar
 *
 * HTML context: before `navbar-header`
 */
function zerif_before_navbar_trigger() {
	do_action( 'zerif_before_navbar' );
}

/**
 * After header container
 *
 * HTML context: after `container`
 */
function zerif_after_header_container_trigger() {
	do_action( 'zerif_after_header_container' );
}
