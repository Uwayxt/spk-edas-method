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
            // foreach ($data['subject'] as $value) {
                //     array_push($matrix, $reset);
                //     array_push($matrix['TI'], $data['subject'][]);
                // }
            }elseif ($major['study_program'] == 'MJ') {
                $matrix["MJ"] =  $reset;
                $criteria = Criteria::where('role_criteria','all-subject')->orWhere('role_criteria','subject')->get();
                $weights = [];
                $subject = [];
                array_push($matrix["MJ"],
                '3',  // Jurusan Sekolah
                '3',  // Akreditasi Program
                '2',  // Prospek Kerja
                '4'   // Fasilitas Penunjang
                );
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
                array_push($subject,
                '4',  // Jurusan Sekolah
                '3',  // Akreditasi Program
                '2',  // Prospek Kerja
                '4'   // Fasilitas Penunjang
                );

                array_push($weights,
                '0.3',  // Jurusan Sekolah
                '0.1',  // Akreditasi Program
                '0.02',  // Prospek Kerja
                '0.05'   // Fasilitas Penunjang
                );
                $matrix["TI"] = $subject;
                // array_push($matrix,$subject);

                // return dd($subject,$data['subject'],$matrix,$weights);
                // (AV)
                $AV =  $this->calculateAverage($matrix);
                $PDA_NDA = $this->calculatePDA_NDA($matrix,$AV);
                $SP_SN = $this->calculateSP_SN($matrix,$PDA_NDA[0],$PDA_NDA[1],$weights);
                $NSP_NSN = $this->normalizeSP_SN($matrix,$SP_SN[0],$SP_SN[1],$weights);
                $AS = $this->calculateApraisalScore($matrix,$NSP_NSN[0],$NSP_NSN[1]);
                arsort($AS);
                $huhu = key($AS);
                return dd($subject,$data['subject'],$matrix,$weights,$SP_SN,$AS, $huhu);
                // return dd($matrix,$AV,max(0,$call),$PDA_NDA);
        }else {
            return redirect()->route('biodata.index');
        }
        // $major = Major::;
        //  Average Solution (AV)
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.student.edit');
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
                    $PDA[$key][$key_c] = max(0,($criteria-$AV[$key_c])/$AV[$key_c]);
                    $NDA[$key][$key_c] = max(0,($AV[$key_c]-$criteria)/$AV[$key_c]);
                }else{
                    $PDA[$key][$key_c] = max(0,($AV[$key_c]-$criteria)/$AV[$key_c]);
                    $NDA[$key][$key_c] = max(0,($criteria-$AV[$key_c])/$AV[$key_c]);
                }
            }
        }

        // return dd($PDA,$NDA);
        return [$PDA,$NDA];
    }

    private function calculateSP_SN($data,$PDA,$NDA,$weight){
        $SP = array();
        $SN = array();
        foreach($data as $keya => $alternative){
            $SP[$keya] = 0;
            $SN[$keya] = 0;
            foreach($alternative as $keyc => $criteria_value){
                $SP[$keya] += $weight[$keyc] * $PDA[$keya][$keyc];
                $SN[$keya] += $weight[$keyc] * $NDA[$keya][$keyc];
            }
        }

        return [$SP,$SN];
    }

    private function normalizeSP_SN($data,$SP,$SN){
        $NSP = array();
        $NSN = array();
        foreach($data as $keya => $alternative)
        {
            $NSP[$keya] = $SP[$keya] / max($SP);
            $NSN[$keya] = 1 - $SN[$keya] / max($SN);
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
}
