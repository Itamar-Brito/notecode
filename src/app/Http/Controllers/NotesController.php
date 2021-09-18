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

    public function createCodesform (Request $request) {

        $code = new Note;
        $code->title = $request->title;
        $code->language = $request->language;
        
        $code->private = $request->private=="on" ? 1:0;
        $code->notecode = $request->notecode;
        $code->user_id = auth()->user()->id;
        $code->save();

        return redirect('/');
        }

}
