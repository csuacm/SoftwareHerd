<?php 
namespace SoftwareHerd\Http\Controllers;

use SoftwareHerd\Project;
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
		return view('home');
	}

	public function project($id) {
		$project = Project::find($id);
		return view('project', array('project' => $project));
	}

	public function projects() {
		$projects = Project::orderBy('created_at', 'asc')->get();
		return view('project_library', array('projects' => $projects));
	}

}