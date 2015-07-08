(function($){

   	// Preloader
   	$(window).load(function() {
       	$('#status').fadeOut();
        $('#preloader').delay(350).fadeOut('slow');
        $('body').delay(350).css({'overflow':'visible'});
    });

	$(document).ready(function() {

		// Image background
		$.vegas({
            src:'/assets/images/bg1.jpg'
        });

		var countdown =  $('.countdown-time');

		createTimeCicles();

		$(window).on('resize', windowSize);

		function windowSize(){
			countdown.TimeCircles().destroy();
		    createTimeCicles();
			countdown.on('webkitAnimationEnd mozAnimationEnd oAnimationEnd animationEnd', function() {
        		countdown.removeClass('animated bounceIn');
        	});
		}

		// TimeCicles - Create and Options
		function createTimeCicles() {
			countdown.addClass('animated bounceIn');
			countdown.TimeCircles({
				bg_width: 1,
    			fg_width: 0.04,
				circle_bg_color: 'transparent',
				time: {
    				    Days: {color: '#14c998'}
    			,	   Hours: {color: '#14c998'}
    			,	 Minutes: {color: '#14c998'}
    			,	 Seconds: {color: '#14c998'}
    			,	 Seconds: {color: '#14c998'}
    			}
			});
			countdown.on('webkitAnimationEnd mozAnimationEnd oAnimationEnd animationEnd', function() {
        		countdown.removeClass('animated bounceIn');
        	});
		}

		// Open modal window on click
		$('.more-links a').on('click', function(e) {
			var mainInner = $('.overlay'),
				modal = $('#' + $(this).attr('data-modal'));

			mainInner.animate({opacity: 0}, 400, function(){
				$('html,body').scrollTop(0);
				modal.addClass('active').fadeIn(400);
				countdown.TimeCircles().destroy();
			});
			e.preventDefault();

			$('.modal-close').on('click', function(e) {
				modal.removeClass('active').fadeOut(400, function(){
					mainInner.animate({opacity: 1}, 400);
		       		createTimeCicles();
					countdown.on('webkitAnimationEnd mozAnimationEnd oAnimationEnd animationEnd', function() {
        				countdown.removeClass('animated bounceIn');
        			});
				});
				e.preventDefault();
			});
		});

		// Tooltips
		$('.more-links a, .social a').tooltip();

		$('.more-links a, .social a').on('click', function () {
			$(this).tooltip('hide')
		});

	});
})(jQuery);
