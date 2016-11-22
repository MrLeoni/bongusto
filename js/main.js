$(document).ready(function() {
  
  /*--------------------------------
  // Mobile navigation engine
  --------------------------------*/
  
  $("#js-mobile-btn").click(function() {
    
    // Toggle class in #js-mobile-btn
    // When "active" is placed, the icon changes to a times icon and the navigation apears
    $(this).toggleClass("active");
    
    // Creating a boolean variable to check if #js-mobile-btn has or not the "active" class
    var btnHasClass = $(this).hasClass("active");
    
    // Store elements in variables
    var siteMenu = $(".site-menu");
    var navMenu = $(".nav-links");
    var navLinks = $(".js-navigation");
    
    if (btnHasClass) {
      // If #js-mobile-btn is active
      
      // Check the device screen height, if is smaller than 460px, apply
      // height 100% to the header, this allow the user to scroll down
      // the menu.
      if($(window).height() < 460) {
        siteMenu.css("height", "100%");
        // Lock scroll on body when has scroll in the mani manu
        $("body").addClass("not-scroll");
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
      $("body").removeClass("not-scroll");
    }
    
  });
  
  
  /*--------------------------------
  // Home Products Carrossel
  //
  // Credit: bxSlider
  --------------------------------*/
  
  $(".products-carrossel").bxSlider({
    pager: false,
    slideWidth: 260,
    minSlides: 1,
    maxSlides: 4,
    moveSlides: 1,
    slideMargin: 30
  });
  
  
  /*--------------------------------
  // Parallax Engine
  //
  // Credit: Tableless
  --------------------------------*/
  
  $('.parallax').each(function(){
  	var $obj = $(this);
  	$(window).scroll(function() {
  		var yPos = -($(window).scrollTop() / $obj.data('speed')); 
  		var bgpos = '50% '+ yPos + 'px';
  		$obj.css('background-position', bgpos );
  	}); 
  });
  
  /*--------------------------------
  // Print Recipes
  --------------------------------*/
  
  $("#js-print").click(function() {
  	window.print();
  });
  
});