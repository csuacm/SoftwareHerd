

@extends('layouts.master')

@section('title')
New Project
@endsection

@section('content')
<section class="row new-project">
    <div class="col-md-6">
        <header><h3>Pitch your new project:</h3></header>
         <form action="{{ route('project.create') }}" method="post">
             <div class="form-group">
                <textarea class="form-control" name="title" id="new-project" rows="5" placeholder="Your Project Title"></textarea>
                <textarea class="form-control" name="description" id="new-project" rows="5" placeholder="Your Project Description"></textarea>
            </div>
             <button type="submit" class="btn btn-primary">Create Post</button>
             <input type="hidden" value="{{ Session::token() }}" name="_token">
              {{ csrf_field() }}
        </form>
    </div>
</section>
@endsection
