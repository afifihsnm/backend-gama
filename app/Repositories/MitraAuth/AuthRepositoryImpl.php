<?php

namespace App\Repositories\MitraAuth;

use App\Models\manager;
use App\Repositories\MitraAuth\AuthRepository;

class AuthRepositoryImpl implements AuthRepository{
    public function addManager(array $dataManager): manager
    {
        $manager = new manager();
        $manager->name = $dataManager['name'];
        $manager->username = $dataManager['username'];
        $manager->address = $dataManager['address'];
        $manager->email = $dataManager['email'];
        $manager->password = $dataManager['password'];
        $manager->save();

        return $manager;
    }
}