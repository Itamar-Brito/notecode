<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\User;
use App\Models\Coment;
use App\Repository\NotesRepository;

class ComentController extends Controller
{
    public function postComent($id,$coment){
        $request = new Coment;
        $request->coment = $coment;
        $request->user = auth()->user()->name;
        $request->note_id = $id;
        $request->save();
        
    }

}
