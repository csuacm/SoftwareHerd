@extends('layouts.master')
<link rel="stylesheet" href="{{ URL::asset('/css/project.css') }}">
@section('content')


@can('admin', $project)
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-default" id="outside-panel">
				<div class="panel-body" id="project-body-panel">
					<a href="/project_admin/{{$project->id}}" class="btn btn-primary btn-s" id="see-project-button">
						Project Administration
					</a>
					<p><i>You are an admin for this project.<br>You can click here to access the adminstrative controls.<br>Other users will not see this panel.</i></p>
				</div>
			</div>
		</div>
	</div>
</div>	
@endcan

<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-default" id="outside-panel">
				<div class="panel-heading" id="project-title-panel">
					<span id="project-title-text">{{ $project->title }}</span><br>
				</div>
				<div class="panel-body" id="project-body-panel">
					<p>{{ $project->description }}</p>
					<br>

					@if($project->project_admin_user_id) 
						<a href="/user/{{$project->project_admin_user_id}}" class="btn btn-primary btn-xs" id="see-project-button">
							Admin
						</a>
					@endif
					<a href="/members/{{ $project->id }}" class="btn btn-primary btn-xs" id="see-project-button">
						Members
					</a>
					<a href="#news_list" class="btn btn-primary btn-xs" id="see-project-button">
						See Project's Posts
					</a>
				</div>
			</div>
		</div>
	</div>
</div>	


<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-default" id="info-outside-panel-small">
				<div class="panel-heading" id="info-project-title-panel">
					<span id="info-project-title-text">Info</span><br>
				</div>
				<div class="panel-body" id="info-project-body-panel">
					@if($project->get_involved_pitch) 
						<p>
							{{ $project->get_involved_pitch }}
						</p>
					@endif

					@if($project->github_link) 
						<a href="{{$project->github_link}}" class="btn btn-primary btn-xs" id="info-see-project-button">
							GitHub Link
						</a>
					@endif

					@if($project->slack_link) 
						<a href="{{$project->slack_link}}" class="btn btn-primary btn-xs" id="info-see-project-button">
							Slack Link
						</a>
					@endif
		                    
					@if($project->website_link) 
						<a href="{{$project->website_link}}" class="btn btn-primary btn-xs" id="info-see-project-button">
							Website Link
						</a>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>	

<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-default" id="outside-panel-small">
				<div class="panel-heading" id="project-title-panel">
					<span id="project-title-text">Membership Status</span><br>
				</div>
				<div class="panel-body" id="project-body-panel">
					@if(Auth::user())
						@if(Auth::user()->can('member', $project))
							<h4>You are a member of this project</h4>
						@else
							@include('project_request')
						@endif
					@else
						<p>
							Please <a href="{{ url('/login') }}">login</a> if you want to join a project.
						</p>
					@endif
					<br>

					@if($project->project_admin_user_id) 
						<a href="/user/{{$project->project_admin_user_id}}" class="btn btn-primary btn-xs" id="see-project-button">
							Project Admin
						</a>
					@endif

					<a href="/members/{{ $project->id }}" class="btn btn-primary btn-xs" id="see-project-button">
						Members
					</a>
				</div>
			</div>
		</div>
	</div>
</div>	

<div id="news-list">
	@include('news_list')
</div>








@endsection


