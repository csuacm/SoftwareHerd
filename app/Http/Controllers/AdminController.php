<?php 
namespace SoftwareHerd\Http\Controllers;

use SoftwareHerd\User;
use SoftwareHerd\Post;
use SoftwareHerd\Project;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getAdmin() {
        $users = User::all();
        $projects = Project::all();
        return view('admin/admin', array('users' => $users, 'projects' => $projects));
    }
}