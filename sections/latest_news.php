		<?php 
		global $wp_query;
		$total_posts = $wp_query->post_count;
		if ($total_posts>0) {
			?>
		
		<section class="latest-news" id="latestnews">
			<div class="container">

				<!-- SECTION HEADER -->
				<div class="section-header">
				<?php

					$zerif_latestnews_title = get_theme_mod('zerif_latestnews_title');

					if( !empty($zerif_latestnews_title) ):
						echo '<h2 class="dark-text">' . __($zerif_latestnews_title,'zerif-lite') . '</h2>';
					else:
						echo '<h2 class="dark-text">' . __('Latest news','zerif-lite') . '</h2>';
					endif;


					$zerif_latestnews_subtitle = get_theme_mod('zerif_latestnews_subtitle');

					if( !empty($zerif_latestnews_subtitle) ):

						echo '<h6 class="dark-text">'.__($zerif_latestnews_subtitle,'zerif-lite').'</h6>';

					endif;
				?>
				</div>


				<div class="clear"></div>
				<div id="carousel-homepage-latestnews" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
				
					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">


					<?php 
						$args = array( 'post_type' => 'post', 'posts_per_page' => $total_posts, 'order' => 'DESC');
						$loop = new WP_Query( $args );

						$newSlideActive = '<div class="item active">';
						$newSlide 		= '<div class="item">';
						$newSlideClose 	= '<div class="clear"></div></div>';
						$i= 0;
						while ( $loop->have_posts() ) : $loop->the_post();

						$i++;

						if ( !wp_is_mobile() ){


								if($i==1){
									echo $newSlideActive;
								}
								else if($i%4==1){
									echo $newSlide;
								}
							?>
								<div class="col-sm-3 latestnews-box">

									<div class="latestnews-img">
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">

											<?php if ( has_post_thumbnail() ) : ?>
												<?php the_post_thumbnail(); ?>
											<?php else: ?>
												<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/blank-latestposts.png">
											<?php endif; ?>

										</a>
									</div>

									<div class="latesnews-content">

										<h5 class="latestnews-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>

										<?php the_excerpt(); ?>

									</div>

								</div><!-- .latestnews-box"> -->

							<?php
								/* after every four posts it must closing the '.item'  */
								if($i%4==0){
									echo $newSlideClose;
								}

						} else {

							if( $i==1 ) $active = 'active'; else $active = ''; 

						?>
	
							<div class="item <?php echo $active; ?>">
								<div class="col-md-3 latestnews-box">
									<div class="latestnews-img">
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
											<?php the_post_thumbnail(); ?>
										</a>
									</div>
									<div class="latesnews-content">
										<h5 class="latestnews-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>
										<?php the_excerpt(); ?>
									</div>
								</div>
							</div>

						<?php
						}
						
					endwhile;

					if ( !wp_is_mobile() ) {

						// if there are less than 10 posts
						if($i%4!=0){
							echo $newSlideClose;
						}

					}

					?>


				    </div>

					<!-- Controls -->
					<a class="left carousel-control" href="#carousel-homepage-latestnews" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only"><?php _e('Previous','zerif-lite'); ?></span>
					</a>
					<a class="right carousel-control" href="#carousel-homepage-latestnews" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only"><?php _e('Next','zerif-lite'); ?></span>
					</a>
				</div>

			</div>
		</section>
		<?php } ?>
