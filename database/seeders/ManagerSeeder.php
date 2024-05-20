<?php

namespace Database\Seeders;

use App\Models\manager;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $manager = new manager();
        $manager->name = 'Bank Sampah Budi Luhur';
        $manager->username = 'bank budi';
        $manager->address = 'Jl. Kompol Selatan Raya';
        $manager->email = 'bankluhur@gmail.com';
        $manager->password = Hash::make('budiluhur123');
        $manager->save();
    }
}
