<?php 
namespace SoftwareHerd\Http\Controllers;

use SoftwareHerd\Project;
use SoftwareHerd\User;
use SoftwareHerd\User_Projects;
use SoftwareHerd\User_Project_Requests;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

	public function projectCreateProject(request $request)
	{
		$project = new Project();
		$project->title = $request['title'];
		$project->description = $request['description'];
		$project->github_link = $request['github_link'];
		$project->slack_link = $request['slack_link'];
		$project->website_link = $request['website_link'];
		$project->get_involved_pitch = $request['get_involved_pitch'];
		$project->project_admin_user_id = $request->user()->id;
		$project->user_id = $request->user()->id;
		$project->save();
		
		$connection = new User_Projects();
		$connection->user_id = $request->user()->id;
		$connection->project_id = $project->id;
		$connection->user_name = $request->user()->name;
		$connection->project_name = $project->title;
		$connection->level = 3;
		$connection->save();
		return redirect('/project/'.$project->id);
	}
	
	public function pushRequest(request $request)
	{
		$connection = new User_Project_Requests();
		$connection->user_id = $request->user()->id;
		$connection->project_id = $request['project_id'];
		$connection->user_name = $request->user()->name;
		$connection->project_name = $request['project_name'];
		$connection->reason = $request['reason'];
		$connection->save();
		return redirect('/project/'.$request['project_id']);
	}

	public function project($id) {
		$project = Project::find($id);
		return view('project', array('project' => $project));
	}

	public function projects() {
		$projects = Project::orderBy('created_at', 'asc')->get();
		return view('project_library', array('projects' => $projects));
	}

	public function admin($id) {
		$project = Project::find($id);
		if(!\Auth::user()->can('admin', $project))
			return redirect('/project_library');
		$users = User_Projects::get()->where('project_id', $id);
		$user_requests = User_Project_Requests::get()->where('project_id', $id);
		return view('project_admin/admin', array('project' => $project, 'users' => $users, 'user_requests' => $user_requests));
	}
	
	public function promote(request $request) {
		$level = \DB::table('user_projects')->where('user_id', $request['user'])->where('project_id', $request['project'])->value('level');
		
		if($level > 2)
			return;
		
		$level = $level + 1;
		\DB::table('user_projects')->where('user_id', $request['user'])
				->where('project_id', $request['project'])
				->update(['level' => $level]);
				
		return array('success'=>'true');
	}
	public function demote(request $request) {
		$level = \DB::table('user_projects')->where('user_id', $request['user'])->where('project_id', $request['project'])->value('level');
		
		if($level < 1)
			return;
		
		$level = $level - 1;
		\DB::table('user_projects')->where('user_id', $request['user'])
				->where('project_id', $request['project'])
				->update(['level' => $level]);
				
		return array('success'=>'true');
	}
	
	public function removeMember(request $request) {
		\DB::table('user_projects')->where('user_id', $request['user'])
				->where('project_id', $request['project'])
				->delete();
		
		return array('success'=>'true');
	}

	public function acceptMember(request $request) {
		$result = \DB::table('user_project_requests')->where('user_id', $request['user'])
				->where('project_id', $request['project'])->first();
				
		$connection = new User_Projects();
		$connection->user_id = $result->user_id;
		$connection->project_id = $result->project_id;
		$connection->user_name = $result->user_name;
		$connection->project_name = $result->project_name;
		$connection->level = 0;
		$connection->save();
		
		\DB::table('user_project_requests')->where('user_id', $request['user'])
				->where('project_id', $request['project'])->delete();
		return array('success'=>'true');
	}
	
	public function declineMember(request $request) {
		\DB::table('user_project_requests')->where('user_id', $request['user'])
				->where('project_id', $request['project'])->delete();
		return array('success'=>'true');
	}
	
	public function deleteProject(request $request) {
		$project = Project::find($request['id']);
		$project->delete();
		return array('success'=>'true');
	}
}