@extends('master')

@section('title', 'Claremont Rise')

@section('style')
  <style>
  @media screen {
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
  }
  </style>
@stop

@section('h1-title', 'Welcome to Claremont Rise.')

@section('slogan')
    You sign up, we send you stuff.
@stop

@section('button')
<div class="more-links">
  <a href="#" data-modal="contact">Contact</a>
  <a href="#" data-modal="subscribe">Subscribe</a>
</div>
{{-- <div class="more-links-go">
  {!! Html::link('/login', 'Contributor', array(), false) !!}
</div> --}}
@stop

@section('popup')
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
          <div class="form-group">
            {!! Form::open() !!}
            <div class="form-group">
              {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'subscribe-email', 'placeholder' => 'Email Address']) !!}
              {!! Form::submit('Login', ['class' => 'btn btn-lg btn-default']) !!}
            </div>
            {!! Form:: close() !!}
          </div>
      </div>

    </div>
  </div>
</div>
@stop
