<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\User;

class ApiController extends Controller
{
    public function createCodes (Request $request) {
        $code = new Note;
        $code->title = $request->title;
        $code->language = $request->language;
        $code->private = true;
        $code->notecode = $request->notecode;
        $code->user_id = 1;
        $code->save();

        return response()->json([
            "message" => "Code note created"
        ], 201);
        }
}
