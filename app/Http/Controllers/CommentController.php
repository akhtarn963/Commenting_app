<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function addComment(Request $request)
    {
        $this->validate($request, [
            'name'   => 'required',
            'comment' => 'required'
        ]);

        $comment = new Comment();
        $comment->name = $request->name;
        $comment->comment = $request->comment;
        $comment->feed_back_id = $request->feed_back_id;
        $comment->save();
        return redirect('/feed-back-detail/'.$request->feed_back_id)->with('status', 'commented added!');
    }

    public function commentList(){
        $data = Comment::orderBy('id','DESC')->paginate(10);
        return view('admin/comment',compact('data'));
    }

    public function updateStatus(Request $request){
        $Comment = Comment::find($request->id);
        $Comment->status = $request->status;
        $Comment->save();
        return redirect('/admin/comments')->with('status', 'comment updated!');
    }

}