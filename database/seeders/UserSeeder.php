<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'administrador',
            'email' => 'administrador@bingo.com',
            'password' => Hash::make('123456')
        ]);

        $admin->assignRole('admin');

        $advanced = User::create([
            'name' => 'avanzado',
            'email' => 'avanzado@bingo.com',
            'password' => Hash::make('123456')
        ]);

        $advanced->assignRole('advanced');

        $agent = User::create([
            'name' => 'agente',
            'email' => 'agente@bingo.com',
            'password' => Hash::make('123456')
        ]);

        $agent->assignRole('agent');

        $guest = User::create([
            'name' => 'cliente',
            'email' => 'cliente@bingo.com',
            'password' => Hash::make('123456')
        ]);

        $guest->assignRole('guest');
    }
}
