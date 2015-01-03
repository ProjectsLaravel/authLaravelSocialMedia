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

<p>{{ Form::label('email', 'Email') }}
  {{ Form::text('email') }}</p>

  <p>{{ Form::label('password', 'Password') }}
    {{ Form::text('password') }}</p>

    <p>{{ Form::label('password_confirmation', 'Password confirm') }}
      {{ Form::text('password_confirmation') }}</p>

      {{ Form::hidden('token', $token) }}

      <p>{{ Form::submit('Submit') }}</p>

      {{ Form::close() }}
