<?php

namespace App\Http\Controllers;
use App\Models\Note;
use App\Models\User;

use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function index(){

        $user = auth()->user()->id;
        $notecodes = Note::where('user_id', $user)->orderBy('created_at', 'DESC')->get();
        return(view('notesviews.index', compact('user', 'notecodes')));

    }

    public function newnote() {
        
        return(view('notesviews.newnote'));
    }
}
