@extends('layouts.master')

@section('title')
Project Admin Page
@endsection

@section('content')
<section class="row new-post">
    <div class="col-md-6">
         <form action="{{ route('project.create') }}" method="post">
            <div class="form-group">
                <textarea class="form-control" name="title" id="new-post" rows="1" placeholder="Your Post's Title"></textarea>
                <textarea class="form-control" name="summary" id="new-post" rows="2" placeholder="Your Post's Summary or Short Description"></textarea>
                <textarea class="form-control" name="info" id="new-post" rows="5" placeholder="Your Post's Main Body"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create Post</button>
            <input type="hidden" value="{{ Session::token() }}" name="_token">
            {{ csrf_field() }}
        </form>
</section>
@endsection
