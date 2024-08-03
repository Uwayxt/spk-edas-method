<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class KaprodiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Pak Kusnadi',
            'email' => 'admin20@gmail.com',
            'password' => Hash::make('admin#123'),
            'role' => 'kaprodi-TI'
        ]);
        User::create([
            'name' => 'Pak Willy',
            'email' => 'admin30@gmail.com',
            'password' => Hash::make('admin#123'),
            'role' => 'kaprodi-TI'
        ]);
    }
}
