<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\User;
use App\Repository\NotesRepository;
use App\Repository\UserRepository;

class ApiController extends Controller
{

    private $fromApi = true;

    protected $noteRepository;

    protected $userRepository;

    public function __construct(NotesRepository $noteRepository, UserRepository $userRepository)
    {
        $this->noteRepository = $noteRepository;
        $this->userRepository = $userRepository;
    }


    public function createCodes(Request $request)
    {
        $this->noteRepository->create($request, $this->fromApi);

        return response()->json([
            "message" => "Code note created"
        ], 201)
        ->header('Content-Type', 'application/json')
        ->header('Accept', 'application/json');
    }

    public function getnotes()
    {

        $notes = $this->noteRepository->getAllpublic()->toJson(JSON_PRETTY_PRINT);
        return response($notes, 200)
            ->header('Content-Type', 'application/json')
            ->header('Accept', 'application/json');
    }


    public function countNotes()
    {

        $notes = [
            "total_notes" => $this->noteRepository->countTotalNotes(),
        ];

        $totalNotes = json_encode($notes, JSON_PRETTY_PRINT);

        return response($totalNotes, 200)
        ->header('Content-Type', 'application/json')
        ->header('Accept', 'application/json');
    }

    public function countNotesPerUser()
    {
        $notesforUser = [];

        foreach ( $this->userRepository->getAllUsers() as $user ) {

            $nUser = [
                "usuario" => $user->name,
                "total_de_Codigos" => $this->noteRepository->countTotalNotesByUser($user->id)
            ];

            array_push($notesforUser, $nUser);
        }


        $notesforUser = json_encode($notesforUser, JSON_PRETTY_PRINT);
        return response($notesforUser, 200)
        ->header('Content-Type', 'application/json')
        ->header('Accept', 'application/json');
    }

    public function notesOfUser($id)
    {
        return response(
            $this->noteRepository->getNotesByUser($id)->toJson(JSON_PRETTY_PRINT)
        , 200)
        ->header('Content-Type', 'application/json')
        ->header('Accept', 'application/json');
    }
}
