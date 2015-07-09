@extends('master')

@section('title', 'Good Morning Claremont')

@section('h1-title', 'Welcome to Good Morning Claremont')

@section('slogan')
    You sign up, we send you stuff.
@stop

@section('button')
<div class="more-links">
  <a href="#" data-modal="contact">Contact</a>
  <a href="#" data-modal="subscribe">Subscribe</a>
</div>
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
@stop
