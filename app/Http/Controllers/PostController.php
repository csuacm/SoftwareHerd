<?php 
namespace SoftwareHerd\Http\Controllers;

use SoftwareHerd\Post;
use SoftwareHerd\Project;
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
		return redirect('/news_post/'.$post->id);
	}

	public function post($id) {
		$post = Post::find($id);
		$project = Project::find($post->posting_project);
		return view('news_post', array('post' => $post, 'project' => $project));
	}
	
	public function getPostForEdit(request $request) {
		$post = Post::find($request['id']);
		return array('title' => $post->title, 'summary' => $post->summary, 'info' => $post->info);
	}

	public function updatePost(request $request)
	{
		$post = Post::find($request['post_id']);
		$post->title = $request['title'];
		$post->summary = $request['summary'];
		$post->info = $request['info'];
		$post->save();
		
		return redirect('/news_post/'.$request['post_id']);
	}
	
	public function deletePost(request $request) {
		$post = Post::Find($request['id']);
		foreach($post->comments as $comment)
			$comment->delete();
			
		$post->delete();
		return array('success' => 'true');
	}
}