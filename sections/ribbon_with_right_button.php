<?php 
	$zerif_ribbonright_text = get_theme_mod('zerif_ribbonright_text');
	if( !empty($zerif_ribbonright_text) ):
		echo '<section class="purchase-now">';
			echo '<div class="container">';
				echo '<div class="row">';
					echo '<div class="col-md-9" data-scrollreveal="enter left after 0s over 1s">';
						echo '<h3 class="white-text">';
							echo __($zerif_ribbonright_text,'zerif-lite');
						echo '</h3>';	
					echo '</div>';
					
					$zerif_ribbonright_buttonlabel = get_theme_mod('zerif_ribbonright_buttonlabel');
					$zerif_ribbonright_buttonlink = get_theme_mod('zerif_ribbonright_buttonlink');
					
					if( !empty($zerif_ribbonright_buttonlabel) && !empty($zerif_ribbonright_buttonlink) ):
						echo '<div class="col-md-3" data-scrollreveal="enter right after 0s over 1s">';
							echo '<a href="'.$zerif_ribbonright_buttonlink.'" class="btn btn-primary custom-button red-btn">'.__($zerif_ribbonright_buttonlabel,'zerif-lite').'</a>';
						echo '</div>';
					endif;
				echo '</div>';
			echo '</div>';
		echo '</section>';	
	endif;
?>