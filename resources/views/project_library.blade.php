@extends('layouts.master')
<link rel="stylesheet" href="{{ URL::asset('/css/projectlibrary.css') }}">
@section('content')

	@foreach ($projects->sortByDesc('created_at') as $project)

		<div class="container">
		    <div class="row">
		        <div class="col-md-8">
		            <div class="panel panel-default" id="outside-panel">

		                <div class="panel-heading" id="project-title-panel" >
		                	<!-- Project Title -->
							<a href="project/{{$project->id}}" id="project-title-text">{{ $project->title }}</a><br>
		                </div>
		                <div class="panel-body" id="project-body-panel">
		                    <p>{{ str_limit( $project->description, 50 )}}</p>
		                    <a href="project/{{$project->id}}" class="btn btn-primary btn-xs" id="see-project-button">
                            	See Project
                            </a>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>	

	@endforeach 


@endsection



