<?php
/**
 * Actions required
 */
?>

<div id="actions_required" class="zerif-lite-tab-pane">

    <h1><?php esc_html_e( 'Keep up with Zerif Lite\'s latest news' ,'zerif-lite' ); ?></h1>

    <!-- NEWS -->
    <hr />

    <div class="zerif-tab-pane-half zerif-tab-pane-first-half">

	<?php if ( defined('PIRATE_FORMS_VERSION') ): ?>
	
		<div class="zerif-action-required-box">
		
	<?php else: ?>

		<div class="zerif-action-required-box active">
	
	<?php endif; ?>
	
			<h4><?php esc_html_e( '1. Install Pirate Forms' ,'zerif-lite' ); ?></h4>
			<p><?php esc_html_e( 'In the next updates, Zerif Lite\'s default contact form will be removed. Please make sure you install th Pirate Forms plugin to keep your site updated,  and experience a smooth transition to the latest version.', 'zerif-lite' ); ?></p>

			<?php if ( defined('PIRATE_FORMS_VERSION') ) { ?>
				<p><span class="zerif-lite-w-activated button"><?php esc_html_e( 'Already activated', 'zerif-lite' ); ?></span></p>
			<?php } else { ?>
				<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=pirate-forms' ), 'install-plugin_pirate-forms' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install Pirate Forms', 'zerif-lite' ); ?></a></p>
			<?php } ?>

			<hr />
		</div>	

    </div>
    <div class="zerif-tab-pane-half">

		<div class="zerif-action-required-box">

			<div class="zerif-action-required-box active">

				<h4><?php esc_html_e( '2. Check the contact form after installing Pirate Forms' ,'zerif-lite' ); ?></h4>
				<p><?php esc_html_e( 'After installing the Pirate Forms plugin, please make sure you check your frontpage contact form is working fine. Also, if you use Zerif Lite in other language(s) please make sure the translation is ok. If not, please translate the contact form again.', 'zerif-lite' ); ?></p>

				<hr />
			</div>


		</div>

    <div class="zerif-lite-clear"></div>



</div>