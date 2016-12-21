@extends('layouts.master')

@section('content')

	<ul> 
	@foreach ($projects as $project)
		<!-- Project Title -->
		<a href="project/{{$project->id}}">{{ $project->title }}</a><br>
	@endforeach 
	</ul>


@endsection