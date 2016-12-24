@foreach ($project->posts->sortByDesc('created_at') as $post)
    @include('news_post')
@endforeach 