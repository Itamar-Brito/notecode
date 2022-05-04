<?php

namespace App\Services;

use App\Repository\UserRepository;

class GetUserAdressFromViaCepService
{

    const VIA_CEP_URL_PREFIX = "https://viacep.com.br/ws/";

    const VIA_CEP_URL_SUFFIX  = "/json/";

    protected $userRepository;


    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function getAdressById($id)
    {
        $user = $this->userRepository->getFirstById($id);

        $json = file_get_contents(self::VIA_CEP_URL_PREFIX . $user->cep . self::VIA_CEP_URL_SUFFIX);

        return response($json, 200)->withHeaders([
            "Content-Type" => "application/json",
            "Accept" => "application/json"
        ]);
    }
}
