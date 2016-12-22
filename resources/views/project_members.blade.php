@extends('layouts.master')

@section('content')
	<h1>Members of {{ $single_project->project_name }}:</h1>
	<ul> 
	@foreach ($user_projects as $member)
		<!-- Project Title -->
		<a href="/user/{{$member->user_id}}">{{ $member->user_name }}</a><br>
	@endforeach 
	</ul>


@endsection