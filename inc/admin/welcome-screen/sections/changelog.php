<?php
/**
 * Changelog
 */

$zerif_lite = wp_get_theme( 'zerif-lite' );

?>
<div class="zerif-lite-tab-pane" id="changelog">

	<div class="zerif-tab-pane-center">
	
		<h1>Zerif Lite <?php if( !empty($zerif_lite['Version']) ): ?> <sup id="zerif-lite-theme-version"><?php echo esc_attr( $zerif_lite['Version'] ); ?> </sup><?php endif; ?></h1>

	</div>

	<?php
	$zerif_lite_changelog_file = @fopen(get_template_directory().'/CHANGELOG.md', 'r');
	if($zerif_lite_changelog_file) {
		while(!feof($zerif_lite_changelog_file)) {

			$zerif_lite_changelog_line = fgets($zerif_lite_changelog_file);

			if( !empty($zerif_lite_changelog_line) ) {
				$zerif_lite_changelog_line_substr = substr($zerif_lite_changelog_line, 0, 3);

				if( !empty($zerif_lite_changelog_line_substr) ){
					if( strcmp($zerif_lite_changelog_line_substr,'###') == 0) {
						?>
						<hr />
						<h1><?php echo substr($zerif_lite_changelog_line, 3); ?></h1>
						<?php
					}
					else {
						echo $zerif_lite_changelog_line.'<br>';
					}
				}

			}

		}
		fclose($zerif_lite_changelog_file);
	}


?>
	
</div>