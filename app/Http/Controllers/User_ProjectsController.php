<?php 
namespace SoftwareHerd\Http\Controllers;

use SoftwareHerd\user_projects;
use Illuminate\Http\Request;

class User_ProjectsController extends Controller
{
	public function project_members($id)
	{
		$user_projects = user_projects::get()->where('project_id', $id);
		$single_project = user_projects::get()->where('project_id', $id)->first();
		return view('project_members', array('user_projects' => $user_projects, 'single_project' => $single_project));
	}

}