/*

                       _ _ _____                      _   _

                      | | |  __ \                    | | (_)

    ___  ___ _ __ ___ | | | |__) |_____   _____  __ _| |  _ ___

   / __|/ __| '__/ _ \| | |  _  // _ \ \ / / _ \/ _` | | | / __|

   \__ \ (__| | | (_) | | | | \ \  __/\ V /  __/ (_| | |_| \__ \

   |___/\___|_|  \___/|_|_|_|  \_\___| \_/ \___|\__,_|_(_) |___/

                                                        _/ |

                                                       |__/



    "Declarative on-scroll reveal animations."

    scrollReveal.js is inspired by cbpScroller.js, © 2014, Codrops.



    Licensed under the MIT license.

    http://www.opensource.org/licenses/mit-license.php



    scrollReveal.js, © 2014 https://twitter.com/julianlloyd

*/

!function(t){"use strict";function e(){var e=o.clientHeight,i=t.innerHeight;return i>e?i:e}function i(t){var e=0,i=0;do isNaN(t.offsetTop)||(e+=t.offsetTop),isNaN(t.offsetLeft)||(i+=t.offsetLeft);while(t=t.offsetParent);return{top:e,left:i}}function a(a,n){var r=t.pageYOffset,o=r+e(),s=a.offsetHeight,l=i(a).top,u=l+s,n=n||0;return o>=l+s*n&&u>=r}function n(t,e){for(var i in e)e.hasOwnProperty(i)&&(t[i]=e[i]);return t}function r(t){this.options=n(this.defaults,t),this._init()}var o=t.document.documentElement;r.prototype={defaults:{axis:"y",distance:"60px",duration:"0.55s",delay:"0.15s",viewportFactor:.33},_init:function(){var e=this;this.elems=Array.prototype.slice.call(o.querySelectorAll("[data-scrollReveal]")),this.scrolled=!1,this.elems.forEach(function(t){e.animate(t)});var i=function(){e.scrolled||(e.scrolled=!0,setTimeout(function(){e._scrollPage()},60))},a=function(){function t(){e._scrollPage(),e.resizeTimeout=null}e.resizeTimeout&&clearTimeout(e.resizeTimeout),e.resizeTimeout=setTimeout(t,200)};t.addEventListener("scroll",i,!1),t.addEventListener("resize",a,!1)},_scrollPage:function(){var t=this;this.elems.forEach(function(e){a(e,t.options.viewportFactor)&&t.animate(e)}),this.scrolled=!1},parseLanguage:function(t){function e(t){var e=[],i=["from","the","and","then","but"];return t.forEach(function(t){i.indexOf(t)>-1||e.push(t)}),e}var i,a=t.getAttribute("data-scrollreveal").split(/[, ]+/),n={};return a=e(a),a.forEach(function(t,e){switch(t){case"enter":return i=a[e+1],("top"==i||"bottom"==i)&&(n.axis="y"),void(("left"==i||"right"==i)&&(n.axis="x"));case"after":return void(n.delay=a[e+1]);case"wait":return void(n.delay=a[e+1]);case"move":return void(n.distance=a[e+1]);case"over":return void(n.duration=a[e+1]);case"trigger":return void(n.eventName=a[e+1]);default:return}}),("top"==i||"left"==i)&&(n.distance="-"+this.options.distance),n},genCSS:function(t){var e=this.parseLanguage(t),i=e.distance||this.options.distance,a=e.duration||this.options.duration,n=e.delay||this.options.delay,r=e.axis||this.options.axis,o="-webkit-transition: all "+a+" ease "+n+";-moz-transition: all "+a+" ease "+n+";-o-transition: all "+a+" ease "+n+";-ms-transition: all "+a+" ease "+n+";transition: all "+a+" ease "+n+";",s="-webkit-transform: translate"+r+"("+i+");-moz-transform: translate"+r+"("+i+");-ms-transform: translate"+r+"("+i+");transform: translate"+r+"("+i+");opacity: 0;",l="-webkit-transform: translate"+r+"(0);-moz-transform: translate"+r+"(0);-ms-transform: translate"+r+"(0);transform: translate"+r+"(0);opacity: 1;";return{transition:o,initial:s,target:l,totalDuration:1e3*(parseFloat(a)+parseFloat(n))}},animate:function(t){var e=this.genCSS(t);t.getAttribute("data-sr-init")||(t.setAttribute("style",e.initial),t.setAttribute("data-sr-init",!0)),t.getAttribute("data-sr-complete")||a(t,this.options.viewportFactor)&&(t.setAttribute("style",e.target+e.transition),setTimeout(function(){t.removeAttribute("style"),t.setAttribute("data-sr-complete",!0)},e.totalDuration))}},document.addEventListener("DOMContentLoaded",function(){t.scrollReveal=new r})}(window);