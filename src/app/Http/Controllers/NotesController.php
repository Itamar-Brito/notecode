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
        $notecodes = Note::where('user_id', $user)->orderBy('created_at', 'DESC')->get();
        return (view('notesviews.index', compact('user', 'notecodes')));
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
        $AllNotes = $AllNotes->getAll();
        return view('notesviews.publicnotes', compact('AllNotes'));
    }
}
