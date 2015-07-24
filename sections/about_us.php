<section class="about-us" id="aboutus">
	<div class="container">


		<!-- SECTION HEADER -->

		<div class="section-header">


			<!-- SECTION TITLE -->

			<?php 
			$zerif_aboutus_title = get_theme_mod('zerif_aboutus_title',__('About','zerif-lite'));
			
			if( !empty($zerif_aboutus_title) ):
				echo '<h2 class="white-text">'.__($zerif_aboutus_title,'zerif-lite').'</h2>';
			endif;
			?>

			<!-- SHORT DESCRIPTION ABOUT THE SECTION -->

			<?php


				$zerif_aboutus_subtitle = get_theme_mod('zerif_aboutus_subtitle',__('Use this section to showcase important details about your business.','zerif-lite'));


				if( !empty($zerif_aboutus_subtitle) ):


					echo '<h6 class="white-text">';


						echo __($zerif_aboutus_subtitle,'zerif-lite');


					echo '</h6>';


				endif;


			?>
		</div><!-- / END SECTION HEADER -->


		<!-- 3 COLUMNS OF ABOUT US-->


		<div class="row">


			<!-- COLUMN 1 - BIG MESSAGE ABOUT THE COMPANY-->


			<?php


			$zerif_aboutus_biglefttitle = get_theme_mod('zerif_aboutus_biglefttitle',__('Everything you see here is responsive and mobile-friendly.','zerif-lite'));
			$zerif_aboutus_text = get_theme_mod('zerif_aboutus_text','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec massa enim. Aliquam viverra at est ullamcorper sollicitudin. Proin a leo sit amet nunc malesuada imperdiet pharetra ut eros.<br><br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec massa enim. Aliquam viverra at est ullamcorper sollicitudin. Proin a leo sit amet nunc malesuada imperdiet pharetra ut eros. <br><br>Mauris vel nunc at ipsum fermentum pellentesque quis ut massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas non adipiscing massa. Sed ut fringilla sapien. Cras sollicitudin, lectus sed tincidunt cursus, magna lectus vehicula augue, a lobortis dui orci et est.');
			$zerif_aboutus_feature1_title = get_theme_mod('zerif_aboutus_feature1_title',__('YOUR SKILL #1','zerif-lite'));
			$zerif_aboutus_feature1_text = get_theme_mod('zerif_aboutus_feature1_text');

			switch (
				(empty($zerif_aboutus_biglefttitle) ? 0 : 1)
				+ (empty($zerif_aboutus_text) ? 0 : 1)
				+ (empty($zerif_aboutus_feature1_title) && empty($zerif_aboutus_feature1_text) ? 0 : 1)
			) {
				case 3:
					$colCount = 4;
					break;
				case 2:
					$colCount = 6;
					break;
				default:
					$colCount = 12;
			}


				if( !empty($zerif_aboutus_biglefttitle) ):


					echo '<div class="col-lg-' . $colCount . ' col-md-' . $colCount . ' column zerif-rtl-big-title">';


						echo '<div class="big-intro" data-scrollreveal="enter left after 0s over 1s">';


							echo __($zerif_aboutus_biglefttitle,'zerif-lite');


						echo '</div>';


					echo '</div>';


				endif;


			if( !empty($zerif_aboutus_text) ):

				echo '<div class="col-lg-' . $colCount . ' col-md-' . $colCount . ' column zerif_about_us_center" data-scrollreveal="enter bottom after 0s over 1s">';


						echo '<p>';


							echo __($zerif_aboutus_text,'zerif-lite');


						echo '</p>';


					echo '</div>';


				endif;


			?>




		<!-- COLUMN 1 - SKILSS-->


		<div class="col-lg-<?php echo $colCount; ?> col-md-<?php echo $colCount; ?> column zerif-rtl-skills ">


			<ul class="skills" data-scrollreveal="enter right after 0s over 1s">





				<!-- SKILL ONE -->


				<li class="skill">


					<?php


						$zerif_aboutus_feature1_nr = get_theme_mod('zerif_aboutus_feature1_nr','80');


						if( !empty($zerif_aboutus_feature1_nr) ):


							echo '<div class="skill-count">';


								echo '<input type="text" value="'.$zerif_aboutus_feature1_nr.'" data-thickness=".2" class="skill1">';


							echo '</div>';


						endif;

						if( !empty($zerif_aboutus_feature1_title) ):
							echo '<h6>'.__($zerif_aboutus_feature1_title,'zerif-lite').'</h6>';
						endif;

						if( !empty($zerif_aboutus_feature1_text) ):
							echo '<p>'.__($zerif_aboutus_feature1_text,'zerif-lite').'</p>';
						endif;


					?>


				</li>





				<!-- SKILL TWO -->


				<li class="skill">


					<?php


						$zerif_aboutus_feature2_nr = get_theme_mod('zerif_aboutus_feature2_nr','91');


						if( !empty($zerif_aboutus_feature2_nr) ):


							echo '<div class="skill-count">';


								echo '<input type="text" value="'.$zerif_aboutus_feature2_nr.'" data-thickness=".2" class="skill2">';


							echo '</div>';


						endif;

						$zerif_aboutus_feature2_title = get_theme_mod('zerif_aboutus_feature2_title',__('YOUR SKILL #2','zerif-lite'));
						$zerif_aboutus_feature2_text = get_theme_mod('zerif_aboutus_feature2_text');

						if( !empty($zerif_aboutus_feature2_title) ):
							echo '<h6>'.__($zerif_aboutus_feature2_title,'zerif-lite').'</h6>';
						endif;

						if( !empty($zerif_aboutus_feature2_text) ):
							echo '<p>'.__($zerif_aboutus_feature2_text,'zerif-lite').'</p>';
						endif;


					?>

				</li>





				<!-- SKILL THREE -->


				<li class="skill">


					<?php


						$zerif_aboutus_feature3_nr = get_theme_mod('zerif_aboutus_feature3_nr','88');


						if( !empty($zerif_aboutus_feature3_nr) ):


							echo '<div class="skill-count">';


								echo '<input type="text" value="'.$zerif_aboutus_feature3_nr.'" data-thickness=".2" class="skill3">';


							echo '</div>';


						endif;

						$zerif_aboutus_feature3_title = get_theme_mod('zerif_aboutus_feature3_title',__('YOUR SKILL #3','zerif-lite'));
						$zerif_aboutus_feature3_text = get_theme_mod('zerif_aboutus_feature3_text');

						if( !empty($zerif_aboutus_feature3_title) ):
							echo '<h6>'.__($zerif_aboutus_feature3_title,'zerif-lite').'</h6>';
						endif;

						if( !empty($zerif_aboutus_feature3_text) ):
							echo '<p>'.__($zerif_aboutus_feature3_text,'zerif-lite').'</p>';
						endif;


					?>


				</li>


				<!-- SKILL FOUR -->


				<li class="skill">


					<?php


						$zerif_aboutus_feature4_nr = get_theme_mod('zerif_aboutus_feature4_nr','95');


						if( !empty($zerif_aboutus_feature4_nr) ):


							echo '<div class="skill-count">';


								echo '<input type="text" value="'.$zerif_aboutus_feature4_nr.'" data-thickness=".2" class="skill4">';


							echo '</div>';


						endif;

						$zerif_aboutus_feature4_title = get_theme_mod('zerif_aboutus_feature4_title',__('YOUR SKILL #4','zerif-lite'));
						$zerif_aboutus_feature4_text = get_theme_mod('zerif_aboutus_feature4_text');

						if( !empty($zerif_aboutus_feature4_title) ):
							echo '<h6>'.__($zerif_aboutus_feature4_title,'zerif-lite').'</h6>';
						endif;

						if( !empty($zerif_aboutus_feature4_text) ):
							echo '<p>'.__($zerif_aboutus_feature4_text,'zerif-lite').'</p>';
						endif;


					?>


				</li>





			</ul>


		</div> <!-- / END SKILLS COLUMN-->


	</div> <!-- / END 3 COLUMNS OF ABOUT US-->





	<!-- CLIENTS -->
	<?php
		if(is_active_sidebar( 'sidebar-aboutus' )):
			echo '<div class="our-clients">';
				echo '<h5><span class="section-footer-title">'.__('OUR HAPPY CLIENTS','zerif-lite').'</span></h5>';
			echo '</div>';

			echo '<div class="client-list">';
				echo '<div data-scrollreveal="enter right move 60px after 0.00s over 2.5s">';
				dynamic_sidebar( 'sidebar-aboutus' );
				echo '</div>';
			echo '</div> ';
		endif;
	?>


</div> <!-- / END CONTAINER -->


</section> <!-- END ABOUT US SECTION -->
