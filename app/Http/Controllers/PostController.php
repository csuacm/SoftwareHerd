<?php 
namespace SoftwareHerd\Http\Controllers;

use SoftwareHerd\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
	public function createPost(request $request)
	{
		$post = new Post();
		$post->title = $request['title'];
		$post->summary = $request['summary'];
		$post->info = $request['info'];
		$post->posting_project = $request['project_id'];
		$post->save();
		return redirect('/project/'.$request['project_id']);
	}

	public function post($id) {
		$post = Post::find($id);
		return view('news_post', array('post' => $post));
	}
}