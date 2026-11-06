<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Admin\Market\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller{

   public function index(){
        $unSeenComments = Comment::where('commentable_type', 'App\Models\Market\Product')->where('seen', 0)->get();
        foreach ($unSeenComments as $unSeenComment){
            $unSeenComment->seen = 1;
        }
        // $comments=Comment::query()->whereNull('parent_id')->latest()->paginate(10);
        $comments = Comment::latest()->where('commentable_type', 'App\Models\Market\Product')->paginate(3);
        return view('admin.market.comment.index', compact('comments'));


    }


}
