<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Http\Request;

class UserRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new User;
    }
/*
    public function showById($id){
        return $this->model->findOrFail($id);
    } */

    public function showById(User $user)
    {
        return $user;
    }


    public function getAllUsers()
    {
        return $this->model->all();
    }


    public function getUserWithNotes($id)
    {

        return $this->model->whereId($id)->with('notes')->get();
    }


    public function getFirstById($id)
    {
        return $this->model->whereId($id)->first();
    }
}
