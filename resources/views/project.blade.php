@extends('layouts.master')

@section('content')
<h1>{{ $project->title }}</h1>
<h3>{{ $project->description }}</h3>

@if($project->github_link) 
	<h3><a href="{{$project->github_link}}">GitHub Link</a></h3>
@endif

@if($project->slack_link) 
	<h3><a href="{{$project->slack_link}}">Slack Link</a></h3>
@endif

@if($project->website_link) 
	<h3>{{ $project->website_link }}</h3>
@endif

@if($project->get_involved_pitch) 
	<h3>{{ $project->get_involved_pitch }}</h3>
@endif

@if($project->project_admin_user_id) 
	<h3><a href="/user/{{$project->project_admin_user_id}}">Project Admin</a></h3>
@endif

<h4><a href="/members/{{ $project->id }}">Members</a></h4>

@include('news_list')

<h3>
    @can('admin', $project)
    <a href="/project_admin/{{$project->id}}">Project Administration</a>
    @endcan
</h3>

<div>
</div>



@endsection