<div class="col-md-4 col-md-offset-4">
    <img class="img-circle" src="{{asset(Auth::user()->avatar->url('thumb')) }}" >

    {{ Form::open(['route' => 'uploadImage', 'method' => 'POST', 'files' => true,'role' => 'form']) }}
      {{ Form::hidden('id', Auth::user()->id ) }}
      {{ Form::file('avatar') }}
      <input type="submit" value="Subir imagen" class="btn btn-success">
    {{ Form::close() }}

    {{ Form::open(['route' => 'updateUser', 'method' => 'POST', 'role' => 'form']) }}

      {{ Form::hidden('id', Auth::user()->id ) }}

      {{ Form::label('first_name', 'FirtsName', ['class' => 'sr-only']) }}
      {{ Form::text('first_name', Auth::user()->first_name , ['class' => 'form-control', 'placeholder' => 'Firstname', 'autofocus' => '']) }}


      {{ Form::label('last_name', 'Last Name', ['class' => 'sr-only']) }}
      {{ Form::text('last_name', Auth::user()->last_name , ['class' => 'form-control', 'placeholder' => 'Last Name', 'autofocus' => '']) }}

      {{Form::text('email', Auth::user()->email ,['class' => 'form-control', 'placeholder' => 'Email', 'autofocus' => ''])}}

      {{ Form::label('password', 'Password', ['class' => 'sr-only']) }}
      {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}

    <p>
      <input type="submit" value="Actualizar" class="btn btn-success">
    </p>
    {{ Form::close() }}
</div>