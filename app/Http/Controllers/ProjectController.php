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