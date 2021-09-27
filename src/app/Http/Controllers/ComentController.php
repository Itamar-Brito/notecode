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


    public function deleteComentForm($id,$note)
    {
        $repository = new ComentRepository;
        $repository->destroy($id);

        return redirect('/shownote/'.$note)->with('msg', 'Comentário deletado com sucesso!');
    }
}
