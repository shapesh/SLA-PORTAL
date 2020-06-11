$(document).ready(function(){

  $(".mobile-menu-icon.fa-bars").click(function(){
    
        $(".hidden-mobile").slideDown();
    });

    $(".mobile-menu-icon.fa-times").click(function(){
        $(".hidden-mobile").slideUp();
    });

    $(".search-icon.fa.fa-search").click(function(){
        $(".search-display").slideToggle();
        $(this).toggleClass('fa-search fa-times')
    });
    $(".mobile-droplist").click(function(){
        $(".mobile-dropdown").slideDown();
    });
    $(".mobile-droplist1").click(function(){
        $(".mobile-dropdown1").slideDown();
    });
    
    $(".forgot-p").click(function(){
        $(".forgot-password-wrapper").slideToggle();
    });

    $('.bxslider').bxSlider({adaptiveHeight:true, mode:'horizontal', auto:true, speed: 500,  pause: 6000});
    
        jQuery(document).ready(function($) {
  		$("#owl-example").owlCarousel({
  			navigation:true,
  			navigationText:false,
  			pagination:false,
  			autoPlay:	true
  		});
  });

    jQuery(document).ready(function($) {
        $("#owl-example1").owlCarousel({
            navigation:true,
            navigationText:false,
            pagination:false,
            autoPlay:   true
        });
  });

    $('select').niceSelect();

    $(function() {
    var Accordion = function(el, multiple) {
        this.el = el || {};
        this.multiple = multiple || false;

        // Variables privadas
        var links = this.el.find('.link');
        // Evento
        links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
    }

    Accordion.prototype.dropdown = function(e) {
        var $el = e.data.el;
        $this = $(this),
            $next = $this.next();

        $next.slideToggle();
        $this.parent().toggleClass('open');

        if (!e.data.multiple) {
            $el.find('.submenu').not($next).slideUp().parent().removeClass('open');
        };
    }

    var accordion = new Accordion($('#accordion'), false);
});

    $(function() {
    var Accordion = function(el, multiple) {
        this.el = el || {};
        this.multiple = multiple || false;

        // Variables privadas
        var links = this.el.find('.link2');
        // Evento
        links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
    }

    Accordion.prototype.dropdown = function(e) {
        var $el = e.data.el;
        $this = $(this),
            $next = $this.next();

        $next.slideToggle();
        $this.parent().toggleClass('open');

        if (!e.data.multiple) {
            $el.find('.submenu2').not($next).slideUp().parent().removeClass('open');
        };
    }

    var accordion = new Accordion($('#accordion'), false);
});


    // Show or hide the sticky footer button
     $(window).scroll(function() {
       if ($(this).scrollTop() > 200) {
         $('.go-top').fadeIn(200);
       } else {
         $('.go-top').fadeOut(200);
       }
     });
     

     // Animate the scroll to top
			$('.go-top').click(function(event) {
				event.preventDefault();

				$('html, body').animate({scrollTop: 0}, 300);
			})

     $('#horizontalTab').easyResponsiveTabs({
                 type: 'default', //Types: default, vertical, accordion
                 width: 'auto', //auto or any width like 600px
                 fit: true,   // 100% fit in a container
                 closed: 'accordion', // Start closed if in accordion view
                 activate: function(event) { // Callback function if tab is switched
                     var $tab = $(this);
                     var $info = $('#tabInfo');
                     var $name = $('span', $info);

                     $name.text($tab.text());

                     $info.show();
                 }
             });
             
             
    $(window).on('load', function() {
          $('.slider').bxSlider();
    })

});

// new AnimOnScroll( document.getElementById( 'grid' ), {
// minDuration : 0.4,
// maxDuration : 0.7,
// viewportFactor : 0.2
// } );

// new WOW().init();
