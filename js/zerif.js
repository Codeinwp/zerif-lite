/* =================================

   LOADER                     

=================================== */

// makes sure the whole site is loaded

jQuery(window).load(function() {

        // will first fade out the loading animation

  jQuery(".status").fadeOut();

        // will fade out the whole DIV that covers the website.

  jQuery(".preloader").delay(1000).fadeOut("slow");


  jQuery('.carousel').carousel('pause');

})


/*** mobile menu */
jQuery(document).ready(function() {

	if ( jQuery(window).width() < 767 ){

		jQuery('#site-navigation li').each(function(){

			if ( jQuery(this).find('ul').length > 0 ){
				jQuery(this).addClass('has_children');
				jQuery(this).find('a').first().after('<p class="dropdownmenu"></p>');
			}
			
		});

	}

	jQuery('.dropdownmenu').click(function(){
		if( jQuery(this).parent('li').hasClass('this-open') ){
			jQuery(this).parent('li').removeClass('this-open');
		}else{
			jQuery(this).parent('li').addClass('this-open');
		}
	});

});


jQuery(document).ready(function() {
	var current_height = jQuery('.header .container').height();
	jQuery('.header').css('min-height',current_height);
	
	
});

/* =================================

===  Bootstrap Fix              ====

=================================== */

if (navigator.userAgent.match(/IEMobile\/10\.0/)) {

  var msViewportStyle = document.createElement('style')

  msViewportStyle.appendChild(

    document.createTextNode(

      '@-ms-viewport{width:auto!important}'

    )

  )

  document.querySelector('head').appendChild(msViewportStyle)

}



/* =================================

===  STICKY NAV                 ====

=================================== */



jQuery(document).ready(function() {

  

  // Sticky Header - http://jqueryfordesigners.com/fixed-floating-elements/         

  var top = jQuery('#main-nav').offset().top - parseFloat(jQuery('#main-nav').css('margin-top').replace(/auto/, 0));

  

  jQuery(window).scroll(function (event) {

    // what the y position of the scroll is

    var y = jQuery(this).scrollTop();

    

    // whether that's below the form

    if (y >= top) {

      // if so, ad the fixed class

      jQuery('#main-nav').addClass('fixed');

    } else {

      // otherwise remove it

      jQuery('#main-nav').removeClass('fixed');

    }

  });

  

  

  jQuery('body:not(.home)').removeClass('custom-background');

  

});





/*=================================

===  SMOOTH SCROLL             ====

=================================== */

var scrollAnimationTime = 1200,

        scrollAnimation = 'easeInOutExpo';

    jQuery('a.scrollto').bind('click.smoothscroll',function (event) {

		

        event.preventDefault();

        var target = this.hash;

        jQuery('html, body').stop().animate({

            'scrollTop': jQuery(target).offset().top

        }, scrollAnimationTime, scrollAnimation, function () {

            window.location.hash = target;

        });

    });   



/* ================================

===  PARALLAX                  ====

================================= */

jQuery(document).ready(function(){

  var jQuerywindow = jQuery(window);

  jQuery('div[data-type="background"], header[data-type="background"], section[data-type="background"]').each(function(){

    var jQuerybgobj = jQuery(this);

    jQuery(window).scroll(function() {

      var yPos = -(jQuerywindow.scrollTop() / jQuerybgobj.data('speed'));

      var coords = '50% '+ yPos + 'px';

      jQuerybgobj.css({ 

        backgroundPosition: coords 

      });

    });

  });

});



/* ================================

===  KNOB                      ====

================================= */

jQuery(function() {

jQuery(".skill1").knob({

                'max':100,

                'width': 64,

                'readOnly':true,

                'inputColor':' #FFFFFF ',

                'bgColor':' #222222 ',

                'fgColor':' #e96656 '

                });

jQuery(".skill2").knob({

                'max':100,

                'width': 64,

                'readOnly':true,

                'inputColor':' #FFFFFF ',

                'bgColor':' #222222 ',

                'fgColor':' #34d293 '

                });

  jQuery(".skill3").knob({

                'max': 100,

                'width': 64,

                'readOnly': true,

                'inputColor':' #FFFFFF ',

                'bgColor':' #222222 ',

                'fgColor':' #3ab0e2 '

                });

  jQuery(".skill4").knob({

                'max': 100,

                'width': 64,

                'readOnly': true,

                'inputColor':' #FFFFFF ',

                'bgColor':' #222222 ',

                'fgColor':' #E7AC44 '

                });

});



/* ======================================

============ MOBILE NAV =============== */

jQuery('.navbar-toggle').on('click', function () {

  jQuery(this).toggleClass('active');

});

/* FOOTER */
jQuery(window).load(function() {
	
	/* vp_h will hold the height of the browser window */
	var vp_h = jQuery(window).height();
	
	/* b_g will hold the height of the html body */
	var b_g = jQuery('body').height();
	
	/* If the body height is lower than window */
	if(b_g < vp_h) {
		
		jQuery('footer').css("position","absolute");
		jQuery('footer').css("bottom","0px");
		jQuery('footer').css("width","100%");
		
	}
});	
