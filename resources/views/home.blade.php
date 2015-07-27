@extends('master')

@section('title', 'Claremont Rise')

@section('style')
  <style>
  </style>
@stop

@section('navigate')
  <a class="button" href="/login">Post</a>
@stop

@if(Session::has('email'))
  @section('h1-title')
    Welcome {{ Session::get('email') }}
  @stop
@else
  @section('h1-title', 'Welcome to Claremont Rise.')
@endif


@section('slogan')
    You sign up, we send you stuff.
@stop

@section('button')
<div class="more-links">
  <a href="#" data-modal="subscribe" id="subscriber">Subscribe</a>
</div>
{{-- <div class="more-links-go">
  {!! Html::link('/login', 'Contributor', array(), false) !!}
</div> --}}
@stop

@section('more-content')

      <section id="about" style="background: #ffffff; z-index: 999;">
        <div class="container-fluid" data-scroll-reveal="">
          <div class="row">
            <div class="col-md-6 col-md-offset-3">
              <i class="fa fa-star-o fa-4x"></i>
              <h2>About us</h2>
              <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
          </div>
        </div>
      </section>
      <!-- End About -->

    <!-- Contact -->
    <section id="contact">
      <div class="container-fluid">
        <div class="row" data-scroll-reveal="enter from bottom after 1s">
          <div class="col-md-6 col-md-offset-3">
            <i class="fa fa-map-marker fa-4x"></i>
            <h2>Contact</h2>
            <p>Sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
        </div>
        <div class="row" data-scroll-reveal="enter from top after 1s">
          <div class="col-md-3 col-md-offset-3 col-xs-12">
            <div class="form-group">
              {!! Form::text('name', null, ['class' => 'form-control input-lg', 'id' => 'inputName', 'placeholder' => 'Name']) !!}
            </div>
          </div>
          <div class="col-md-3 col-xs-12">
            <div class="form-group">
              {!! Form::email('email', null, ['class' => 'form-control input-lg', 'id' => 'inputEmail', 'placeholder' => 'E-mail']) !!}
            </div>
          </div>
        </div>
        <div class="row" data-scroll-reveal="enter from top after .75s">
          <div class="col-md-6 col-md-offset-3 col-xs-12">
            <div class="form-group">
              {!! Form::textarea('message', null, ['class' => 'form-control input-lg', 'id' => 'inputMessage', 'placeholder' => 'Message', 'rows' => '3']) !!}
            </div>
            <div class="more-links">
              {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-default', 'data-scroll-reveal' => 'enter from top after 1s']) !!}
            </div>
          </div>
        </div>
        <div class="row">
          <div class="mail-response">&nbsp;</div>
          <div class="back-to-top"><a href="#intro" class="button">Back to top</a></div>
        </div>
      </div>
    </section>
@stop

@section('popup')

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
          <div class="form-group">
            @if($errors->any())
                @foreach ($errors->all() as $error)
                  <p class="error">{{ $error }}</p>
                @endforeach
            @endif
            {!! Form::open() !!}
            <div class="form-group">
              {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'subscribe-email', 'placeholder' => 'Email Address']) !!}
              {!! Form::text('college', null, ['class' => 'form-control', 'id' => 'contr-college', 'placeholder' => 'College']) !!}
              {!! Form::submit('Signup', ['class' => 'btn btn-lg btn-default']) !!}
            </div>
            {!! Form:: close() !!}
          </div>
      </div>

    </div>
  </div>
</div>
@stop

@section('background')
  $.vegas({
      src:'/assets/images/bg1.jpg'
  });
@stop

@section('error')
  @if($errors->any())
    <script>
      $(document).ready(function() {
       $("#subscriber").click();
       console.log('hi');
      });
    </script>
  @endif
@stop
