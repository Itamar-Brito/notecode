<?php

namespace App\Repository;

use App\Models\Note;
use Illuminate\Http\Request;

class NotesRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new Note;
    }


    public function create(Request $request, bool $fromApi = false)
    {

        $this->model->title = $request->title;
        $this->model->language = $request->language ?? "";
        $this->model->private = $request->private == "on" ? 1 : 0;
        $this->model->notecode = $request->notecode;
        $this->model->user_id = $fromApi ? 1 : auth()->user()->id;
        $this->model->save();

        return $this->model;
    }


    public function destroy($id)
    {
        $this->model->findOrFail($id)->delete();
    }


    public function show($id)
    {
        return $this->model->findOrFail($id);
    }


    public function getAllprivateNotes()
    {
        $user = auth()->user()->id;
        return $this->model->where('user_id', $user)->orderBy('created_at', 'DESC')->get();
    }


    public function searchByTerm($term)
    {
        return $this->model
            ->where([
                ['title', 'like', '%' . $term . '%']
            ])
            ->orWhere([
                ['notecode', 'like', '%' . $term . '%']
            ])
            ->orderBy('created_at', 'DESC')->get();
    }


    public function getAllpublic()
    {
        return $this->model
            ->where('private', 0)
            ->with('user', 'coments')
            ->orderBy('created_at', 'DESC')
            ->get();
    }


    public function update(Request $request){
        $this->model->findOrFail($request->id)->update($request->all());
    }


    public function countTotalNotes()
    {
        return $this->model->all()->count();
    }


    public function countTotalNotesByUser($id)
    {
        return $this->model->where('user_id', $id)->count();
    }


    public function getNotesByUser($id)
    {
        return $this->model->select("user_id", 'notecode' , 'id', 'created_at', 'updated_at')->where('user_id', $id)->get();
    }
}
