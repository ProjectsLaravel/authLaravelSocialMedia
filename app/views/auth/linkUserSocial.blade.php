<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AuthLaravelSimple</title>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="{{ asset('css/dash.css') }}" rel="stylesheet">
  <link href="{{ asset('css/helper.css') }}" rel="stylesheet">
  <style>
  @import url(//fonts.googleapis.com/css?family=Lato:700);
  </style>
</head>
<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">AuthLaravelSimple</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li>
              <div class="navbar-collapse collapse">
                <div>
                  @if (Auth::check())
                  <ul class="nav navbar-nav pull-right">
                    <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="icon icon-wh i-profile"></span> {{ Auth::user()->username }}  <span class="caret"></span>
                      </a>
                      <ul class="dropdown-menu">

                        <li><a onclick="showView('updateUser','ocultar')">Editar usuario</a></li>
                        <li><a href="{{ action('AuthController@logout') }}">Salir</a></li>
                      </ul>
                    </li>
                  </ul>
                  @endif
                </div>
              <div>
            </li>

          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="#">Dashboard <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Blog</a></li>
            <li class="active"><a href="{{ action('UserController@getSocialNetworking') }}" onclick="showView('linkUserSocial','ocultar')">Social Networking</a></li>
            <li><a href="#">favorites</a></li>
            <li><a href="#">Recommended</a></li>
          </ul>

        </div>

        <div id="updateUser" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 ocultar" style="display:none" >
          @include('auth/dashUpdateUser')
        </div>

        <div id="linkUserSocial" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 ocultar" style="" >
          @if (isset($socialNetworking))
      		<section class="col-md-4 col-md-offset-4 marginTop">
      			<article>
      				<figure>
      					<img class="img-circle" src="{{asset(Auth::user()->avatar->url('thumb')) }}" alt="">
      				</figure>
      			</article>
      			<article>
      				<ul>
      					@foreach ($socialNetworking as $social)
					    
					    @if ($social->name_provider === "facebook")
						    <li><i class="fa fa-facebook">{{ $social->name_provider }}</i></li>
						@else
						    <li><i class="fa fa-twitter">{{ $social->name_provider }}</i></li>
						@endif

						@endforeach
      				</ul>
      				
      			</article>
      		</section>
			    
			@else
			    no social
			@endif
        </div>

      </div>
    </div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="{{ asset('bootstrap-3.2.0/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('bootstrap-3.2.0/js/docs.min.js') }}"></script>
<script src="{{ asset('js/dash.js') }}"></script>

</html>






