<?php

namespace Database\Seeders;

use App\Models\Criteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ValueCriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $criteria_akreditasi = Criteria::create([
            'name' => 'Akreditasi Program',
            'weight' => '0.05',
            'role_criteria' => 'all',
        ]);
        $criteria_prospek = Criteria::create([
            'name' => 'Prospek Kerja',
            'weight' => '0.05',
            'role_criteria' => 'all',
        ]);
        $criteria_fasilitas = Criteria::create([
            'name' => 'Fasilitas Penunjang',
            'weight' => '0.05',
            'role_criteria' => 'all',
        ]);

        $criteria_akreditasi->valueCriterias()->create([
            'role' => 'TI',
            'value' => 0.05
        ]);

        $criteria_akreditasi->valueCriterias()->create([
            'role' => 'MJ',
            'value' => 0.05
        ]);

        $criteria_prospek->valueCriterias()->create([
            'role' => 'TI',
            'value' => 0.05
        ]);
        $criteria_prospek->valueCriterias()->create([
            'role' => 'MJ',
            'value' => 0.05
        ]);

        $criteria_fasilitas->valueCriterias()->create([
            'role' => 'TI',
            'value' => 0.05
        ]);

        $criteria_fasilitas->valueCriterias()->create([
            'role' => 'MJ',
            'value' => 0.05
        ]);
    }
}
