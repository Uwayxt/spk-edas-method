<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function indexStudent(Request $request){
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

    public function indexBiodata(){

        $major = Major::get();
        return view('form-biodata',['major' => $major]);
    }

    public function index(){
        return view('admin.student.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {



        return view('admin.student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
}
