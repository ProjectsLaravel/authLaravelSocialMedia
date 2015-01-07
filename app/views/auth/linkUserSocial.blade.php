Hola


@if (isset($socialNetworking))
    @foreach ($socialNetworking as $social)
    <p>Social {{ $social->name_provider }}</p>
	@endforeach
@else
    no social
@endif
