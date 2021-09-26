<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\ComentRepository;

class ComentController extends Controller
{
    public function postComent($id,$coment)
    {
        /*
        $request = new Coment;
        $request->coment = $coment;
        $request->user = auth()->user()->name;
        $request->note_id = $id;
        $request->save();
        */

        $newComent = new ComentRepository;
        $newComent->create($id,$coment);
    }
}
