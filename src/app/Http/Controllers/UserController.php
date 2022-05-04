<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repository\UserRepository;
use App\Services\GetUserAdressFromViaCepService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepository;
    protected $getUserAdressFromViaCepService;

    public function __construct(UserRepository $userRepository, GetUserAdressFromViaCepService $getUserAdressFromViaCepService)
    {
        $this->userRepository = $userRepository;
        $this->getUserAdressFromViaCepService = $getUserAdressFromViaCepService;
    }

    public function show(User $user)
    {
       return $this->userRepository->showById($user);
    }


    public function adressofUser($id)
    {
        return $this->getUserAdressFromViaCepService->getAdressById($id);
    }

    public function notesByUser($id)
    {
       return $this->userRepository->getUserWithNotes($id);
    }
}
