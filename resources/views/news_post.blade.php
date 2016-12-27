@extends('layouts.master')

@section('content')

<h4>{{$post->title}}</h4><br>
{{$post->created_at}}<br><br>
<?php echo $post->info; ?><br>


<h2>Comments:</h2>

@foreach ($post->comments as $comment)
    <a href="/members/{{$comment->user->id}}">{{$comment->user->name}}</a><br>
    {{$comment->created_at}}<br>
    {{$comment->data}}<br><br>
@endforeach 

@if(Auth::User())

<form  method="post">
    <div class="form-group">
       <textarea class="form-control" name="data" id="new-project" rows="5" placeholder="Post a comment here."></textarea>
   </div>
   <button type="submit" class="btn btn-primary">Post Comment</button>
   <input type="hidden" value="{{ Session::token() }}" name="_token">
     {{ csrf_field() }}
</form>

@else
    Please <a href="{{ url('/login') }}">login</a> if you want to post a comment.
@endif

@endsection