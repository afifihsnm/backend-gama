<?php

namespace App\Repositories\MitraAuth;

use App\Models\manager;

interface AuthRepository {
    public function addManager(array $dataManager): manager;
}