<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repository\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function show(User $user)
    {
       $userData = new UserRepository;
       return $userData->showById($user);
    }


    public function adressofUser($id)
    {
        $addressUser = new UserRepository;
        return $addressUser->getAdressById($id);
    }

    public function notes($id)
    {
        $user = User::whereId($id);
        return $user->with('notes')->get();

        //$user = User::findOrFail($id);
        //return   $user->notes;

    }
}
