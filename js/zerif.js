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


/*** DROPDOWN FOR MOBILE MENU */
var callback_mobile_dropdown = function () {

  var navLi = jQuery('#site-navigation li');

    navLi.each(function(){
        if ( jQuery(this).find('ul').length > 0 && !jQuery(this).hasClass('has_children') ){
            jQuery(this).addClass('has_children');
            jQuery(this).find('a').first().after('<p class="dropdownmenu"></p>');
        }
    });
    jQuery('.dropdownmenu').click(function(){
        if( jQuery(this).parent('li').hasClass('this-open') ){
            jQuery(this).parent('li').removeClass('this-open');
        }else{
            jQuery(this).parent('li').addClass('this-open');
        }
    });
    
    navLi.find('a').click(function(){
      jQuery('.navbar-toggle').addClass('collapsed');
        jQuery('.collapse').removeClass('in'); 
    });

};
jQuery(document).ready(callback_mobile_dropdown);


jQuery(document).ready(function() {
	var current_height = jQuery('.header .container').height();
	jQuery('.header').css('min-height',current_height);
	
});


/* show/hide reCaptcha */
jQuery(document).ready(function() {

  var thisOpen = false;
  jQuery('.contact-form .form-control').each(function(){
    if ( jQuery(this).val().length > 0 ){
      thisOpen = true;
      jQuery('.g-recaptcha').css('display','block').delay(1000).css('opacity','1');
      return false;
    }
  });
  if ( thisOpen == false && (typeof jQuery('.contact-form textarea').val() != 'undefined') && (jQuery('.contact-form textarea').val().length > 0) ) {
    thisOpen = true;
    jQuery('.g-recaptcha').css('display','block').delay(1000).css('opacity','1');
  }
  jQuery('.contact-form input, .contact-form textarea').focus(function(){
    if ( !jQuery('.g-recaptcha').hasClass('recaptcha-display') ) {
        jQuery('.g-recaptcha').css('display','block').delay(1000).css('opacity','1');
    }
  });

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


/* SETS THE HEADER HEIGHT */
jQuery(window).load(function(){
  setminHeightHeader();
});
jQuery(window).resize(function() {
  setminHeightHeader();
  closeMenu();
});
function setminHeightHeader() 
{
  jQuery('#main-nav').css('min-height','75px');
  jQuery('.header').css('min-height','75px');
  var minHeight = parseInt( jQuery('#main-nav').height() );
  jQuery('#main-nav').css('min-height',minHeight);
  jQuery('.header').css('min-height',minHeight);
}
function closeMenu()
{
  jQuery( '.collapse.in').removeClass('in');
  jQuery( '.navbar-toggle.collapsed').removeClass('collapsed');
}
/* - */


/* STICKY FOOTER */
jQuery(window).load(function(){
  fixFooterBottom();
});
jQuery(window).resize(function() {
  fixFooterBottom();
});

function fixFooterBottom(){

  var header      = jQuery('header.header');
  var footer      = jQuery('footer#footer');
  var content     = jQuery('.site-content > .container');

  content.css('min-height', '1px');

  var headerHeight  = header.outerHeight();
  var footerHeight  = footer.outerHeight();
  var contentHeight = content.outerHeight();
  var windowHeight  = jQuery(window).height();

  var totalHeight = headerHeight + footerHeight + contentHeight;

  if (totalHeight<windowHeight){
    content.css('min-height', windowHeight - headerHeight - footerHeight );
  }else{
    content.css('min-height','1px');
  }
}


/*** CENTERED MENU */
var callback_menu_align = function () {

  var headerWrap    = jQuery('.header');
  var navWrap     = jQuery('#site-navigation');
  var logoWrap    = jQuery('.responsive-logo');
  var containerWrap   = jQuery('.container');
  var classToAdd    = 'menu-align-center';

  if ( headerWrap.hasClass(classToAdd) ) 
  {
        headerWrap.removeClass(classToAdd);
  }
    var logoWidth     = logoWrap.outerWidth();
    var menuWidth     = navWrap.outerWidth();
    var containerWidth  = containerWrap.width();

    if ( menuWidth + logoWidth > containerWidth ) {
        headerWrap.addClass(classToAdd);
    }
    else
    {
        if ( headerWrap.hasClass(classToAdd) )
        {
            headerWrap.removeClass(classToAdd);
        }
    }
}
jQuery(window).load(callback_menu_align);
jQuery(window).resize(callback_menu_align);
