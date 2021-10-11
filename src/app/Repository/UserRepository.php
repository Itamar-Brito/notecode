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

    public function getAdressById($id)
    {

    $cep = $this->model->whereId($id)->first();

             // https://viacep.com.br/ws/    83070152      /json/
    $jsonurl = "https://viacep.com.br/ws/" . $cep->cep . "/json/";
    $json = file_get_contents($jsonurl);

    return response($json, 200)->withHeaders([
            "Content-Type"=> "application/json",
            "Accept" => "application/json"
        ]);
    }

}