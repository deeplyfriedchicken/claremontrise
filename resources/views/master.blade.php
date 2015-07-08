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

					<div class="countdown-time animated fadeInUp" data-date="2016-01-01 00:00:00" data-timer="900"></div>
					<div class="more-links">
						<a href="#" data-modal="contact">Contact</a>
						<a href="#" data-modal="subscribe">Subscribe</a>
					</div>
					<div class="social">
						<ul class="list-inline">
							<li><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#" data-toggle="tooltip" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a></li>
							<li><a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
						</ul>
					</div>

				</div>
			</div>
		</div>

		<div id="contact" class="new-modal">
			<div class="container">
				<div class="main">

					<div class="close">
						<a href="#" class="modal-close"><i class="fa fa-times"></i></a>
					</div>

					<div class="title">
						<h2>Contact</h2>
					</div>
					<div class="row">
					<div class="row">
						<div class="forms">
							<form>
								<div class="form-group">
									<label class="sr-only" for="name">Name</label>
									<input type="text" class="form-control" id="name" placeholder="Name" required="required">
								</div>
								<div class="form-group">
									<label class="sr-only" for="email">Email</label>
									<input type="email" class="form-control" id="email" placeholder="Email" required="required">
								</div>
								<div class="form-group">
									<label class="sr-only" for="object">Email</label>
									<input type="text" class="form-control" id="object" placeholder="Object" required="required">
								</div>
								<div class="form-group">
									<textarea class="form-control" id="message" placeholder="Message" rows="3" required="required"></textarea>
								</div>
								<button type="submit" class="btn btn-lg btn-default">SEND</button>
							</form>
						</div>
					</div>
					</div>


				</div>
			</div>
		</div>

		<div id="subscribe" class="new-modal">
			<div class="container">
				<div class="main">

					<div class="close">
						<a href="#" class="modal-close"><i class="fa fa-times"></i></a>
					</div>

					<div class="title">
						<h2>Subscribe</h2>
					</div>

					<div class="slogan">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					</div>

					<div class="forms">
						<form>
							<div class="form-group">
								<input type="email" class="form-control" id="subscribe-email" placeholder="Email address" required="required">
								<button class="btn btn-lg btn-default" type="submit">Subscribe</button>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>

   	<script type="text/javascript" src="{{ URL::asset('/assets/js/jquery-1.11.0.min.js') }}"></script>
   	<script type="text/javascript" src="{{ URL::asset('/assets/js/bootstrap.min.js') }}"></script>
   	<script type="text/javascript" src="{{ URL::asset('/assets/js/countdown.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/assets/js/jquery.vegas.min.js') }}"></script>
   	<script type="text/javascript" src="{{ URL::asset('/assets/js/scripts.js') }}"></script>
</body>

</html>
