<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function index(Request $request)
    {
        return Like::all();
    }

    public function store(Request $request)
    {
        // return $request->all();
        $like = Like::create([
            'post_id' => $request->post_id,
            'user_id' => $request->user_id
        ]);

        if($like) {
           return response()->json([
                'status' => true ,
                'msg' => 'Create successfully!',
            ], 200);
        }
    }

    public function destory(Request $request)
    {
        $like = Like::where('post_id','=', $request->post_id)
                      ->where('user_id', '=', $request->user_id)
                      ->delete();
        return response()->json([
            'status' => true,
            'msg' => 'Delete Successfully!'
        ]);
    }
}
