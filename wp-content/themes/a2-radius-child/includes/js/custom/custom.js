jQuery(document).ready(function( $ ) {

		//Mobile Menu Toggle
		$('.menu-toggle').click(function() {
		  $('.header-right').slideToggle();
		  $('.social-dash').slideUp();
		  return false;
		});


		//Flexslider
		$('#header-slider').flexslider({
			start: function(slider) {
				if (slider.count == 1) {
					$('.flex-control-nav, .flex-direction-nav').hide();
				}
			},
			slideshow: false,
			animationDuration: 200
		});

		$('.flexslider').flexslider({
			animationDuration: 200
		});


		// Add Lightbox To Slides
		$('.single .slides li a,.gallery-icon a').addClass('view');
	 	$('.single .slides li a,.gallery-icon a').attr('rel', 'lightbox');

		//FitVids
		$('iframe').wrap("<div class='fitvid'/>");
		$('.fitvid').fitVids();


		//Video iFrame Fix
		$('.post iframe').each(function(){
	        var url = $(this).attr('src');
	        $(this).attr('src',url+'?wmode=opaque');
	    })


		//Add Mobile Class To Body
		function checkWindowSize() {
		    if ( $(window).width() < 680 ) {
		        $('body').addClass('mobile');
		        $('body').removeClass('desktop');
		        $('.header-wrapper').after($('.header-right'));
		    }
		    else {
		        $('body').removeClass('mobile');
		        $('body').addClass('desktop');
		        $('.header-toggles').after($('.header-right'));
		        $('.header-right').show();
		    }
		}
		$(window).load(checkWindowSize);
		$(window).resize(checkWindowSize);

		//Append Social Dash Link
		$('.nav-dash-toggle').show();
		$('.nav-dash-toggle').appendTo('.nav-top ul:first-child');

		//Hide Dash / Toggle
		$('.social-dash').hide();
		$('.dash-toggle').click(function() {
		  $('.social-dash').slideToggle();
		  $('.mobile .header-right').slideUp();
		  $('.desktop .nav-dash-toggle').toggleClass('dash-active');
		  return false;
		});


    //Service Box Sizing
    $(window).resize( function() {
        var $column = $('.column-wrap'),
            maxHeight = 0;

        $column.each( function(index, value) {

            if(index % 3 == 0 && index > 0) {
              $column.slice(index-3, index).height(maxHeight);
              maxHeight = 0;
            }

            if($(this).height() > maxHeight) {
                maxHeight = $(this).height();
            }

        });

        var lastIndex = $column.length-1;

        $column.slice(lastIndex - lastIndex % 3).height(maxHeight);

    }).trigger('resize');

});
