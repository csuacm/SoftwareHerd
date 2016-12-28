@extends('layouts.master')

@section('title')
Project Admin Page
@endsection

@section('content')
<div style="margin-bottom:20px">
    <button onClick="$('#admin_new_post').hide();$('#admin_manage_members').hide();$('#admin_manage_info').show();">Manage Project</button>
    <button onClick="$('#admin_new_post').hide();$('#admin_manage_info').hide();$('#admin_manage_members').show();">Manage Members</button>
    <button onClick="$('#admin_manage_info').hide();$('#admin_manage_members').hide();$('#admin_new_post').show();">New News Post</button>
</div>
<div id="admin_manage_info" style="display: none;">
    
</div>


<div id="admin_manage_members" style="display: none;">
    <div class="panel panel-default" style="padding: 10px; width:350px; height:430px; ">
        <h4>Members List</h4>
        <div style="overflow-y: scroll; width:330px; height:370px">
            <table class="table table-hover table-striped">
            <?php
                $users = \DB::select('select * from user_projects where project_id = :id', ['id' => $project->id]);
            ?>
            @foreach($users as $user)
                <tr>
                    <td style="width:50%">Joe{{$user->user_name}}</td>
                    <td style="width:20%">Member{{$user->level}}</td>
                    <td style="width:30%">
                        <a href="/promote/{{$user->user_id}}/{{$user->project_id}}" style="width:30%">
                            P
                        </a>
                        <a href="/demote/{{$user->user_id}}/{{$user->project_id}}" style="width:30%">
                            D
                        </a>
                        @if($user->user_id != Auth::user()->id) // So we can never delete all from a project by mistake
                            <a href="/remove/{{$user->user_id}}/{{$user->project_id}}" style="width:30%">
                                X
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </table>
        </div>
    </div>
</div>
 

<div id="admin_new_post" style="display: none;">
    <script type="text/javascript" src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
    <script type="text/javascript">
      tinymce.init({
        selector : "#new-post-info",
        plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste"],
        toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
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
</div>
@endsection
