<?php 
namespace SoftwareHerd\Http\Controllers;

use SoftwareHerd\Project;
use SoftwareHerd\User_Projects;
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
		$request->user()->projects()->save($project);
		
		$connection = new User_Projects();
		$connection->user_id = $request->user()->id;
		$connection->project_id = $project->id;
		$connection->user_name = $request->user()->name;
		$connection->project_name = $project->title;
		$connection->level = 3;
		$connection->save();
		return redirect('/project/'.$project->id);
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
		return view('project_admin', array('project' => $project));
	}
	
	public function promote($user_id, $project_id) {
		$level = \DB::table('user_projects')->where('user_id', $user_id)->where('project_id', $project_id)->value('level');
		$level = $level + 1;
		\DB::table('user_projects')->where('user_id', $user_id)
				->where('project_id', $project_id)
				->update(['level' => $level]);
				
		return redirect('/project_admin/'.$project_id);
	}
	public function demote($user_id, $project_id) {
		$level = \DB::table('user_projects')->where('user_id', $user_id)->where('project_id', $project_id)->value('level');
		$level = $level - 1;
		\DB::table('user_projects')->where('user_id', $user_id)
				->where('project_id', $project_id)
				->update(['level' => $level]);
				
		return redirect('/project_admin/'.$project_id);
	}
	
	public function removeMember($user_id, $project_id) {
		\DB::table('user_projects')->where('user_id', $user_id)
				->where('project_id', $project_id)
				->delete();
		
		return redirect('/project_admin/'.$project_id);
	}
}