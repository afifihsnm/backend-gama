<?php

namespace App\Services\MitraAuth;

use App\Models\manager;

interface AuthService {
    public function addDataManager(array $dataManager): manager;
}