<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>AuthLaravelSimple</title>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <style>
  @import url(//fonts.googleapis.com/css?family=Lato:700);

  body {
    margin:0;
    font-family:'Lato', sans-serif;
    text-align:center;
    color: #999;
  }

  .welcome {
    width: 300px;
    height: 200px;
    position: absolute;
    left: 50%;
    top: 50%;
    margin-left: -150px;
    margin-top: -100px;
  }

  a, a:visited {
    text-decoration:none;
  }

  h1 {
    font-size: 32px;
    margin: 16px 0 0 0;
  }
  </style>
</head>
<body>
  <div class="welcome">

    hello {{ Auth::user()->username }} your id is {{ Auth::user()->id }}
    <a class="btn btn-danger" href="{{ action('AuthController@logout') }}">Log out</a>

  </div>
</body>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</html>
