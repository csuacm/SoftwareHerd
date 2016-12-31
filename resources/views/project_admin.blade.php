@extends('layouts.master')
<div class="container" style="padding-top:10%">
@section('title')
Project Admin Page
@endsection

@section('content')
<div style="margin-bottom:20px">
    <button onClick="$('#admin_new_post').hide();$('#admin_manage_members').hide();$('#admin_manage_info').slideDown();">Manage Project</button>
    <button onClick="$('#admin_new_post').hide();$('#admin_manage_info').hide();$('#admin_manage_members').slideDown();">Manage Members</button>
    <button onClick="$('#admin_manage_info').hide();$('#admin_manage_members').hide();$('#admin_new_post').slideDown();">New News Post</button>
</div>
    
<div id="admin_manage_info" style="display: none;">
    <div class="well">More to come!</div>
</div>


<div id="admin_manage_members" style="display: none;">
    <div class="panel panel-default" style="padding: 10px; width:350px; height:430px; float:left; margin-right:50px;">
        <div class="panel-heading"><h4 class="panel-title">Members List</h4></div>
        <div style="overflow-y: scroll; width:330px; height:370px">
            <table class="table table-hover table-striped">
            <?php
                $users = \DB::select('select * from user_projects where project_id = :id', ['id' => $project->id]);
            ?>
            @foreach($users as $user)
                <tr>
                    <td style="width:50%">{{$user->user_name}}</td>
                    <td style="width:25%">
                        @if($user->level == 0)
                            Member
                        @elseif($user->level == 1)
                            Admin
                        @elseif($user->level == 2)
                            Leader
                        @elseif($user->level == 3)
                            Creator
                        @else
                            {{$user->level}}
                        @endif
                    </td>
                    <td style="width:25%">
                        <button onClick="$('#admin_{{$user->user_id}}_form').attr('action', '/promote');
                                         $('#admin_{{$user->user_id}}_form').submit();">P</button>
                        <button onClick="$('#admin_{{$user->user_id}}_form').attr('action', '/demote');
                                         $('#admin_{{$user->user_id}}_form').submit();">D</button>
                        @if($user->user_id != Auth::user()->id)
                            <button onClick="$('#admin_{{$user->user_id}}_form').attr('action', '/remove');
                                             $('#admin_{{$user->user_id}}_form').submit();">X</button>
                        @endif
                        <form id="admin_{{$user->user_id}}_form" style="width:0px; height:0px" action="/promote" method="post">
                            <input type="hidden" value="{{ $user->user_id }}" name="user"></input>
                            <input type="hidden" value="{{ $user->project_id }}" name="project"></input>
                            <input type="hidden" value="{{ Session::token() }}" name="_token">
                            {{ csrf_field() }}
                        </form>
                    </td>
                </tr>
            @endforeach
            </table>
        </div>
    </div>
        
    <div class="panel panel-default" style="padding: 10px; width:350px; height:430px; float:left;">
        <div class="panel-heading"><h4 class="panel-title">Request List</h4></div>
        <div style="overflow-y: scroll; width:330px; height:370px">
            <table class="table table-hover table-striped">
            <?php
                $users = \DB::select('select * from user_project_requests where project_id = :id', ['id' => $project->id]);
            ?>
            @foreach($users as $user)
                <tr>
                    <td style="width:50%">{{$user->user_name}}</td>
                    <td style="width:40%">{{$user->reason}}</td>
                    <td style="width:10%">
                        <button onClick="$('#admin_{{$user->user_id}}_form').attr('action', '/acceptMember');
                                         $('#admin_{{$user->user_id}}_form').submit();">Y</button>
                        <button onClick="$('#admin_{{$user->user_id}}_form').attr('action', '/declineMember');
                                         $('#admin_{{$user->user_id}}_form').submit();">N</button>
                        <form id="admin_{{$user->user_id}}_form" style="width:0px; height:0px" action="/acceptMember" method="post">
                            <input type="hidden" value="{{ $user->user_id }}" name="user"></input>
                            <input type="hidden" value="{{ $user->project_id }}" name="project"></input>
                            <input type="hidden" value="{{ Session::token() }}" name="_token">
                            {{ csrf_field() }}
                        </form>
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
    
    <form action="/write_post" method="post">
       <div class="form-group">
           <textarea class="form-control" name="title" id="new-post" rows="1" placeholder="Your Post's Title"></textarea>
           <textarea class="form-control" name="summary" id="new-post" rows="2" placeholder="Your Post's Summary or Short Description"></textarea>
           <textarea style="height:450px" name="info" id="new-post-info" rows="20"></textarea>
       </div>
       <button type="submit" class="btn btn-primary">Create Post</button>
       <input type="hidden" value="{{ Session::token() }}" name="_token">
       {{ csrf_field() }}
    </form>
</div>
@endsection
</div>