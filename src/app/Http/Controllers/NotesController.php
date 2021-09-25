<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use App\Repository\NotesRepository;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function index()
    {
        $user = auth()->user()->id;

        $buscacode = request('buscacode');

        $myCodes = new NotesRepository;

        if ($buscacode ) { 
            $notecodes = $myCodes->searchByTerm($buscacode);
        }else{
            $notecodes = $myCodes->getAllprivateNotes();
        }


        return (view('notesviews.index', compact('user', 'notecodes','buscacode')));
    }

    public function newnote()
    {
        return (view('notesviews.newnote'));
    }

    public function createCodesform(Request $request)
    {
        $repository = new NotesRepository;
        $repository->create($request);

        return redirect('/')->with('msg', 'Código Criado com sucesso!');;
    }

    public function editnote(Request $request)
    {

        Note::findOrFail($request->id)->update($request->all());

        return redirect('/')->with('msg', 'Código editado com sucesso!');
    }

    public function deleteCodesForm($id)
    {
        $repository = new NotesRepository;
        $repository->destroy($id);

        return redirect('/')->with('msg', 'Código deletado com sucesso!');
    }

    public function publicNote()
    {
        $AllNotes = new NotesRepository;
        $AllNotes = $AllNotes->getAllpublic();
        $loggedUser = auth()->user()->name;
        return view('notesviews.publicnotes', compact('AllNotes','loggedUser'));
    }
}
