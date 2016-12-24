<?php 
namespace SoftwareHerd\Http\Controllers;

use SoftwareHerd\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
	public function projectCommentPost(request $request)
	{
		$comment = new Comment();
		$comment->title = $request['title'];
		$comment->description = $request['description'];
		$comment->posting_project = $request->project()->id;
		//$request->projects()->posts->save($post);
		return view('home');
	}
}