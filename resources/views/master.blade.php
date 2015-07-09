<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
    <link href="{{ URL::asset('/assets/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="{{ URL::asset('/assets/css/animate.css') }}" rel="stylesheet" media="screen">
    <link href="{{ URL::asset('/assets/css/style.css') }}" rel="stylesheet" media="screen">
</head>
@yield('style')
<body>

  <div id="preloader">
      <div id="status">
        <div class="status-area"></div>
      </div>
  </div>

	<div class="layout">
		<div class="container">
			<div class="main">
				<div class="overlay">

					<div class="logo"></div>

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
   	<script type="text/javascript" src="{{ URL::asset('/assets/js/scripts.js') }}"></script>
</body>

</html>
