<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Feeling;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FeelingController extends Controller
{
    public function index(): Response
    {
        return response()->json([
               'success' => true,
               'msg' => 'All Feeling',
               'data' =>  Feeling::all()
        ]);
    }

    public function store(Request $request)
    {
        $feel = Feeling::create([
            'name' => $request->name
        ]);

        return response()->json([
            'success' => true,
            'msg' => 'Upload Successfully!',
            'data' => $feel
        ]);
    }

    
}
