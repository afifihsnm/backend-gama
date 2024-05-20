<?php

namespace App\Services\MitraAuth;

use App\Models\manager;
use App\Repositories\MitraAuth\AuthRepository;

class AuthServiceImpl implements AuthService {

    protected AuthRepository $authRepository;

    public function __construct(AuthRepository $authRepository) {
        $this->authRepository = $authRepository;
    }

    public function addDataManager(array $dataManager): manager
    {
        return $this->authRepository->addManager($dataManager);
    }
}