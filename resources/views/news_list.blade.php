@foreach ($project->posts->sortByDesc('created_at') as $post)
    <a href="../news_post/{{$post->id}}">{{ $post->title }}</a><br>
    {{$post->created_at}}<br>
    {{$post->summary}}</br><br>
@endforeach 