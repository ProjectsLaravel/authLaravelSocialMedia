<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Authenticate with Laravel 4.2</title>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  {{ HTML::style('assets/css/signin.css') }}
  <link href="{{ asset('css/helper.css') }}" rel="stylesheet">
</head>
<body>
  <div class="container">
    <div class="col-md-4 col-md-offset-4">
      <h2 class="form-signin-heading centerText">Dont Worry :)</h2>
      @if (Session::has('error'))
      {{ trans(Session::get('reason')) }}
      @elseif (Session::has('success'))
      An email with the password reset has been sent.
      @endif

      {{ Form::open(['route' => 'sendMailRecovery', 'method' => 'POST', 'role' => 'form']) }}

      {{ Form::label('email', 'Email', ['class' => 'btn btn-info col-md-12 spaceBox']) }}
      {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Username', 'autofocus' => '']) }}

      {{ Form::submit('Recovery my password',['class' => 'btn btn-primary btn-block spaceBox']) }}

      {{ Form::close() }}

    </div>
  </div>
  <script src="//code.jquery.com/jquery.js"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>
