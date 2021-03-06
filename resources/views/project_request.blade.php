@if(Auth::User())

<form  action="/pushRequest" method="post">
    <div class="form-group">
        <textarea class="form-control" name="reason" rows="5" placeholder="Why I want to join."></textarea>
    </div>
    <button type="submit" class="btn btn-primary" id="red-btn-post-comment">Send Request</button>
    <input type="hidden" value="{{ Session::token() }}" name="_token">
    <input type="hidden" value="{{$project->id}}" name="project_id">
    <input type="hidden" value="{{$project->name}}" name="project_name">
    {{ csrf_field() }}
</form>

@else
    Please <a href="{{ url('/login') }}">login</a> if you want to join a project.
@endif