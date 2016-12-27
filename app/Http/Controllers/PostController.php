<?php 
namespace SoftwareHerd\Http\Controllers;

use SoftwareHerd\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
	public function createPost(request $request)
	{
		$post = new Comment();
		$post->title = $request['info'];
		$post->summary = $request['summary'];
		$post->info = $request['info'];
		$post->posting_project = $request->id;
		$post->save();
		return redirect('/project/'.$request->id);
	}

	public function post($id) {
		$post = Post::find($id);
		return view('news_post', array('post' => $post));
	}
}