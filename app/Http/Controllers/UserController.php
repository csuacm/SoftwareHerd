<?php
namespace SoftwareHerd\Http\Controllers;

use SoftwareHerd\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

	public function user($id) {
		$user = User::find($id);
		return view('user', array('user' => $user));
	}

}