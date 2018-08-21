<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package zerif-lite
 */
?>

<?php zerif_before_sidebar_trigger(); ?>

	<div id="secondary" class="widget-area" role="complementary">

		<?php zerif_top_sidebar_trigger(); ?>

		<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

			<aside id="search" class="widget widget_search">

				<?php get_search_form(); ?>

			</aside>

			<aside id="archives" class="widget">

				<h2 class="widget-title"><?php _e( 'Archives', 'zerif-lite' ); ?></h2>
				<ul>
					<?php
					wp_get_archives(
						array(
							'type' => 'monthly',
						)
					);
					?>
				</ul>

			</aside>

			<aside id="meta" class="widget">

				<h2 class="widget-title"><?php _e( 'Meta', 'zerif-lite' ); ?></h2>

				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>

			</aside>

		<?php endif; ?>

		<?php zerif_bottom_sidebar_trigger(); ?>

	</div><!-- #secondary -->

	<?php zerif_after_sidebar_trigger(); ?>
