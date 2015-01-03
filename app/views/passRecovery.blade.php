@if (Session::has('error'))
{{ trans(Session::get('reason')) }}
@elseif (Session::has('success'))
An email with the password reset has been sent.
@endif

{{ Form::open(['route' => 'sendMailRecovery', 'method' => 'POST', 'role' => 'form']) }}

    {{ Form::label('email', 'Email') }}
    {{ Form::text('email') }}

    {{ Form::submit('Submit') }}

{{ Form::close() }}
