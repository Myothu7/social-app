<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = Comment::create($request->only('name', 'post_id', 'user_id'));
        if($comment) {
            return response()->json([
                'success' => true,
                'msg' => 'Create Successfully!'
            ]);
        }
    }

    public function show($id)
    {
        $comment = Comment::with('user')->where('post_id', '=', 1)->get();
      
        if($comment) {
            return response()->json([
                'success' => true,
                'msg' => 'Comment Data',
                'data' => $comment
            ]);
        }else{
            return response()->json([
                'msg' => 'error'
            ]);
        }
    }
}
