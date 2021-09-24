<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\User;
use App\Repository\NotesRepository;

class ApiController extends Controller
{
    private $fromApi = true;

    public function createCodes(Request $request)
    {
        $repository = new NotesRepository;
        $repository->create($request, $this->fromApi);

        return response()->json([
            "message" => "Code note created"
        ], 201);
    }

    public function Getnotes()
    {
        $notes = Note::get()->toJson(JSON_PRETTY_PRINT);
        return response($notes, 200);
    }


    public function CountNotes()
    {
        //$notes = Note::all();
        $notes = Note::all()->count();
        $notes = [
            "total_notes" => $notes,
        ];
        $totalNotes = json_encode($notes, JSON_PRETTY_PRINT);
        //$totalNotes = $totalNotes->toJson(JSON_PRETTY_PRINT);
        return response($totalNotes, 200);
    }

    public function CountNotesPerUser()
    {
        $User = User::all();

        $notesforUser = [];

        foreach ($User as $user) {

            $totalItens = Note::where('user_id', $user->id)->count();

            $nUser = [
                "usuario" => $user->name,
                "total_de_Codigos" => $totalItens
            ];

            array_push($notesforUser, $nUser);
        }


        $notesforUser = json_encode($notesforUser, JSON_PRETTY_PRINT);
        return response($notesforUser, 200);
    }

    public function notesOfUser($id)
    {
        $totalCodesOfUser = Note::select("user_id", 'id', 'created_at', 'updated_at')->where('user_id', $id)->get();


        $totalCodesOfUser = $totalCodesOfUser->toJson(JSON_PRETTY_PRINT);
        return response($totalCodesOfUser, 200);
    }

    
    public function adressofUser($id)
    {
        $cep = User::where('id', $id)->first();

        // https://viacep.com.br/ws/83070152/json/
        $jsonurl = "https://viacep.com.br/ws/" . $cep->cep . "/json/";
        $json = file_get_contents($jsonurl);
        return response($json, 200);
    }
}
