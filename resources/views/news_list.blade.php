<link rel="stylesheet" href="{{ URL::asset('/css/newslist.css') }}">

@foreach ($project->posts->sortByDesc('created_at') as $post)
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-default" id="post-outside-panel">
				<div class="panel-body" id="post-body-panel">
					
					<div id="post">
						<div id="post-title"><a href="../news_post/{{$post->id}}" class="btn btn-primary btn-xs" id="tb-post-title">
						{{ str_limit( $post->title, 60 ) }}
						</a></div>
						<span id="tb-post-time">{{$post->created_at}}</span>  
						<span id="tb-post-summary">{{ str_limit( $post->summary, 75 ) }}</span>
					</div>
				
				</div>
			</div>
		</div>
	</div>
</div>
@endforeach 	