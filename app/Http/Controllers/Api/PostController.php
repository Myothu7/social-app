<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use PDO;
use App\Http\Resources\TestCollection;
use Illuminate\Support\Benchmark;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->get();
        // return $posts;
        return view('frontend.post.index', compact('posts'));
        
    }
  
    public function store(Request $request)
    {
        dd($request->all());
        $posts = Post::create(
            $request->only('user_id','feeling_id','title','content','photo')
        );
        return response()->json([
                    'success' => true,
                    'msg' => 'Registration successfully!',
                    'data' =>  $posts
                ], 200); 

    }
    
    public function show(string $id)
    {
        //
    }
   
    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
