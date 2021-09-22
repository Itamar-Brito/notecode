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
        $this->model->language = $request->language;
        $this->model->private = $request->private == "on" ? 1 : 0;
        $this->model->notecode = $request->notecode;
        $this->model->user_id = $fromApi ? 1 : auth()->user()->id;
        $this->model->save();

        return $this->model;
    }

    public function destroy($id) 
    {
                      //Note::findOrFail($id)->delete()
        $this->model->findOrFail($id)->delete();

    }

    public function getAll()
    {    
        return $this->model->with('user','coments')->get();
    }
}
