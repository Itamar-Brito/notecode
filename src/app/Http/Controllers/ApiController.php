<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\User;

class ApiController extends Controller
{
    public function createCodes (Request $request) {
        $code = new Note;
        $code->title = $request->title;
        $code->language = $request->language;
        $code->private = true;
        $code->notecode = $request->notecode;
        $code->user_id = 2;
        $code->save();

        return response()->json([
            "message" => "Code note created"
        ], 201);
        }

        public function Getnotes () {
           $notes = Note::get()->toJson(JSON_PRETTY_PRINT);
            return response($notes, 200);
            //$notes = Note::all();
            //$notes = Note::count($notes);

            }


            public function CountNotes () {
            //$notes = Note::all();
            $notes = Note::all()->count();
            $notes = [
                "total_notes" => $notes,
            ];
            $totalNotes = json_encode($notes, JSON_PRETTY_PRINT);
            //$totalNotes = $totalNotes->toJson(JSON_PRETTY_PRINT);
                 return response($totalNotes, 200);
     
        }

        public function CountNotesPerUser () {

            $User = User::all();

            $notesforUser = [];

            foreach ($User as $user) {

                $totalItens = Note::where('user_id', $user->id)->count();

                $nUser = [
                    "usuarior" => $user->name,
                    "total_de_Codigos" => $totalItens
                ];

                array_push($notesforUser,$nUser);
            }    


            $notesforUser = json_encode($notesforUser, JSON_PRETTY_PRINT);
                 return response($notesforUser, 200);
     
        }

}
