<?php
/**
 * Github
 *
 * @package zerif-lite
 */
?>

<div id="github" class="zerif-lite-tab-pane">

	<h1><?php esc_html_e( 'How can I contribute?', 'zerif-lite' ); ?></h1>

	<hr/>

	<div class="zerif-tab-pane-half zerif-tab-pane-first-half">
		<p><strong><?php esc_html_e( 'Found a bug? Want to contribute with a fix or create a new feature?', 'zerif-lite' ); ?></strong></p>

		<p><?php esc_html_e( 'GitHub is the place to go!', 'zerif-lite' ); ?></p>

		<p>
			<a href="<?php echo esc_url( 'https://github.com/Codeinwp/zerif-lite' ); ?>" class="github-button button button-primary"><?php esc_html_e( 'Zelle Lite on GitHub', 'zerif-lite' ); ?></a>
		</p>
		<hr>
	</div>

	<div class="zerif-tab-pane-half">
		<p><strong><?php esc_html_e( 'Are you a polyglot? Want to translate Zelle Lite into your own language?', 'zerif-lite' ); ?></strong></p>

		<p><?php esc_html_e( 'Get involved at WordPress.org.', 'zerif-lite' ); ?></p>

		<p>
			<a href="<?php echo esc_url( 'https://translate.wordpress.org/projects/wp-themes/zerif-lite' ); ?>" class="translate-button button button-primary"><?php _e( 'Translate Zelle Lite', 'zerif-lite' ); ?></a>
		</p>
		<hr>
	</div>

	<div>
		<h4><?php esc_html_e( 'Are you enjoying Zelle Lite?', 'zerif-lite' ); ?></h4>

		<p class="review-link"><?php echo /* translators: wordpress.org review page */ sprintf( esc_html__( 'Rate our theme on %1$sWordPress.org%2$s. We\'d really appreciate it!', 'zerif-lite' ), '<a href="https://wordpress.org/themes/zerif-lite/">', '</a>' ); ?></p>

		<p><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span></p>
	</div>

</div>
