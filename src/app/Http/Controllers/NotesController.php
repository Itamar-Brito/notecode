<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use App\Repository\NotesRepository;
use Illuminate\Http\Request;

class NotesController extends Controller
{

    protected $notesRepository;

    public function __construct(NotesRepository $notesRepository)
    {
        $this->notesRepository = $notesRepository;
    }

    public function index()
    {
        $user = auth()->user()->id;

        $buscacode = request('buscacode');


        if ($buscacode) {
            $notecodes = $this->notesRepository->searchByTerm($buscacode);
        } else {
            $notecodes = $this->notesRepository->getAllprivateNotes();
        }


        return (view('notesviews.index', compact('user', 'notecodes', 'buscacode')));
    }

    public function newnote()
    {
        return (view('notesviews.newnote'));
    }

    public function createCodesform(Request $request)
    {
        $this->notesRepository->create($request);

        return redirect('/')->with('msg', 'Código Criado com sucesso!');;
    }

    public function editnote(Request $request)
    {
        $this->notesRepository->update($request);

        return redirect('/')->with('msg', 'Código editado com sucesso!');
    }

    public function deleteCodesForm($id)
    {
        $this->notesRepository->destroy($id);

        return redirect('/')->with('msg', 'Código deletado com sucesso!');
    }

    public function publicNote()
    {
        $AllNotes = $this->notesRepository->getAllpublic();
        $loggedUser = auth()->user()->name;
        return view('notesviews.publicnotes', compact('AllNotes', 'loggedUser'));
    }

    public function showNote($id)
    {
        $getNote = $this->notesRepository->show($id);

        return view('notesviews.shownote', compact('getNote'));
    }
}
