<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function index(){

        return(view('notesviews.index'));
    }
}
