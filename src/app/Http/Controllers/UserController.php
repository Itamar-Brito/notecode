<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repository\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function show(User $user)
    {
       return $this->userRepository->showById($user);
    }


    public function adressofUser($id)
    {
        return $this->userRepository->getAdressById($id);
    }

    public function notesByUser($id)
    {
       return $this->userRepository->getUserWithNotes($id);
    }
}
