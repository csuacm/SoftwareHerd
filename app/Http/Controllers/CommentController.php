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
		$comment->post_id = $request->id;
		$comment->user_id = $request->user()->id;
		$comment->save();
		return redirect('/news_post/'.$request->id);
	}
}