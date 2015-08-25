<?php
/**
 * Github
 */
?>

<div id="github" class="zerif-welcome-github-section tab-pane">

	<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/welcome-screen/img/github.png'; ?>" alt="<?php esc_html_e( 'Can I contribute to Zerif Lite?', 'zerif-lite' ); ?>" />
	
	<h4><?php esc_html_e( 'Can I Contribute?', 'zerif-lite' ); ?></h4>
		
	<p><?php esc_html_e( 'Found a bug? Want to contribute a patch or create a new feature? GitHub is the place to go! Or would you like to translate Zerif Lite in to your language? Get involved at wordpress.org.', 'zerif-lite' ); ?></p>
	
	<p>
		<a href="https://github.com/Codeinwp/zerif-lite" class="button"><?php esc_html_e( 'Zerif Lite on GitHub', 'zerif-lite' ); ?></a>
		<a href="https://translate.wordpress.org/projects/wp-themes/zerif-lite" class="button"><?php _e( 'Translate Zerif Lite', 'zerif-lite' ); ?></a>
	</p>

	<h4><?php esc_html_e( 'Are you enjoying Zerif Lite?', 'zerif-lite' ); ?></h4>
		
	<p><?php echo sprintf( esc_html__( 'Why not leave a review on %sWordPress.org%s? We\'d really appreciate it! :-)', 'zerif-lite' ), '<a href="https://wordpress.org/themes/zerif-lite/">', '</a>' ); ?></p>
	
</div>