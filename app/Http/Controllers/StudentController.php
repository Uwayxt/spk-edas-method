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
        array_push($matrix, $reset);

        if ($major['study_program'] == 'TI') {
            // foreach ($data['subject'] as $value) {
                //     array_push($matrix, $reset);
                //     array_push($matrix['TI'], $data['subject'][]);
                // }
            }elseif ($major['study_program'] == 'MJ') {
                $criteria = Criteria::where('role_criteria','all-subject')->orWhere('role_criteria','subject')->get();
                $subject = [];
                array_push($matrix[0],
                '2',  // Jurusan Sekolah
                '3',  // Akreditasi Program
                '2',  // Prospek Kerja
                '3'   // Fasilitas Penunjang
                );
                foreach ($criteria as $value) {
                    foreach ($data['subject'] as $key => $valuesubject) {
                        if ($value['id'] == $key) {
                            if ($value['role_criteria'] == 'all-subject') {
                                $subject[$value['id']] = $valuesubject;
                            }else{
                                $subject[$value['id']] = "1";
                            }
                        }
                    }
                }
                array_push($subject,
                '2',  // Jurusan Sekolah
                '3',  // Akreditasi Program
                '2',  // Prospek Kerja
                '3'   // Fasilitas Penunjang
                );
                array_push($matrix,$subject);

                // (AV)
                $av =  $this->calculateAverage($matrix);
                return dd($subject,$data['subject'],$matrix);
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

    private function calculatePDA_NDA($data){
        $SP=array();
        $SN=array();
        foreach($data as $i=>$xi){
            $SP[$i]=0;
            $SN[$i]=0;
            foreach($xi as $j=>$xij){
                $SP[$i]+=$w[$j]*$PDA[$i][$j];
                $SN[$i]+=$w[$j]*$NDA[$i][$j];
            }
        }
        return $alternative_average;
    }

    private function normalizePDA_NDA($data){
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

    private function calculateApraisalScore($data){
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
}
