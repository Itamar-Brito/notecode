<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user)
    {
        return $user;
    }

    public function adressofUser($id)
    {
        $cep = User::where('id', $id)->first();

        // https://viacep.com.br/ws/83070152/json/
        $jsonurl = "https://viacep.com.br/ws/" . $cep->cep . "/json/";
        $json = file_get_contents($jsonurl);
        return response($json, 200)
        ->header('Content-Type', 'application/json')
        ->header('Accept', 'application/json');
    }
}
