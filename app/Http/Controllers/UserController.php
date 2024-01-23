<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;

class UserController extends Controller
{
    public function media(Request $request)
    {
        $media = new Media();
        if($request->hasFile('profile_photo')) {
            $media->profile_photo = $request->file('profile_photo')->store('profile_images','public');
        }else{
            $media->profile_photo = $request->file('profile_photo')->store('profile_images','public');
        }

        $media->save();

        return redirect()->route('profile');

    }
}
