<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FeedBack;
use App\Models\Comment;

class FeedBackController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       // print_r(Auth::user());
       $data = FeedBack::with('user')->where('created_by',Auth::user()->id)->orderBy('id','DESC')->paginate(10);
        return view('feedback',compact('data'));
    }

    public function addFeedBack(Request $request)
    {
        $this->validate($request, [
            'title'   => 'required',
            'category' => 'required',
            'description' => 'required'
        ]);

        $FeedBack = new FeedBack();
        $FeedBack->title = $request->title;
        $FeedBack->category = $request->category;
        $FeedBack->description = $request->description;
        $FeedBack->created_by = Auth::user()->id;
        $FeedBack->save();
        return redirect('/feed-back')->with('status', 'Feed back added!');
    }

    public function FeedBackDetail($id)
    {
        $comments = Comment::where('feed_back_id',$id)->where('status','Y')->orderBy('created_at','desc')->paginate(5);
        $data = FeedBack::with('user')->where('created_by',Auth::user()->id)->where('id',$id)->get();
        return view('feedbackdetail',compact('data','comments'));
    }

    public function listing()
    {
       // print_r(Auth::user());
       $data = FeedBack::with('user')->orderBy('id','DESC')->paginate(10);
        return view('admin/feed_back',compact('data'));
    }

    public function deletFeedBack($id){
        $feedback = FeedBack::find($id);
       $feedback->delete();
       return redirect('/admin/feed-back-list')->with('status', 'Feed back deleted!');
    }

}