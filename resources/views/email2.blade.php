<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<!-- If you delete this meta tag, Earth will fall into the sun. -->
<meta name="viewport" content="width=device-width" />

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Claremont Rise Issue {{ $id }}</title>

</head>
<style>
  /* -------------------------------------
      GLOBAL
  ------------------------------------- */
  * {
    margin:0;
    padding:0;
  }
  * { font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; }

  img {
    max-width: 100%;
  }
  .collapse {
    margin:0;
    padding:0;
  }
  body {
    -webkit-font-smoothing:antialiased;
    -webkit-text-size-adjust:none;
    width: 100%!important;
    height: 100%;
  }


  /* -------------------------------------
      ELEMENTS
  ------------------------------------- */
  a { color: #2BA6CB;}

  .btn {
    text-decoration:none;
    color: #FFF;
    background-color: #666;
    padding:10px 16px;
    font-weight:bold;
    margin-right:10px;
    text-align:center;
    cursor:pointer;
    display: inline-block;
  }

  p.callout {
    padding:15px;
    background-color:#ECF8FF;
    margin-bottom: 15px;
  }
  .callout a {
    font-weight:bold;
    color: #2BA6CB;
  }

  table.social {
  /* 	padding:15px; */
    background-color: #ebebeb;

  }
  .social .soc-btn {
    padding: 3px 7px;
    font-size:12px;
    margin-bottom:10px;
    text-decoration:none;
    color: #FFF;font-weight:bold;
    display:block;
    text-align:center;
  }
  a.fb { background-color: #3B5998!important; }
  a.tw { background-color: #1daced!important; }
  a.gp { background-color: #DB4A39!important; }
  a.ms { background-color: #000!important; }

  .sidebar .soc-btn {
    display:block;
    width:100%;
  }

  /* -------------------------------------
      HEADER
  ------------------------------------- */
  table.head-wrap { width: 100%;}

  .header.container table td.logo { padding: 15px; }
  .header.container table td.label { padding: 15px; padding-left:0px;}


  /* -------------------------------------
      BODY
  ------------------------------------- */
  table.body-wrap { width: 100%;}


  /* -------------------------------------
      FOOTER
  ------------------------------------- */
  table.footer-wrap { width: 100%;	clear:both!important;
  }
  .footer-wrap .container td.content  p { border-top: 1px solid rgb(215,215,215); padding-top:15px;}
  .footer-wrap .container td.content p {
    font-size:10px;
    font-weight: bold;

  }


  /* -------------------------------------
      TYPOGRAPHY
  ------------------------------------- */
  h1,h2,h3,h4,h5,h6 {
  font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; line-height: 1.1; margin-bottom:15px; color:#000;
  }
  h1 small, h2 small, h3 small, h4 small, h5 small, h6 small { font-size: 60%; color: #6f6f6f; line-height: 0; text-transform: none; }

  h1 { font-weight:200; font-size: 44px;}
  h2 { font-weight:200; font-size: 37px;}
  h3 { font-weight:500; font-size: 27px;}
  h4 { font-weight:500; font-size: 23px;}
  h5 { font-weight:900; font-size: 17px;}
  h6 { font-weight:900; font-size: 14px; text-transform: uppercase; color:#000;}
  .weather-today { font-weight:900; font-size: 14px; text-transform: uppercase; color:#fff;}
  .weather-info { font-weight:500; font-size: 14px; text-transform: uppercase; color:#fff;}
  .date { font-weight:900; font-size: 16px; text-transform: uppercase; color:#fff; }
  .cms { background-color:#9B2335, text-align:center; font-weight:900; font-size: 18px; text-transform: uppercase; }
  .pp { background-color:#f78a0b, text-align:center; font-weight:900; font-size: 18px; text-transform: uppercase; }

  .collapse { margin:0!important;}

  p, ul {
    margin-bottom: 10px;
    font-weight: normal;
    font-size:14px;
    line-height:1.6;
  }
  p.lead { font-size:17px; }
  p.last { margin-bottom:0px;}

  ul li {
    margin-left:5px;
    list-style-position: inside;
  }

  /* -------------------------------------
      SIDEBAR
  ------------------------------------- */
  ul.sidebar {
    background:#ebebeb;
    display:block;
    list-style-type: none;
  }
  ul.sidebar li { display: block; margin:0;}
  ul.sidebar li a {
    text-decoration:none;
    color: #666;
    padding:10px 16px;
  /* 	font-weight:bold; */
    margin-right:10px;
  /* 	text-align:center; */
    cursor:pointer;
    border-bottom: 1px solid #777777;
    border-top: 1px solid #FFFFFF;
    display:block;
    margin:0;
  }
  ul.sidebar li a.last { border-bottom-width:0px;}
  ul.sidebar li a h1,ul.sidebar li a h2,ul.sidebar li a h3,ul.sidebar li a h4,ul.sidebar li a h5,ul.sidebar li a h6,ul.sidebar li a p { margin-bottom:0!important;}



  /* ---------------------------------------------------
      RESPONSIVENESS
      Nuke it from orbit. It's the only way to be sure.
  ------------------------------------------------------ */

  /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
  .container {
    display:block!important;
    max-width:600px!important;
    margin:0 auto!important; /* makes it centered */
    clear:both!important;
  }

  /* This should also be a block element, so that it will fill 100% of the .container */
  .content {
    padding:15px;
    max-width:600px;
    margin:0 auto;
    display:block;
  }

  /* Let's make sure tables in the content area are 100% wide */
  .content table { width: 100%; }


  /* Odds and ends */
  .column {
    width: 290px;
    float:left;
    padding-left: 10px;
  }
  .column tr td { padding: 15px; }
  .column-wrap {
    padding:0!important;
    margin:0 auto;
    max-width:600px!important;
  }
  .column table { width:100%;}
  .social .column {
    width: 280px;
    min-width: 279px;
    float:left;
  }
  /* This should also be a block element, so that it will fill 100% of the .container */
	.content {
	padding:15px;
	max-width:600px;
	margin:0 auto;
	display:block;
	}

  /* Be sure to place a .clear element after each set of columns, just to be safe */
  .clear { display: block; clear: both; }

  .social {
    width:0px;
  }
  .social img {
    height: 50px;
    width: 50px;
    padding:1px;
  }
  .connect tr td {
    padding:0px;
  }
  .connect-title {
    margin-bottom: 10px;
  }


  /* -------------------------------------------
      PHONE
      For clients that support media queries.
      Nothing fancy.
  -------------------------------------------- */
  @media only screen and (max-width: 600px) {

    a[class="btn"] { display:block!important; margin-bottom:10px!important; background-image:none!important; margin-right:0!important;}

    div[class="column"] { width: auto!important; float:none!important;}

    table.social div[class="column"] {
      width:auto!important;
    }

  }
</style>

<body bgcolor="#FFFFFF" topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">

<!-- HEADER -->
<table class="head-wrap" bgcolor="#9B2335">
	<tr>
		<td></td>
		<td class="header container" >

				<div class="content">
				<table bgcolor="#9B2335">
					<tr>
						<td><img src="https://dl.dropboxusercontent.com/u/48479368/images/riselight-email.png" /><h4 class="date">{{ substr($date,0,10) }}</h4></td>
						<td align="right"><h6 class="collapse weather-today">Today's Weather</h6><img style="float:right;" height=50 src="@foreach($icons as $icon)
              @if($icon->name == $weather[0]->icon)
              {{ $icon->imgUrl }}
              @endif
              @endforeach"><p class="weather-info" style="float: right;">Hi: {{$weather[0]->max}}&deg;<br>Lo: {{$weather[0]->min}}&deg;</p></td>
					</tr>
				</table>
				</div>

		</td>
		<td></td>
	</tr>
</table><!-- /HEADER -->

<!-- BODY -->
<table class="body-wrap">
	<tr>
		<td></td>
		<td class="container" bgcolor="#FFFFFF">
      <div class="content" style="padding-bottom:0px;">
        <table>
          <tr>
            <td>
              <h4>Hey, CMC</h4>
              <p class="lead">Here at Claremont Rise we bring you what you're too lazy to check on yourself because, college.</p>
            </td>
          </tr>
        </table>
      </div>

			<div class="column-wrap">

				<div class="column">
				<table>
				<tr>
					<td>
            <h5 style="font-size:18px;">Events Around Campus <img src="https://dl.dropboxusercontent.com/u/48479368/images/cmclogo.png" height=30></h5>
            @if($events)
            <ul>
              @foreach($events as $event)
                <li>{{ $event->title }} @ <?php $time = strtotime($event->time1); echo date('h:i A', $time);?></li>
              @endforeach
            </ul>
            @endif
            <h5>Games Today</h5>
            <h6 class="cms" style="text-align:center; background-color:#9B2335;"><a href="http://www.cmsathletics.org/composite" style="text-decoration:none; color:#f7c506;">CMS</a></h6>
            <ul>
            @if($cms)
              @foreach($cms as $game)
                  <li>{{ $game->team }} <?php if(strpos($game->opponent, 'at ') !== false){}elseif(strpos($game->opponent, 'vs') !== false){}else{ echo "-"; }?> {{ $game->opponent }} @ <?php $time = strtotime($game->time_start); echo date('h:i A', $time); ?> </li>
              @endforeach
            @else
              <li>No Games Today</li>
            @endif
            <ul>
              <br>
            <h6 class="pp" style="text-align:center; background-color:#f78a0b;"><a href="http://www.pe.pomona.edu/composite" style="text-decoration:none; color:#0e3c70;">Pomona Pitzer</a></h6>
            <ul>
            @if($pp)
              @foreach($pp as $game)
                  <li>{{ $game->team }} <?php if(strpos($game->opponent, 'at ') !== false){}elseif(strpos($game->opponent, 'vs') !== false){}else{ echo "-"; }?> {{ $game->opponent }} @ <?php $time = strtotime($game->time_start); echo date('h:i A', $time); ?> </li>
              @endforeach
            @else
              <li>No Games Today</li>
            @endif
            <ul>

            <h5 style="font-size:22px;">Fresh Off the Press</h5>
            <h6 style="text-align:center;"><span style="color:#f9b200;">The Golden </span><span style="color:#9B2335">Antlers</span></h6>
            <ul style="list-style-type:none;">
              @foreach($ga as $post)
               <li style="padding-bottom:8px;"><img src="{{ $post->imgUrl }}" align="left" style="padding-right: 10px;" height=50 /><h6 style="margin:auto; width: 90%; padding: 10px;">{{ $post->title }} - <a href="{{ $post->url }}">Read</a></h6></div></li>
              @endforeach
            </ul>
            <h6 style="text-align:center;"><span style="color:#5a5a5c;">The </span><span style="color:#6e0001;">Forum</span></h6>
            <ul style="list-style-type:none;">
              @foreach($forum as $post)
               <li style="padding-bottom:8px;"><img src="{{ $post->imgUrl }}" align="left" style="padding-right: 10px;" height=50 /><h6 style="margin:auto; width: 90%; padding: 10px;">{{ $post->title }} - <a href="{{ $post->url }}">Read</a></h6></div></li>
              @endforeach
            </ul>
            <h6 style="text-align:center;"><span style="color:#c80000;">Claremont </span><span style="color:#252021">Independent</span></h6>
            <ul style="list-style-type:none;">
              @foreach($independent as $post)
               <li style="padding-bottom:8px;"><img src="{{ $post->imgUrl }}" align="left" style="padding-right: 10px;" height=50 /><h6 style="margin:auto; width: 90%; padding: 10px;">{{ $post->title }} - <a href="{{ $post->url }}">Read</a></h6></div></li>
              @endforeach
            </ul>
            <!-- <h6 style="text-align:center;"><span style="color:#e32;">BuzzFeed</span></h6>
            <ul style="list-style-type:none;">
              @foreach($buzz as $post)
               <li style="padding-bottom:8px;"><h6 style="margin:auto; width: 100%; border:2px solid #000; border-radius:4px; padding: 10px;"><img src="{{ $post->imgUrl }}" style="padding-right: 10px;" width=75 />{{ $post->title }} - <a href="{{ $post->url }}">Read</a></h6></li>
              @endforeach
            </ul> -->
              <br>

						<a class="btn">Read More Here &raquo;</a>

					</td>
				</tr>
			</table>
			</div>

				<div class="column">
				<table>
				<tr>
					<td>
            <img src="{{ $insta[0]->imgUrl }}">
            <h6 style="text-align:center; padding-top:10px;">Today At The Ath</h6>
            @if(isset($todayAth[0]))
              <div style="border-bottom:1px solid; margin-bottom: 15px;">
                <p><span style="font-weight: 700">WHO & WHAT: </span><img align="right" width=110 src="{{ $todayAth[0]->speaker_img }}" style="padding-left:5px;"/>{{ substr($todayAth[0]->description,0,140) }}...</p>
                <p><span style="font-weight: 700">WHEN:</span> {{ $todayAth[0]->event_time }}</p>
              </div>
            @endif
            @if(isset($todayAth[1]))
            <div style="border-bottom:1px solid; margin-bottom: 15px;">
              <p><span style="font-weight: 700">WHO & WHAT: </span><img align="left" width=110 src="{{ $todayAth[1]->speaker_img }}" style="padding-right:5px;"/>{{ substr($todayAth[1]->description,0,140) }}...</p>
              <p><span style="font-weight: 700">WHEN:</span> {{ $todayAth[1]->event_time }}</p>
            </div>

            <p class="callout">
              Advertisement goes <a href="#">Here &raquo;</a>
            </p><!-- /Callout Panel -->

            @endif
						<ul class="sidebar">
							<li>
								<a>
									<h5>Scripps Menu</h5>
									<p>Lunch</p>
								</a>
							</li>
              @foreach($menu2 as $food)
                @if($food !== end($menu2))
                  <li><a>{{ $food->foodName }}</a></li>
                @else
                  <li><a class="last">{{ $food->foodName }}</a></li>
                @endif
              @endforeach
						</ul>

						<!-- social & contact -->
						<table bgcolor="" class="social" width="100%">
							<tr>
								<td>


										<table bgcolor="" class="" cellpadding="" align="left" width="100%">
										<tr>
											<td>

												<h6 class="connect-title">Connect with Us:</h6>
												<table class="connect" style="margin-bottom:10px;">
                          <tr>
                            <td class="social"><img src="https://dl.dropboxusercontent.com/u/48479368/Social%20Media%20Icons/facebook.png"></td><td class="social"><img src="https://dl.dropboxusercontent.com/u/48479368/Social%20Media%20Icons/twitter.png"></td><td class="social"><img src="https://dl.dropboxusercontent.com/u/48479368/Social%20Media%20Icons/instagram.png"></td><td class="social"><img src="https://dl.dropboxusercontent.com/u/48479368/Social%20Media%20Icons/linkedin.png"></td>
                          </tr>
                        </table>

												<h6 class="">Contact Info:</h6>
                Email: <strong><a href="emailto:hseldon@trantor.com">contact@claremontrise.com</a></strong></p>

											</td>
										</tr>
									</table>

								</td>
							</tr>
						</table><!-- /social & contact -->

					</td>
				</tr>
			</table>
			</div>

				<div class="clear"></div>

			</div>

		</td>
		<td></td>
	</tr>
</table><!-- /BODY -->

<!-- FOOTER -->
<table class="footer-wrap">
	<tr>
		<td></td>
		<td class="container">

				<!-- content -->
				<div class="content">
				<table>
				<tr>
					<td align="center">
						<p>
							<a href="#">Terms</a> |
							<a href="#">Privacy</a> |
							<a href="#"><unsubscribe>Unsubscribe</unsubscribe></a>
						</p>
					</td>
				</tr>
			</table>
				</div><!-- /content -->

		</td>
		<td></td>
	</tr>
</table><!-- /FOOTER -->

</body>
</html>
