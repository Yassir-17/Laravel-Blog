@extends('main')

@section('title', '| Contact')

@section('content')
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <h1>Contact Me</h1>
        <hr>
      <form action="{{ route('contact') }}" method="POST">
        {{ csrf_field() }}
           <div class="form-group">
              <label name="email1">Email address:</label>
              <input class="form-control input-lg" id="email" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label name="subject">Subject:</label>
              <input class="form-control" id="subject" name="subject">
            </div>
            <div class="form-group">
              <label name="message">Message:</label>
              <textarea name="message" class="form-control" id="message" placeholder="Type your message here..."></textarea>
            </div>
          <input type="submit" value="Send Message" class="btn btn-primary btn-block btn-lg">
      </form>

      </div>
    </div>
@endsection