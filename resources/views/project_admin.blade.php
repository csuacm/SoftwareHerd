@extends('layouts.master')

@section('title')
Project Admin Page
@endsection

@section('content')
<script type="text/javascript" src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
  tinymce.init({
    selector : "#new-post-info",
  }); 
</script>

<form action="/write_post/{{ $project->id }}" method="post">
   <div class="form-group">
       <textarea class="form-control" name="title" id="new-post" rows="1" placeholder="Your Post's Title"></textarea>
       <textarea class="form-control" name="summary" id="new-post" rows="2" placeholder="Your Post's Summary or Short Description"></textarea>
       <textarea name="info" id="new-post-info" rows="20"></textarea>
   </div>
   <button type="submit" class="btn btn-primary">Create Post</button>
   <input type="hidden" value="{{ Session::token() }}" name="_token">
   {{ csrf_field() }}
</form>
@endsection
