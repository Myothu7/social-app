<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use PDO;
use App\Http\Resources\TestCollection;
use App\Models\Feeling;
use Illuminate\Support\Benchmark;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $feelings = Feeling::all();

        // return $posts;
        return view('frontend.post.index', compact('posts', 'feelings'));
        
    }
  
    public function store(Request $request)
    {
        if( $request->hasFile('photo') ) {
            $photo_type = $request->file('photo')->getClientOriginalExtension();

            if($photo_type == 'png' || $photo_type == 'jpg' || $photo_type == 'jpeg') {
                $path = $request->file('photo')->store('images','public');
            }
        }
        
        $post = Post::create([
            'user_id' => $request->user_id,
            'feeling_id' =>$request->feeling_id,
            'content' => $request->content,
            'photo' => $path ?? null,
            'status' => $request->status,   
        ]
        );

        return back();

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
