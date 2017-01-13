<?php 
namespace SoftwareHerd\Http\Controllers;

use SoftwareHerd\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
	public function createComment(request $request)
	{
		$comment = new Comment();
		$comment->data = $request['data'];
		$comment->post_id = $request['post_id'];
		$comment->user_id = $request['user_id'];
		$comment->save();
		
		return array('success' => 'true');
	}
	
	public function deleteComment(request $request) {
		Comment::Find($request['id'])->delete();
		return array('success' => 'true');
	}
}