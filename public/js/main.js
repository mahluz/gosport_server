/*******************************************************************************

  Title: Service 4 Home
  Date: June 2013 

*******************************************************************************/

(function($) {

  var App = {

    /**
     * Init Function
     */
    init: function() {
      App.collapseNav();         
      App.homeHieght();
      App.fixedNavi();
      App.anchorSlide();
      App.isotopeInit();
      App.mouseparallax();    
      App.lightBox();
      App.parallaxScroll();
      App.contactForm();
    },

    collapseNav: function() {
       $('.nav a').on('click',function(){
	       $('.btn-navbar').click();
       });
    },
 
    /**
     * Home Screen Height
     */
    homeHieght: function() {
      var h = window.innerHeight;
      $('#head').height(h);

      $(window).resize(function(){
        var h = window.innerHeight;
        $('#head').height(h);
      });
    },


    /**
     * Navigation Fixed Position
     */
    fixedNavi: function() {
      var off = $('#navigation').offset().top;
      $(window).scroll(function () {
        var p = $(window).scrollTop();
        if ((p - 1)>off) {
          $('body').addClass('fx')
        } else {
          $('body').removeClass('fx');
        }
      });
    },


    /**
    * Navigation Fixed Position
    */
    contactForm: function() {
      //contact form init
      var options = {target: "#alert"}
      $("#contact-form").ajaxForm(options);
    },

 
 
 
 
    /**
     * Slide to next anchor navigation
     */
    anchorSlide: function() {
      $('#head .link, #navigation a, .arrow-up').on('click', function(e){
          var winW = $(window).innerWidth();
          var goTo = $(this).attr('href');
            navH = $('#navigation').height();
            mobilenavH = $('#nav-collapse').height();
          
          
        if ( winW < 980 ) {  
        $('html, body').animate({
          scrollTop: $(goTo).offset().top - navH + mobilenavH +5
        }, 1800, "easeInOutExpo");

                           } 
          
          else {
          
          $('html, body').animate({
          scrollTop: $(goTo).offset().top - navH +5
        }, 1800, "easeInOutExpo");

                } 
          
          e.preventDefault();  
      })
    },

 

     /**
     * Isotope init
     */
    isotopeInit: function() {


          $container = $("#isotope");
          
          $container.imagesLoaded(function(){
          $container.isotope({
            // options
            itemSelector : '.item',
            layoutMode : 'fitRows'
          });
          });                           




          // update columnWidth on window resize
          $(window).smartresize(function(){
            $container.isotope({
              // options
              itemSelector : '.item',
              layoutMode : 'fitRows'
            });
          });

          $('#filters a').on('click', function(e){
            var selector = $(this).attr('data-filter');
            $container.isotope({ filter: selector }, function() {
              $('[data-spy="scroll"]').each(function () {
                var $spy = $(this).scrollspy('refresh')
              });
            });
            e.preventDefault();
          });

    },

 
 
 
 
    /**
     * Lightbox init (fancybox 1)
     */
    mouseparallax: function() {
      $('#head').parallaxify({
          positionProperty: 'transform',
          motionType: 'natural',
          mouseMotionType: 'gaussian',
          responsive: true,
          useGyroscope: true,    
      });
    },

     
      
      
    /**
     * Lightbox init (fancybox 1)
     */
    lightBox: function() {
      $('#isotope a').fancybox();
    },

 
 
 
    /**
    * Parallax Scrolling
    */
    parallaxScroll: function() {
      var winH = $(window).innerHeight();       
      var winW = $(window).innerWidth();
      var galleryH = document.getElementById('isotope');       
      

      if ( winW > 1024 ) {
        // Cache the Window object
        $window = $(window);

        $('#head').each(function(){
          var $bgobj = $(this); // assigning the object

          $(window).scroll(function() {

            // Scroll the background at var speed
            // the yPos is a negative value because we're scrolling it UP!                
            var yPos = -($window.scrollTop() / 5); 

            // Put together our final background position
            var coords = 'center '+ yPos + 'px';

            // Move the background
            $bgobj.css({ backgroundPosition: coords });

          }); // window scroll Ends

        });

        $('#services header').each(function(){
          var $bgobj = $(this); // assigning the object

          $(window).scroll(function() {

            // Scroll the background at var speed
            // the yPos is a negative value because we're scrolling it UP!                
            var yPos = (($window.scrollTop()-winH) / -10)+100;

            // Put together our final background position
            var coords = 'center '+ yPos + 'px';

            // Move the background
            $bgobj.css({ backgroundPosition: coords });

          }); // window scroll Ends

        });
 

        $('#services header .parallax_services_back').each(function(){
        var $bgobj = $(this); // assigning the object

        $(window).scroll(function() {
                         
             // Scroll the background at var speed
             // the yPos is a negative value because we're scrolling it UP!
             var yPos = (($window.scrollTop()-winH) / 3)-670;
             
             // Put together our final background position
             var coords = 'center '+ yPos + 'px';
             
             // Move the background
             $bgobj.css({ backgroundPosition: coords });
             
             }); // window scroll Ends

        });
         
        $('#services header .parallax_services_middle').each(function(){
        var $bgobj = $(this); // assigning the object

        $(window).scroll(function() {
                         
             // Scroll the background at var speed
             // the yPos is a negative value because we're scrolling it UP!
             var yPos = (($window.scrollTop()-winH) / -7)+80;
             
             // Put together our final background position
             var coords = 'center '+ yPos + 'px';
             
             // Move the background
             $bgobj.css({ backgroundPosition: coords });
             
             }); // window scroll Ends

        });
         
        $('#services header .parallax_services_front').each(function(){
        var $bgobj = $(this); // assigning the object

        $(window).scroll(function() {
                       
            // Scroll the background at var speed
            // the yPos is a negative value because we're scrolling it UP!
            var yPos = (($window.scrollTop()-winH) / -3)+240;

            // Put together our final background position
            var coords = 'center '+ yPos + 'px';

            // Move the background
            $bgobj.css({ backgroundPosition: coords });

            }); // window scroll Ends

        });

         
         
        $('#pricing header .parallax_pricing_back').each(function(){
        var $bgobj = $(this); // assigning the object

        $(window).scroll(function() {
                         
            // Scroll the background at var speed
            // the yPos is a negative value because we're scrolling it UP!
            var yPos = (($window.scrollTop()-winH -galleryH.clientHeight) / 3)-1500;

            // Put together our final background position
            var coords = 'center '+ yPos + 'px';

            // Move the background
            $bgobj.css({ backgroundPosition: coords });

            }); // window scroll Ends

        });

        $('#pricing header .parallax_pricing_middle').each(function(){
          var $bgobj = $(this); // assigning the object
          
          $(window).scroll(function() {
                           
            // Scroll the background at var speed
            // the yPos is a negative value because we're scrolling it UP!
            var yPos = (($window.scrollTop()-winH -galleryH.clientHeight) / -7)+550;

            // Put together our final background position
            var coords = 'center '+ yPos + 'px';

            // Move the background
            $bgobj.css({ backgroundPosition: coords });

            }); // window scroll Ends
          
          });

        $('#pricing header .parallax_pricing_front').each(function(){
         var $bgobj = $(this); // assigning the object
         
         $(window).scroll(function() {
                          
            // Scroll the background at var speed
            // the yPos is a negative value because we're scrolling it UP!
            var yPos = (($window.scrollTop()-winH -galleryH.clientHeight) / -3)+1300;

            // Put together our final background position
            var coords = 'center '+ yPos + 'px';

            // Move the background
            $bgobj.css({ backgroundPosition: coords });

            }); // window scroll Ends
         
         });
         

        $('#pricing header').each(function(){
          var $bgobj = $(this); // assigning the object

          $(window).scroll(function() {

            // Scroll the background at var speed
            // the yPos is a negative value because we're scrolling it UP!                
            var yPos = -(($window.scrollTop()-winH -galleryH.clientHeight) / -10)-400;

            // Put together our final background position
            var coords = 'center '+ yPos + 'px';

            // Move the background
            $bgobj.css({ backgroundPosition: coords });

          }); // window scroll Ends

        });
      }
      
    }
    
  }
  
  
  $(function() {
    App.init();
  });
  

})(jQuery);