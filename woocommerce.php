<?php

/**

 * The template for displaying all pages.

 *

 * This is the template that displays all pages by default.

 * Please note that this is the WordPress construct of pages

 * and that other 'pages' on your WordPress site will use a

 * different template.

 *

 * @package zerif

 */



get_header(); ?>

<div class="clear"></div>

</header> <!-- / END HOME SECTION  -->



	<div id="content" class="site-content">

<div class="container">



<div class="content-left-wrap col-md-12">

	<div id="primary" class="content-area">

		<main id="main" class="site-main" role="main">



			<?php woocommerce_content(); ?>



		</main><!-- #main -->

	</div><!-- #primary -->

</div><!-- .content-left-wrap -->

</div><!-- .container -->

<?php get_footer(); ?>