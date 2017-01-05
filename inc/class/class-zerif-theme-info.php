<?php
class Zerif_Theme_Info extends WP_Customize_Control {
	public function render_content() {
		$docs_url = 'http://docs.themeisle.com/article/5-zerif-lite-documentation';
		$demo_url = 'http://demo.themeisle.com/zerif-lite/';
		$fvp_url = 'http://docs.themeisle.com/article/65-zerif-lite-versus-zerif-pro';
		$review_url = 'https://wordpress.org/support/view/theme-reviews/zerif-lite'; ?>
		<div class="zerif-theme-info">
			<?php
			printf( '<a href="'.esc_url( $docs_url ).'" target="_blank">%s</a>', __( 'View Documentation', 'zerif-lite' ) ); ?>
			<hr/>
			<?php
			printf( '<a href="'.esc_url( $demo_url ).'" target="_blank">%s</a>', __( 'View Demo', 'zerif-lite' ) ); ?>
			<hr/>
			<?php
			printf( '<a href="'.esc_url( $fvp_url ).'" target="_blank">%s</a>', __( 'Free VS Pro', 'zerif-lite' ) ); ?>
			<hr/>
			<?php
			printf( '<a href="'.esc_url( $review_url ).'" target="_blank">%s</a>', __( 'Leave a review', 'zerif-lite' ) ); ?>
		</div>
		<?php
	}
}