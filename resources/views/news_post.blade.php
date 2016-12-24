@extends('layouts.master')

@section('content')

{{$post->title}}<br>
{{$post->created_at}}<br>
<?php echo $post->info; ?><br>


<h2>Comments:</h2>

@foreach ($post->comments as $comment)
    {{$comment->user->name}}<br>
    {{$comment->created_at}}<br>
    {{$comment->data}}</br><br>
@endforeach 

@endsection