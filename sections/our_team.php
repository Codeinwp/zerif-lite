<?phpglobal $wp_customize;zerif_before_our_team_trigger();echo '<section class="our-team" id="team">';	zerif_top_our_team_trigger();	echo '<div class="container">';		echo '<div class="section-header">';			/* Title */			zerif_our_team_header_title_trigger();			/* Subtitle */			zerif_our_team_header_subtitle_trigger();		echo '</div>';		if(is_active_sidebar( 'sidebar-ourteam' )):			echo '<div class="row" data-scrollreveal="enter left after 0s over 0.1s">';				dynamic_sidebar( 'sidebar-ourteam' );			echo '</div> ';		else:			echo '<div class="row" data-scrollreveal="enter left after 0s over 0.1s">';			the_widget( 'zerif_team_widget','name=ASHLEY SIMMONS&position=Project Manager&description=Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque&fb_link=#&tw_link=#&bh_link=#&db_link=#&ln_link=#&image_uri='.get_template_directory_uri().'/images/team1.png', array('before_widget' => '', 'after_widget' => '') );			the_widget( 'zerif_team_widget','name=TIMOTHY SPRAY&position=Art Director&description=Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque&fb_link=#&tw_link=#&bh_link=#&db_link=#&ln_link=#&image_uri='.get_template_directory_uri().'/images/team2.png', array('before_widget' => '', 'after_widget' => '') );			the_widget( 'zerif_team_widget','name=TONYA GARCIA&position=Account Manager&description=Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque&fb_link=#&tw_link=#&bh_link=#&db_link=#&ln_link=#&image_uri='.get_template_directory_uri().'/images/team3.png', array('before_widget' => '', 'after_widget' => '') );			the_widget( 'zerif_team_widget','name=JASON LANE&position=Business Development&description=Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque&fb_link=#&tw_link=#&bh_link=#&db_link=#&ln_link=#&image_uri='.get_template_directory_uri().'/images/team4.png', array('before_widget' => '', 'after_widget' => '') );			echo '</div>';		endif;	echo '</div>';	zerif_bottom_our_team_trigger();echo '</section>';zerif_after_our_team_trigger();?>