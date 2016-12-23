/*!
 * Bongusto Script v1.0.0
 * Licensed ISC
 */

jQuery(document).ready(function() {
  
  /*--------------------------------
  // Mobile navigation engine
  --------------------------------*/
  
  jQuery("#js-mobile-btn").click(function() {
    
    // Toggle class in #js-mobile-btn
    // When "active" is placed, the icon changes to a times icon and the navigation apears
    jQuery(this).toggleClass("active");
    
    // Creating a boolean variable to check if #js-mobile-btn has or not the "active" class
    var btnHasClass = jQuery(this).hasClass("active");
    
    // Store elements in variables
    var siteMenu = jQuery(".site-menu");
    var navMenu = jQuery(".nav-links");
    var navLinks = jQuery(".js-navigation");
    
    if (btnHasClass) {
      // If #js-mobile-btn is active
      
      // Check the device screen height, if is smaller than 460px, apply
      // height 100% to the header, this allow the user to scroll down
      // the menu.
      if(jQuery(window).height() < 460) {
        siteMenu.css("height", "100%");
        // Lock scroll on body when has scroll in the mani manu
        jQuery("body").addClass("not-scroll");
      }
      
      // Apply an animation to slide down the menu and when its is complete
      // call a function to change opacity of the links to "1"
      navMenu.slideDown(300, function() {
        navLinks.animate({opacity: "1"}, 200);
      });
      
    } else {
      // If it's not active
      
      // Change the height of the header for "auto" so the header wont
      // get in the front of the site
      siteMenu.css("height", "auto");
      
      // Apply a animation to change opacity of the links to "0" and
      // whens its completed call a function to slideUp the menu
      navLinks.animate({opacity: "0"}, 200, function() {
        navMenu.slideUp(300);
      });
      
      // Remove "scroll lock"
      jQuery("body").removeClass("not-scroll");
    }
    
  });
  
  
  /*--------------------------------
  // Home Products Carrossel
  //
  // Credit: bxSlider
  --------------------------------*/
  
  // Function to determine the size of slideWidth.
  var itemWidth = function(screen) {
  	// Take a parameter and check if its small than 460 or 320
  	// and than return a value
  	
  	if( screen < 460 ) {
  		size = 390;
  	} else if ( screen < 320 ) {
  		size = 300
  	} else {
  		// Default value to be return
  		size = 260;
  	}
  	
  	return size;
  }
  
  jQuery(".products-carrossel").bxSlider({
    pager: false,
    slideWidth: itemWidth(jQuery(window).width()) /* Call function and pass window object width as a parameter */,
    minSlides: 1,
    maxSlides: 4,
    moveSlides: 1,
    slideMargin: 30
  });
  
  
  /*--------------------------------
  // Banner Slider
  //
  // Credit: bxSlider
  --------------------------------*/
  
  jQuery('.banner-slider').bxSlider({
  	controls: false,
  	auto: true,
  	speed: 800,
  	pause: 7000,
  	autoHover: true,
  });
  
  /*--------------------------------
  // Home About Slider
  //
  // Credit: bxSlider
  --------------------------------*/
  
  jQuery('.about-img-slider').bxSlider({
  	mode: 'fade',
  	controls: false,
  	auto: true,
  	speed: 800,
  	pause: 7000,
  	autoHover: true
  });
  
  /*--------------------------------
  // Parallax Engine
  //
  // Credit: Tableless
  --------------------------------*/
  
  jQuery('.parallax').each(function(){
  	var jQueryobj = jQuery(this);
  	var windowWidth = jQuery(window).width();
  	
  	// Apply parallax effect only in screens and devices with more than 1200px
  	if(windowWidth < 1200) {
  		
  		// Empty
  		
  	} else {
  	
	  	jQuery(window).scroll(function() {
	  		var yPos = -(jQuery(window).scrollTop() / jQueryobj.data('speed')); 
	  		var bgpos = '50% '+ yPos + 'px';
	  		jQueryobj.css('background-position', bgpos );
	  	}); 
  	
  	}
  	
  });
  
  
  /*--------------------------------
  // Print Recipes
  --------------------------------*/
  
  jQuery("#js-print").click(function() {
  	window.print();
  });
  
});