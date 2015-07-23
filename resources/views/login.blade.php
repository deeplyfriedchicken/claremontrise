@extends('master')

@section('title', 'Claremont Rise')

@section('style')
  <style>
  /*@media screen {
    .more-links-go {
      margin-bottom: 40px;
      text-align: center;
    }
    .more-links-go a {
      border-radius: 25px !important;
      width: 160px !important;
    }
    .more-links-go a {
      border: 2px solid #fff;
      display: inline-block;
      font-size: 18px;
      letter-spacing: 2px;
      height: 50px;
      font-weight: 300;
      line-height: 46px;
      margin: 0 10px;
      transition: all 0.5s ease-in-out;
      -webkit-transition: all 0.5s ease-in-out;
      -moz-transition: all 0.5s ease-in-out;
      -ms-transition: all 0.5s ease-in-out;
      -o-transition: all 0.5s ease-in-out;
    }
  }*/
  </style>
@stop

@section('navigate')
  <a class="button" href="/">Home</a>
@stop

@if(Session::has('username'))

  @section('h1-title')
    Welcome {{ Session::get('username') }}
  @stop

@else

  @section('h1-title', 'Join Claremont Rise.')

@endif

@section('slogan')
    Contribute events, deadlines, or even an article.
@stop

@section('button')
<div class="more-links">
  <a href="#" data-modal="signup" id="signup-error">Signup</a>
</div>
@stop

@section('popup')
<div id="signup" class="new-modal">
  <div class="container">
    <div class="main">

      <div class="close">
        <a href="#" class="modal-close"><i class="fa fa-times"></i></a>
      </div>

      <div class="title">
        <h2>Signup</h2>
      </div>
      <div class="row">
      <div class="row">
        <div class="forms">
          @if($errors->any())
              @foreach ($errors->all() as $error)
                <p class="error">{{ $error }}</p>
              @endforeach
          @endif
          {!! Form::open() !!}
          <div class="form-group">
            {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'contr-name', 'placeholder' => 'Name']) !!}
            {!! Form::text('username', null, ['class' => 'form-control', 'id' => 'contr-username', 'placeholder' => 'Username']) !!}
            {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'contr-email', 'placeholder' => 'Email Address']) !!}
            {!! Form::text('college', null, ['class' => 'form-control', 'id' => 'contr-college', 'placeholder' => 'College']) !!}
            {!! Form::password('password', ['class' => 'form-control', 'id' => 'contr-password', 'placeholder' => 'Password']) !!}
            {!! Form::submit('Create An Account', ['class' => 'btn btn-lg btn-default']) !!}
          </div>
          {!! Form:: close() !!}
        </div>
      </div>
      </div>


    </div>
  </div>
</div>

<div id="login" class="new-modal">
  <div class="container">
    <div class="main">

      <div class="close">
        <a href="#" class="modal-close"><i class="fa fa-times"></i></a>
      </div>

      <div class="title">
        <h2>login</h2>
      </div>

      <div class="slogan">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      </div>

      <div class="forms">
          <div class="form-group">
            {!! Form::open() !!}
            <div class="form-group">
              {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'subscribe-email', 'placeholder' => 'Email Address']) !!}
              {!! Form::password('password', ['class' => 'form-control', 'id' => 'contr-password', 'placeholder' => 'Password']) !!}
              {!! Form::submit('Login', ['class' => 'btn btn-lg btn-default']) !!}
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
      src:'/assets/images/computer_notebook.jpg'
  });
@stop

@section('error')
  @if($errors->any())
    <script>
      $(document).ready(function() {
       $("#signup-error").click();
       console.log('hi');
      });
    </script>
  @endif
@stop
