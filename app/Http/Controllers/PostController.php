<?php 
namespace SoftwareHerd\Http\Controllers;

use SoftwareHerd\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
	public function projectCreatePost(request $request)
	{
		$post = new Post();
		$post->title = $request['title'];
		$post->description = $request['description'];
		$post->posting_project = $request->project()->id;
		//$request->projects()->-posts->save($post);
		return view('home');
	}

	public function post($id) {
		$post = Post::find($id);
		return view('news_post', array('post' => $post));
	}
}