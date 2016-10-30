<?php
class Zerif_Theme_Info extends WP_Customize_Control {

	public function render_content() {
		$docs_url = 'http://docs.themeisle.com/article/421-shop-isle-documentation-wordpress-org';
		$demo_url = 'http://demo.themeisle.com/zerif-lite/';
		$fvp_url = 'http://docs.themeisle.com/article/65-zerif-lite-versus-zerif-pro';
		$review_url = 'https://wordpress.org/support/view/theme-reviews/zerif-lite'; ?>
		<div class="zerif-theme-info">
			<?php
			echo sprintf( wp_kses( __( ' <a href="%s">View Documentation</a>', 'zerif-lite' ), array(  'a' => array( 'href' => array() ) ) ), esc_url( $docs_url ) ); ?>
			<hr/>
			<?php
			echo sprintf( wp_kses( __( ' <a href="%s">View Demo</a>', 'zerif-lite' ), array(  'a' => array( 'href' => array() ) ) ), esc_url( $demo_url ) ); ?>
			<hr/>
			<?php
			echo sprintf( wp_kses( __( ' <a href="%s">Free VS Pro</a>', 'zerif-lite' ), array(  'a' => array( 'href' => array() ) ) ), esc_url( $fvp_url ) ); ?>
			<hr/>
			<?php
			echo sprintf( wp_kses( __( ' <a href="%s">Leave a review</a>', 'zerif-lite' ), array(  'a' => array( 'href' => array() ) ) ), esc_url( $review_url ) ); ?>
		</div>
		<?php
	}
}