<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Authenticate with Laravel 4.2</title>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <link href="{{ asset('css/helper.css') }}" rel="stylesheet">
</head>
<body>
  <div class="container">
    <div class="col-md-4 col-md-offset-4">
      <h2 class="form-signin-heading centerText"></h2>
      @if (Session::has('error'))
      {{ trans(Session::get('reason')) }}
      @endif

      @if(Session::has('error_message'))
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ Session::get('error_message') }}
      </div>
      @endif
      {{ Form::open(array('route' => array('resetPass', $token)))  }}

        {{ Form::label('email', 'Email',['class' => 'btn btn-info col-md-12 spaceBox']) }}
        {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Your Email', 'autofocus' => '']) }}

        {{ Form::label('password', 'Password', ['class' => 'btn btn-info col-md-12 spaceBox']) }}
        {{ Form::text('password', null, ['class' => 'form-control', 'placeholder' => 'New Password', 'autofocus' => '']) }}

        {{ Form::label('password_confirmation', 'Password confirm', ['class' => 'btn btn-info col-md-12 spaceBox']) }}
        {{ Form::text('password_confirmation', null, ['class' => 'form-control', 'placeholder' => 'New Password Confirm', 'autofocus' => '']) }}

        {{ Form::hidden('token', $token) }}

        {{ Form::submit('Save my new password',['class' => 'btn btn-primary btn-block spaceBox']) }}

      {{ Form::close() }}
    </div>
  </div>
  <script src="//code.jquery.com/jquery.js"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>
