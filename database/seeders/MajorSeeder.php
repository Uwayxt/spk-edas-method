<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Major::create([
            'name' => 'SMA (MIPA)',
            'study_program' => 'TI',
            'value' => '3',
        ]);
        Major::create([
            'name' => 'RPL',
            'study_program' => 'TI',
            'value' => '4',
        ]);
        Major::create([
            'name' => 'DKV',
            'study_program' => 'TI',
            'value' => '2',
        ]);
        Major::create([
            'name' => 'TKJ',
            'study_program' => 'TI',
            'value' => '3',
        ]);
        Major::create([
            'name' => 'SMA (IPS)',
            'study_program' => 'MJ',
            'value' => '2',
        ]);
        Major::create([
            'name' => 'Akuntansi',
            'study_program' => 'MJ',
            'value' => '3',
        ]);
        Major::create([
            'name' => 'BDPM',
            'study_program' => 'MJ',
            'value' => '3',
        ]);
        Major::create([
            'name' => 'OTKP',
            'study_program' => 'MJ',
            'value' => '4',
        ]);
    }
}
