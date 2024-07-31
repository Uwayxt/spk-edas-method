<?php

namespace Database\Seeders;

use App\Models\Criteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Criteria::create([
            'name' => 'Fisika',
            'weight' => '0.25',
            'role_criteria' => 'subject',
        ]);
        Criteria::create([
            'name' => 'Ekonomi',
            'weight' => '0.25',
            'role_criteria' => 'subject',
        ]);
        Criteria::create([
            'name' => 'Matematika',
            'weight' => '0.2',
            'role_criteria' => 'subject',
        ]);
        Criteria::create([
            'name' => 'Bahasa Indonesia',
            'weight' => '0.15',
            'role_criteria' => 'subject',
        ]);
        Criteria::create([
            'name' => 'Bahasa Inggris',
            'weight' => '0.15',
            'role_criteria' => 'subject',
        ]);
        Criteria::create([
            'name' => 'Akreditasi Program',
            'weight' => '0.05',
            'role_criteria' => 'all',
        ]);
        Criteria::create([
            'name' => 'Prospek Kerja',
            'weight' => '0.05',
            'role_criteria' => 'all',
        ]);
        Criteria::create([
            'name' => 'Fasilitas Penunjang',
            'weight' => '0.05',
            'role_criteria' => 'all',
        ]);
    }
}
