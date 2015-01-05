<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Authenticate with Laravel 4.2</title>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <link href="{{ asset('css/login.css') }}" rel="stylesheet">
  <link href="{{ asset('css/helper.css') }}" rel="stylesheet">
</head>
<body>
  <div class="container">
    <div class="col-md-4 col-md-offset-4">
      {{ Form::open(['url' => 'login', 'autocomplete' => 'off', 'class' => 'form-signin', 'role' => 'form']) }}

      @if(Session::has('error_message'))
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ Session::get('error_message') }}
      </div>
      @endif

      <h2 class="form-signin-heading">AuthLaravelSocialMedia</h2>

      <a class="btn btn-info col-md-12 spaceBox" href="login/fb">
        <i class=""></i> Sign in with Facebook
      </a>
      <a class="btn btn-info col-md-12 spaceBox" href="login/tw">
        <i class=""></i> Sign in with Twitter
      </a>

      {{ Form::label('username', 'Username', ['class' => 'sr-only']) }}
      {{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username', 'autofocus' => '']) }}

      {{ Form::label('password', 'Password', ['class' => 'sr-only']) }}
      {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}

      <div class="checkbox">
        <label>
          {{ Form::checkbox('remember', true) }} Remember me
        </label>
      </div>

      {{ Form::submit('Log in', ['class' => 'btn btn-primary btn-block']) }}

      {{ Form::close() }}

      <a class="btn btn-success col-md-12 spaceBox" href="{{ action('AuthController@registerUser') }}">Create User</a>
      <a class="btn btn-success col-md-12 spaceBox" href="{{ action('UserController@showPassRecovery') }}">Forget Password?</a>
    </div>
  </div>
  <script src="//code.jquery.com/jquery.js"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>
