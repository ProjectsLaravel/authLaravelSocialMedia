<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Authenticate with Laravel 4.2</title>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  {{ HTML::style('assets/css/signin.css') }}
</head>
<body>
  <div class="container">
    <div class="col-md-4 col-md-offset-4">
    {{ Form::open(['route' => 'register', 'method' => 'POST', 'role' => 'form']) }}

      {{ Form::label('first_name', 'FirtsName', ['class' => 'sr-only']) }}
      {{ Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'Firstname', 'autofocus' => '']) }}


      {{ Form::label('last_name', 'Last Name', ['class' => 'sr-only']) }}
      {{ Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Last Name', 'autofocus' => '']) }}


      {{ Form::label('username', 'Username', ['class' => 'sr-only']) }}
      {{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username', 'autofocus' => '']) }}

      {{Form::text('email', null,['class' => 'form-control', 'placeholder' => 'Email', 'autofocus' => ''])}}

      {{ Form::label('password', 'Password', ['class' => 'sr-only']) }}
      {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}

      <p>
        <input type="submit" value="Register" class="btn btn-success">
      </p>
    {{ Form::close() }}
    </div>
  </div>
  <script src="//code.jquery.com/jquery.js"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>
