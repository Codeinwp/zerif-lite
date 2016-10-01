<?php

	$zerif_total_posts = get_option('posts_per_page'); /* number of latest posts to show */
	
	if( !empty($zerif_total_posts) && ($zerif_total_posts > 0) ):

		zerif_before_latest_news_trigger();
	
		echo '<section class="latest-news" id="latestnews">';

			zerif_top_latest_news_trigger();
		
			echo '<div class="container">';

				/* SECTION HEADER */
				
				echo '<div class="section-header">';

					/* Title */
					zerif_latest_news_header_title_trigger();

					/* Subtitle */
					zerif_latest_news_header_subtitle_trigger();
				
				echo '</div><!-- END .section-header -->';

				echo '<div class="clear"></div>';
				
				echo '<div id="carousel-homepage-latestnews" class="carousel slide" data-ride="carousel">';
					
					/* Wrapper for slides */
					
					echo '<div class="carousel-inner" role="listbox">';

						$zerif_latest_loop = new WP_Query( apply_filters( 'zerif_latest_news_parameters', array( 'post_type' => 'post', 'posts_per_page' => $zerif_total_posts, 'order' => 'DESC','ignore_sticky_posts' => true )) );

						$newSlideActive = '<div class="item active" role="option">';
						$newSlide 		= '<div class="item">';
						$newSlideClose 	= '<div class="clear"></div></div>';
						$i_latest_posts= 0;
						
						if ( $zerif_latest_loop->have_posts() ) :
						
							while ( $zerif_latest_loop->have_posts() ) : $zerif_latest_loop->the_post();
								
								$i_latest_posts++;

								if ( !wp_is_mobile() ){

										if($i_latest_posts == 1){
											echo $newSlideActive;
										}
										else if($i_latest_posts % 4 == 1){
											echo $newSlide;
										}
									
										echo '<div class="col-sm-3 latestnews-box">';

											echo '<div class="latestnews-img">';
											
												echo '<a class="latestnews-img-a" href="'.esc_url( get_permalink() ).'" title="'.esc_attr( get_the_title() ).'">';

													if ( has_post_thumbnail() ) :
														the_post_thumbnail();
													else:
														echo '<img src="'.esc_url( get_template_directory_uri() ).'/images/blank-latestposts.png" alt="'.esc_attr( get_the_title() ).'" />';
													endif; 

												echo '</a>';
												
											echo '</div>';

											echo '<div class="latesnews-content">';

												echo '<h3 class="latestnews-title"><a href="'.esc_url( get_permalink() ).'" title="'.esc_attr( get_the_title() ).'">'.wp_kses_post( get_the_title() ).'</a></h3>';

												$ismore = @strpos( $post->post_content, '<!--more-->');
												
												if($ismore) {
													the_content( esc_html__('Read more', 'zerif-lite') .' <span class="sr-only">' . esc_html__('about ', 'zerif-lite').get_the_title() );
												} else {
													the_excerpt();
												}

											echo '</div>';

										echo '</div><!-- .latestnews-box"> -->';

										/* after every four posts it must closing the '.item' */
										if($i_latest_posts % 4 == 0){
											echo $newSlideClose;
										}

								} else {

									if( $i_latest_posts == 1 ) $active = 'active'; else $active = ''; 
			
									echo '<div class="item '.$active.'" role="option">';
										echo '<div class="col-md-3 latestnews-box">';
											echo '<div class="latestnews-img">';
												echo '<a class="latestnews-img-a" href="'.get_permalink().'" title="'.get_the_title().'">';
													if ( has_post_thumbnail() ) :
														the_post_thumbnail();
													else:
														echo '<img src="'.esc_url( get_template_directory_uri() ).'/images/blank-latestposts.png" alt="'.esc_attr( get_the_title() ).'" />';
													endif; 
												echo '</a>';
											echo '</div>';
											echo '<div class="latesnews-content">';
												echo '<h3 class="latestnews-title"><a href="'.esc_url( get_permalink() ).'" title="'.esc_attr( get_the_title() ).'">'.wp_kses_post( get_the_title() ).'</a></h3>';
												
												$ismore = @strpos( $post->post_content, '<!--more-->');
												
												if($ismore) {
													the_content( esc_html__('Read more', 'zerif-lite') .' <span class="sr-only">' . esc_html__('about ', 'zerif-lite').get_the_title() );
												} else {
													the_excerpt();
												}
											echo '</div>';
										echo '</div>';
									echo '</div>';
								}
							
							endwhile;
						
						endif;	

						if ( !wp_is_mobile() ) {

							// if there are less than 10 posts
							if($i_latest_posts % 4!=0){
								echo $newSlideClose;
							}

						}

						wp_reset_postdata(); 
						
					echo '</div><!-- .carousel-inner -->';

					/* Controls */
					echo apply_filters( 'zerif_latest_news_left_arrow','<a class="left carousel-control" href="#carousel-homepage-latestnews" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">'.__('Previous','zerif-lite').'</span>
					</a>' );
					echo apply_filters( 'zerif_latest_news_right_arrow','<a class="right carousel-control" href="#carousel-homepage-latestnews" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">'.__('Next','zerif-lite').'</span>
					</a>' );
				echo '</div><!-- #carousel-homepage-latestnews -->';

			echo '</div><!-- .container -->';

			zerif_bottom_latest_news_trigger();

		echo '</section>';

	zerif_after_latest_news_trigger();

endif; ?>
