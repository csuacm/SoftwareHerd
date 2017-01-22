@extends('layouts.master')
@section('content')
<link rel="stylesheet" href="{{ URL::asset('/css/admin.css') }}">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well" style="text-align:center;"><b>Welcome {{Auth::user()->name}}</b></div>
            <div id="adminButtons" style="float:left; height:100%; width:15%;">
                  <a id="manageProject-btn">Manage Project</a>
                  <a id="manageMembers-btn">Manage Members</a>
                  <a id="managePosts-btn">Manage Posts</a>
            </div>
            <div id="adminContent" style="float:left; width:85%;">
                <div id="manageProject" style="display: none">
                    <a onclick="deleteProject({{$project->id}})">Delete</a>
                </div>
                <div id="manageMembers" style="display:none;">
                    <div style="width:45%; float:left">
                        <h4>Manage Current Members</h4>
                        <table class="table table-striped table-hover">
                            <tr>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Manage</th>
                            </tr>
                            @foreach($users->sortBy('user_id') as $user)
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
                                        <a onClick="demoteMember({{$user->user_id}}, {{$project->id}});"><i class="fa fa-level-down" aria-hidden="true"></i></a>
                                        <a onClick="promoteMember({{$user->user_id}}, {{$project->id}});"><i class="fa fa-level-up" aria-hidden="true"></i></a>
                                        @if($user->user_id != Auth::user()->id)
                                        <a onClick="removeMember({{$user->user_id}}, {{$project->id}});"><i class="fa fa-user-times" aria-hidden="true"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div style="width:45%; float:right">
                        <h4>Manage Membership Requests</h4>
                        <table class="table table-striped table-hover">
                            <tr>
                                <th width="20%">Name</th>
                                <th width="60%">Request</th>
                                <th width="20%">Manage</th>
                            </tr>
                            @foreach($user_requests as $user)
                                <tr>
                                    <td>{{$user->user_name}}</td>
                                    <td class="no-overflow">{{$user->reason}}</td>
                                    <td>
                                        <a onClick="acceptMember({{$user->user_id}}, {{$project->id}});"><i class="fa fa-user-plus" aria-hidden="true"></i></a>
                                        <a onClick="rejectMember({{$user->user_id}}, {{$project->id}});"><i class="fa fa-user-times" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div id="managePosts" style="display:none">
                    <table class="table table-striped table-fixed table-hover" style="width:100%">
                        <tr>
                            <th style="width:5%">ID#</th>
                            <th style="width:20%">Title</th>
                            <th style="width:45%">Summary</th>
                            <th style="width:10%">Comments</th>
                            <th style="width:20%">Manage</th>
                            </tr>
                        <tr style="cursor:pointer" class="table-hover" onclick="newPost();">
                            <td></td>
                            <td onclick="newPost();"><i class="fa fa-plus-square-o fa-6" aria-hidden="true"></i> New Post</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @foreach($project->posts->sortByDesc('created_at') as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td class="no-overflow"><a href="/news_post/{{$post->id}}">{{$post->title}}</a></td>
                                <td class="no-overflow">{{$post->summary}}</td>
                                <td>{{$post->comments->count()}}</td>
                                <td>
                                    <a onClick="editPost({{$post->id}});"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a onClick="deletePost({{$post->id}});"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div id="newPost" style="display: none;">
                    <script type="text/javascript" src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
                    <script type="text/javascript">
                      tinymce.init({
                        selector : "#new-post-info",
                        plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste"],
                        toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
                      }); 
                    </script>
                    
                    <form id="new-post-form" action="/createPost" method="post">
                       <div class="form-group">
                           <textarea class="form-control" name="title" id="new-post-title" rows="1" placeholder="Your Post's Title"></textarea>
                           <textarea class="form-control" name="summary" id="new-post-summary" rows="2" placeholder="Your Post's Summary or Short Description"></textarea>
                           <textarea class="form-control" style="height:450px" name="info" id="new-post-info" rows="20"></textarea>
                       </div>
                       <button type="submit" class="btn btn-primary">Submit</button>
                       <input type="hidden" value="{{ Session::token() }}" name="_token">
                       <input type="hidden" value="{{ $project->id }}" name="project_id">
                       <input type="hidden" id="update-post-id" value="" name="post_id">
                       {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('/js/project_admin/main.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/project_admin/members.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/project_admin/posts.js') }}"></script>
@endsection