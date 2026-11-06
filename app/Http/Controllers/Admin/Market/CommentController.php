<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Admin\Market\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller{

   public function index(){
        $unSeenComments = Comment::where('commentable_type', 'App\Models\Market\Product')->where('seen', 0)->get();
        foreach ($unSeenComments as $unSeenComment){
            $unSeenComment->seen = 1;
        }
        $comments=Comment::query()->where('commentable_type', 'App\Models\Admin\Market\Product')->whereNull('parent_id')->latest()->paginate(10);
        return view('admin.market.comment.index', compact('comments'));

    }

    public function show(Comment $comment){
        return view('admin.market.comment.show', compact('comment'));
    }

    public function approved(Comment $comment){
        $comment->approved =1;
        $comment->save();
         return back()->with('success','نظر با موفقیت تایید شد');
    }

    public function unApproved(Comment $comment){
        $comment->approved =2;
        $comment->save();
         return back()->with('success','نظر با موفقیت رد شد');
    }

    public function answer(Request $request,Comment $comment){

            $request->validate([
                 'body' => 'required|min:2|max:1000|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u'
            ]);

            $inputs = $request->all();
            $inputs['author_id'] = Auth::id();
            $inputs['parent_id'] = $comment->id;
            $inputs['commentable_id'] = $comment->commentable_id;
            $inputs['commentable_type'] = $comment->commentable_type;
            $inputs['approved'] = 1;
            $comment = Comment::create($inputs);
             return to_route('admin.market.comment.index')->with('success','پاسخ نظر با موفقیت ثبت شد');

    }


    public function allApproved(){
        $comments=Comment::query()->approvedComment()->latest()->paginate(12);
        return view('admin.market.comment.index',compact('comments'));
    }


    public function allUnApproved(){
        $comments=Comment::query()->unApprovedComment()->latest()->paginate(12);
        return view('admin.market.comment.index',compact('comments'));
    }







}
