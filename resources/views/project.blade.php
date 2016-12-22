@extends('layouts.master')

@section('content')
<h1>{{ $project->title }}</h1>
<h3>{{ $project->description }}</h3>
<a href="/members/{{ $project->id }}">Members</a>

<div>
</div>



@endsection