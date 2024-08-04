<?php

namespace Database\Seeders;

use App\Models\Criteria;
use App\Models\Major;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CriteriaMajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $criteria = Criteria::all();
        $major = Major::all();
        foreach ($criteria as $value) {
            if ($value->role_criteria == 'all-subject' || $value->role_criteria == 'all') {
                foreach ($major as $value_major) {
                    $value->majors()->attach($value_major->id);
                }
            }
        }
        $criteriaFisika = Criteria::where('name','Fisika')->first();;
        $criteriaEkonomi = Criteria::where('name','Ekonomi')->first();;
        $criteriaSMK = Criteria::where('name','SMK')->first();;

        $majorSMAIPA = Major::where('name','SMA (MIPA)')->first();
        $majorSMAIPS = Major::where('name','SMA (IPS)')->first();
        $majorAK = Major::where('name','Akuntansi')->first();
        $majorBDPM = Major::where('name','BDPM')->first();
        $majorOTKP = Major::where('name','OTKP')->first();
        $majorRPL = Major::where('name','RPL')->first();
        $majorTKJ = Major::where('name','TKJ')->first();
        $majorDKV = Major::where('name','DKV')->first();
        $criteriaFisika->majors()->attach($majorSMAIPA->id);
        $criteriaEkonomi->majors()->attach($majorSMAIPS->id);
        $criteriaSMK->majors()->attach($majorAK->id);
        $criteriaSMK->majors()->attach($majorBDPM->id);
        $criteriaSMK->majors()->attach($majorOTKP->id);
        $criteriaSMK->majors()->attach($majorRPL->id);
        $criteriaSMK->majors()->attach($majorTKJ->id);
        $criteriaSMK->majors()->attach($majorDKV->id);
    }
}
