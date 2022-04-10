<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function comment(Request $request, $postId){
        $request->validate([
            'text' => 'required'
        ]);
        Comment::create([
            'user_id' => Auth::user()->id,
            'post_id' => $postId,
            'text' => $request->text,
        ]);
        return back();
    }
}
