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

        <h4><?php esc_html_e( '1. Install Contact Form 7' ,'zerif-lite' ); ?></h4>
        <p><?php esc_html_e( 'Although Zerif Lite has integrated it\'s own contact form, we are facing a time where we need to replace it with a plugin. We hope it will be a smooth transition and keep everybody happy. Please install Contact Form 7 now to make sure your site is updated.', 'zerif-lite' ); ?></p>

        <?php if ( class_exists( 'WPCF7_ContactForm' ) ) { ?>
            <p><span class="zerif-lite-w-activated button"><?php esc_html_e( 'Already activated', 'zerif-lite' ); ?></span></p>
        <?php } else { ?>
            <p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=contact-form-7' ), 'install-plugin_contact-form-7' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install Contact Form 7', 'zerif-lite' ); ?></a></p>
        <?php } ?>

        <hr />

    </div>
    <div class="zerif-tab-pane-half">


    </div>

    <div class="zerif-lite-clear"></div>



</div>