<?php
/**
 * Actions required
 */
?>

<div id="actions_required" class="zerif-lite-tab-pane">

    <h1><?php esc_html_e( 'Keep up with Zerif Lite\'s latest news' ,'zerif-lite' ); ?></h1>

    <!-- NEWS -->
    <hr />

	<?php
	global $zerif_required_actions;

	if( !empty($zerif_required_actions) ):

		foreach( $zerif_required_actions as $zerif_required_action_key => $zerif_required_action_value ):
			?>
			<div class="zerif-action-required-box">

				<h4><?php echo $zerif_required_action_key + 1; ?>. <?php if( !empty($zerif_required_action_value['title']) ): echo $zerif_required_action_value['title']; endif; ?></h4>
				<p><?php if( !empty($zerif_required_action_value['description']) ): echo $zerif_required_action_value['description']; endif; ?></p>
				<?php
					if( isset($zerif_required_action_value['check']) ):
						if( $zerif_required_action_value['check'] ):
							?><p><span class="zerif-lite-w-activated button"><?php esc_html_e( 'Already activated', 'zerif-lite' ); ?></span></p><?php
						else:
							?><p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin='.$zerif_required_action_value['plugin_slug'] ), 'install-plugin_'.$zerif_required_action_value['plugin_slug'] ) ); ?>" class="button button-primary"><?php if( !empty($zerif_required_action_value['title']) ): echo $zerif_required_action_value['title']; endif; ?></a></p><?php
						endif;
					endif;
				?>

				<hr />
			</div>
			<?php
		endforeach;

	endif;
	?>

</div>