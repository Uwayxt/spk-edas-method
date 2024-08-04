<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{


    public function index(){
        return view('admin.student.index');
    }

    public function indexBiodata(){
        $major = Major::get();
        return view('form-biodata',['major' => $major]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = Validator::make($request->all(),[
            'name' => 'required',
            'school_address' => 'required',
            'major_id' => 'required'
        ]);
        if ($data->fails()) {
            return redirect()->route('biodata.index');
        }

        $biodata = $data->validated();
        $subject = Major::find($biodata['major_id'])->criterias;
        return view('form-kriteria',['biodata' => $biodata, 'subject' => $subject]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'school_address' => ['required'],
            'major_id' => ['required'],
            'subject' => ['required']
        ]);
        $major = Major::find($data['major_id']);
        $reset = $data['subject'];
        $criteria = $major->criterias()->get();
        $matrix = [];

        if ($major['study_program'] == 'TI') {
            // TI
            $matrix["TI"] =  $reset;
            $criteria = Criteria::where('role_criteria','all-subject')->orWhere('role_criteria','subject')->get();
            $criteria_TI = Criteria::with('valueCriterias')->Where('role_criteria','all')->get();
            $subject = [];
            $weights = [];
            $major_TI_result = $this->majorValue($major);
            array_push($matrix["TI"],$major_TI_result);

            foreach ($criteria_TI as $value) {
                    // Bobot
                    array_push($weights, $value->weight);
                foreach ($value->valueCriterias as $item){
                    if ($item->role == 'TI') {
                        array_push($matrix["TI"],$item->value);
                    }
                }
            }

            // MJ
            foreach ($criteria as $value) {
                foreach ($data['subject'] as $key => $valuesubject) {
                    if ($value['id'] == $key) {
                        if ($value['role_criteria'] == 'all-subject') {
                            $subject[$value['id']] = $valuesubject;
                            $weights[$value['id']] = $value['weight'];
                        }else{
                            $subject[$value['id']] = "1";
                            $weights[$value['id']] = $value['weight'];
                        }
                    }
                }
            }

            // Nilai Jurusan
            array_push($subject, '2');

            // Kriteria Selain Mapel untuk MJ
            $criteria_MJ = Criteria::with('valueCriterias')->Where('role_criteria','all')->get();
            foreach ($criteria_MJ as $value) {
                foreach ($value->valueCriterias as $item){
                    if ($item->role == 'MJ') {
                        array_push($matrix["MJ"],$item->value);
                    }
                }
            }

            // Input Matrix
            $matrix["MJ"] = $subject;
            // array_push($matrix,$subject);

            return dd($subject,$data['subject'],$matrix,$weights);
            // (AV)
            $AV =  $this->calculateAverage($matrix);
            $PDA_NDA = $this->calculatePDA_NDA($matrix,$AV);
            $SP_SN = $this->calculateSP_SN($matrix,$PDA_NDA[0],$PDA_NDA[1],$weights);
            $NSP_NSN = $this->normalizeSP_SN($matrix,$SP_SN[0],$SP_SN[1],$weights);
            $AS = $this->calculateApraisalScore($matrix,$NSP_NSN[0],$NSP_NSN[1]);
            arsort($AS);
            $huhu = key($AS);
            return dd($subject,$data['subject'],$matrix,$weights,$SP_SN,$AS, $huhu);


        }elseif ($major['study_program'] == 'MJ') {
                // MJ
                $matrix["MJ"] =  $reset;
                $criteria = Criteria::where('role_criteria','all-subject')->orWhere('role_criteria','subject')->get();
                $criteria_MJ = Criteria::with('valueCriterias')->Where('role_criteria','all')->get();
                $subject = [];
                $weights = [];
                $major_MJ_result = $this->majorValue($major);
                array_push($matrix["MJ"],$major_MJ_result);

                foreach ($criteria_MJ as $value) {
                        // Bobot
                        array_push($weights, $value->weight);
                    foreach ($value->valueCriterias as $item){
                        if ($item->role == 'MJ') {
                            array_push($matrix["MJ"],$item->value);
                        }
                    }
                }

                // TI
                // Memasukkan nilai dan bobot pada mapel
                foreach ($criteria as $value) {
                    foreach ($data['subject'] as $key => $valuesubject) {
                        if ($value['id'] == $key) {
                            if ($value['role_criteria'] == 'all-subject') {
                                $subject[$value['id']] = $valuesubject;
                                $weights[$value['id']] = $value['weight'];
                            }else{
                                $subject[$value['id']] = "1";
                                $weights[$value['id']] = $value['weight'];
                            }
                        }
                    }
                }

                // Nilai Jurusan
                array_push($subject, '2');

                // Kriteria Selain Mapel untuk TI
                $criteria_TI = Criteria::with('valueCriterias')->Where('role_criteria','all')->get();
                foreach ($criteria_TI as $value) {
                    foreach ($value->valueCriterias as $item){
                        if ($item->role == 'TI') {
                            array_push($matrix["TI"],$item->value);
                        }
                    }
                }

                // Input Matrix
                $matrix["TI"] = $subject;

                return dd($subject,$data['subject'],$matrix,$weights);
                // (AV)
                $AV =  $this->calculateAverage($matrix);
                $PDA_NDA = $this->calculatePDA_NDA($matrix,$AV);
                $SP_SN = $this->calculateSP_SN($matrix,$PDA_NDA[0],$PDA_NDA[1],$weights);
                $NSP_NSN = $this->normalizeSP_SN($matrix,$SP_SN[0],$SP_SN[1],$weights);
                $AS = $this->calculateApraisalScore($matrix,$NSP_NSN[0],$NSP_NSN[1]);
                arsort($AS);
                $huhu = key($AS);
                return dd($subject,$data['subject'],$matrix,$weights,$SP_SN,$AS, $huhu);
        }else {
            return redirect()->route('biodata.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('hasil_kriteria');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function calculateAverage($data){
        $alternative_average = array();
        $total_alternative = count($data);
        foreach($data as $alternative){
            foreach($alternative as $alternative_key => $criteria_value){
                if(!isset($alternative_average[$alternative_key])){
                    $alternative_average[$alternative_key]=0;
                }
                $alternative_average[$alternative_key]+=$criteria_value/$total_alternative;
            }
        }

        return $alternative_average;
    }

    private function calculatePDA_NDA($data,$AV){
        $PDA = array();
        $NDA = array();
        $type = 'benefit';
        foreach($data as $key => $alternative){
            $PDA[$key] = array();
            $NDA[$key] = array();
            foreach($alternative as $key_c => $criteria ){
                if($type == 'benefit'){
                    $PDA[$key][$key_c] = max(0,($criteria-$AV[$key_c]) / $AV[$key_c]);
                    $NDA[$key][$key_c] = max(0,($AV[$key_c]-$criteria) / $AV[$key_c]);
                }else{
                    $PDA[$key][$key_c] = max(0,($AV[$key_c]-$criteria) / $AV[$key_c]);
                    $NDA[$key][$key_c] = max(0,($criteria-$AV[$key_c]) / $AV[$key_c]);
                }
            }
        }

        return [$PDA,$NDA];
    }

    private function calculateSP_SN($data,$PDA,$NDA,$weight){
        $SP = array();
        $SN = array();
        foreach($data as $key => $alternative){
            $SP[$key] = 0;
            $SN[$key] = 0;
            foreach($alternative as $keyc => $criteria_value){
                $SP[$key] += $weight[$keyc] * $PDA[$key][$keyc];
                $SN[$key] += $weight[$keyc] * $NDA[$key][$keyc];
            }
        }

        return [$SP,$SN];
    }

    private function normalizeSP_SN($data,$SP,$SN){
        $NSP = array();
        $NSN = array();
        foreach($data as $key => $alternative)
        {
            $NSP[$key] = $SP[$key] / max($SP);
            $NSN[$key] = 1 - $SN[$key] / max($SN);
        }
        return [$NSP,$NSN];
    }

    private function calculateApraisalScore($data,$NSP,$NSN){
        $AS = array();
        foreach($data as $key => $alternatif)
        {
            $AS[$key] = ($NSP[$key] + $NSN[$key]) / 2;
        }

        return $AS;
    }

    private function majorValue($major){
        $value = 0;
        if($major['study_program'] == 'TI'){
            switch ($major['name']) {
                case 'RPL':
                    $value = 4;
                    break;
                case 'TKJ':
                    $value = 3;
                    break;
                case 'SMA (MIPA)':
                    $value = 3;
                    break;
                case 'DKV':
                    $value = 2;
                    break;

                default:
                    $value = 2;
                    break;
            }
            return $value;
        }else{
            switch ($major['name']) {
                case 'OTKP':
                    $value = 4;
                    break;
                case 'Akuntansi':
                    $value = 3;
                    break;
                case 'BDPM':
                    $value = 3;
                    break;
                case 'SMA (IPS)':
                    $value = 2;
                    break;

                default:
                    $value = 2;
                    break;
            }
            return $value;
        }
    }
}
