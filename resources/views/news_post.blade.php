@extends('layouts.master')
<link rel="stylesheet" href="{{ URL::asset('/css/newspost.css') }}">
@section('content')
<div class="container" id="container-spacing">

<div id="post">
  <div id="post-title">{{$post->title}}</div>
  <div id="post-time">{{$post->created_at}}</div>
  <div id="post-info"><?php echo $post->info; ?></div>
</div>

<div id="comments-label">Comments:</div>

@foreach ($post->comments as $comment)
  <div class="comment">
    <span id="comment-data">{{$comment->data}}</span> - 
    <a href="/members/{{$comment->user->id}}" id="comment-name">{{$comment->user->name}}</a>
    <span id="comment-time">{{$comment->created_at}}</span>
    
  </div>
@endforeach 

@if(Auth::User())

<form  method="post">
    <div class="form-group">
       <textarea class="form-control" name="data" id="new-project" rows="5" placeholder="Post a comment here."></textarea>
   </div>
   <button type="submit" class="btn btn-primary" id="comment-button">Post Comment</button>
   <input type="hidden" value="{{ Session::token() }}" name="_token">
     {{ csrf_field() }}
</form>

@else
    Please <a href="{{ url('/login') }}">login</a> if you want to post a comment.
@endif

</div>
@endsection