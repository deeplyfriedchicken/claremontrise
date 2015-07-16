<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <link rel="shortcut icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
	  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
    <link href="{{ URL::asset('/assets/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="{{ URL::asset('/assets/css/animate.css') }}" rel="stylesheet" media="screen">
    <link href="{{ URL::asset('/assets/css/style.css') }}" rel="stylesheet" media="screen">
</head>
<style>
  .error {
    text-align: center;
  }
</style>
@yield('style')
<body>

  <div id="preloader">
      <div id="status">
        <div class="status-area"></div>
      </div>
  </div>

	<div class="layout">
		<div class="container">
      <span class="pull-right navigate">@yield('navigate')</span>
			<div class="main">
				<div class="overlay">
          <div class="pagination-centered">
            <div class="logo"></div>
          </div>

					<h1 class="title">@yield('h1-title')</h1>

					<div class="slogan">
						@yield('slogan')
					</div>

					<div class="countdown-time animated fadeInUp" data-date="2015-08-20 06:00:00" data-timer="900"></div>
          @yield('button')
					<div class="social">
						<ul class="list-inline">
							<li><a href="#" data-toggle="tooltip" data-placement="top" title="GitHub"><i class="fa fa-github"></i></a></li>
							<li><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#" data-toggle="tooltip" data-placement="top" title="Flickr"><i class="fa fa-flickr"></i></a></li>
							<li><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a></li>
							<li><a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
						</ul>
					</div>
          <div>
            <p class="text-center">Created in 2015</p>
          </div>

				</div>
			</div>
		</div>
      @yield('popup')
	</div>

   	<script type="text/javascript" src="{{ URL::asset('/assets/js/jquery-1.11.0.min.js') }}"></script>
   	<script type="text/javascript" src="{{ URL::asset('/assets/js/bootstrap.min.js') }}"></script>
   	<script type="text/javascript" src="{{ URL::asset('/assets/js/countdown.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/assets/js/jquery.vegas.min.js') }}"></script>
    <script>
    (function($){

        // Preloader
        $(window).load(function() {
            $('#status').fadeOut();
            $('#preloader').delay(350).fadeOut('slow');
            $('body').delay(350).css({'overflow':'visible'});
        });

      $(document).ready(function() {

        // Image background
        @yield('background')

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
    </script>
    @yield('error')
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-65186134-1', 'auto');
      ga('send', 'pageview');

    </script>
</body>

</html>
