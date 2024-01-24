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
use App\Models\Media;
use Illuminate\Support\Benchmark;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {

        $feelings = Feeling::all();
        $posts = Post::orderBy('id', 'desc')->get();
        $media = Media::where('user_id', auth()->user()->id)->get();
        return view('frontend.post.index', compact('feelings', 'posts', 'media'));

    }

    public function store(Request $request)
    {
        if( $request->hasFile('photo') ) {
            $photo_type = $request->file('photo')->getClientOriginalExtension();
            $path = $request->file('photo')->store('images','public');
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

    public function posts()
    {
        $data = User::with('posts','media')
                      ->where('id', auth()->user()->id)
                      ->get();
        // return $data;
        return view('frontend.profile.index', compact('data'));
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
