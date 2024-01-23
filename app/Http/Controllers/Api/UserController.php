<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Media;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function media(Request $request)
    {
        $media = new Media();
        if($request->hasFile('profile_photo')) {
            $media->profile_photo = $request->file('profile_photo')->store('profile_images','public');
        }else{
            $media->cover_photo = $request->file('cover_photo')->store('profile_images','public');
        }
        $media->user_id = $request->auth_id;
        $media->save();

        return response()->json(['msg'=>'Success']);
    }

    public function index()
    {
        $user = UserResource::collection(User::all());
        return $user;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
