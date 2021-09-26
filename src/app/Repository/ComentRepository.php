<?php

namespace App\Repository;

use App\Models\Coment;
use Illuminate\Http\Request;

class ComentRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new Coment;
    }

    public function create($id,$coment)
    {
        $this->model->coment = $coment;
        $this->model->user = auth()->user()->name;
        $this->model->note_id = $id;
        $this->model->save();
    }
}