@if (count($files))
<h4>{{ trans('repositories.docs') }}</h4>
<ul>
	@foreach ($files as $file)
	<li><a href="{{ route('file', $file->file) }}">{{ $file->name }}</a></li>
	@endforeach
</ul>
<a href="{{ route('home.file') }}">{{ trans('repositories.view_all') }} ...</a>
@endif