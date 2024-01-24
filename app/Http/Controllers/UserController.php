<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;

class UserController extends Controller
{
    public function media(Request $request)
    {
        dd('dd');
        $data = [];
        if($request->hasFile('profile_photo')) {
            $data['profile_photo'] = $request->file('profile_photo')->store('profile_images','public');
        }else{
            $data['cover_photo'] = $request->file('cover_photo')->store('profile_images','public');
        }

        return $data;
        // $media->save();

        return redirect()->route('profile');

    }
}
