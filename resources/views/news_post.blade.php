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
<div id="comments">
  @foreach ($post->comments as $comment)
    <div class="comment">
      <span id="comment-data">{{$comment->data}}</span> - 
      <a href="/members/{{$comment->user->id}}" id="comment-name">{{$comment->user->name}}</a>
      <span id="comment-time">{{$comment->created_at}}</span>
      <br>
      @can('delete', $comment)
        <a onclick="deleteComment({{$comment->id}});">delete</a>
      @elsecan('admin', $project)
        <a onclick="deleteComment({{$comment->id}});">delete</a>
      @endcan
    </div>
  @endforeach 
</div>
  
@if(Auth::User())
  <form id="new-comment-form" action="/createPost" method="post">
      <div class="form-group">
         <textarea class="form-control" name="data" id="new-comment-data" rows="5" placeholder="Post a comment here."></textarea>
     </div>
     <button type="submit" class="btn btn-primary" id="new-comment-btn">Post Comment</button>
     <input type="hidden" value="{{ Session::token() }}" name="_token">
     <input type="hidden" id="new-comment-post" value="{{$post->id}}" name="post_id">
     <input type="hidden" id="new-comment-user" value="{{Auth::User()->id}}" name="user_id">
       {{ csrf_field() }}
  </form>
@else
    Please <a href="{{ url('/login') }}">login</a> if you want to post a comment.
@endif

</div>
@endsection