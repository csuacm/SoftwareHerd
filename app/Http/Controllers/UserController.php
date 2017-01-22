<?php
namespace SoftwareHerd\Http\Controllers;

use SoftwareHerd\User;
use Illuminate\Http\Request;
use Auth;
use Image;

class UserController extends Controller
{

	public function user($id) {
		$user = User::find($id);
		return view('user', array('user' => $user));
	}

	public function update_avatar(Request $request){
    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
    		$user = Auth::user();
    		$user->avatar = $filename;
    		$user->save();
    	}
    	return view('user', array('user' => $user ));
    }


	public function update_user(request $request) {
		$user = Auth::user();
		$user->name = $request['name'];
		$user->email = $request['email'];
		$user->github_link = $request['github_link'];
		$user->website_link = $request['website_link'];
		$user->bio = $request['bio'];
		$user->save();

		return redirect('/user/' . $user->id);
	}
	
	public function deleteUser(request $request) {
		$user = User::find($request['id']);
		$user->delete();
		return array('success' => 'true');

	}

}