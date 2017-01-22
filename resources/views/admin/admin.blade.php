@extends('layouts.master')
@section('content')
<link rel="stylesheet" href="{{ URL::asset('/css/admin.css') }}">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well" style="text-align:center;"><b>Welcome {{Auth::user()->name}}</b></div>
            <div id="adminButtons" style="float:left; height:100%; width:15%;">
                  <a id="manageSite-btn">Manage Web-app</a>
                  <a id="manageMembers-btn">Manage Users</a>
                  <a id="manageProjects-btn">Manage Projects</a>
            </div>
            <div id="adminContent" style="float:left; width:85%;">
                <div id="manageSite" style="display: none">
                    Manage the site
                </div>
                <div id="manageMembers" style="display:none;">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Manage</th>
                        </tr>
                        @foreach($users->sortBy('user_id') as $user)
                            <tr>
                                <td style="width:10%">{{$user->id}}</td>
                                <td style="width:30%">{{$user->name}}</td>
                                <td style="width:30%">{{$user->email}}</td>
                                <td>
                                    <a onClick="deleteUser({{$user->id}});"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div id="manageProjects" style="display:none">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Summary</th>
                            <th>Manage</th>
                        </tr>
                        @foreach($projects->sortByDesc('created_at') as $project)
                            <tr>
                                <td>{{$project->id}}</td>
                                <td>{{$project->title}}</td>
                                <td>{{$project->summary}}</td>
                                <td>
                                    <a onClick="deleteProject({{$project->id}});"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('/js/admin/main.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/admin/projects.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/admin/users.js') }}"></script>
@endsection