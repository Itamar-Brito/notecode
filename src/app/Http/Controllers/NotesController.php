<?php

namespace App\Http\Controllers;
use App\Models\Note;
use App\Models\User;

use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function index(){

        $user = auth()->user()->id;
        $notecodes = Note::where('user_id', $user)->get();
        return(view('notesviews.index', compact('user', 'notecodes')));
    }
}
