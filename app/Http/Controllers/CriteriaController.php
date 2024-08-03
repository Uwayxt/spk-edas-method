<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Major;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    public function index()
    {
        $criteria = Criteria::with('majors')->where('role_criteria','all')->simplePaginate(10);
        $criteria_subject = Criteria::with('majors')->where('role_criteria','all-subject')->orWhere('role_criteria', 'subject')->simplePaginate(10);
        return view('admin.criteria.index',['criteria' => $criteria, 'criteria_subject' => $criteria_subject]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.criteria.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'weight' => ['required'],
        ]);

        $criteria = Criteria::create([
            'name' => $data['name'],
            'weight' => $data['weight'],
            'role_criteria' => 'all'
        ]);
        // $criteria->majors()->attach($data['major_id']);

        return redirect()->route('criteria.index')->with('message','Berhasil Menambahkan Kriteria');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $criteria = Criteria::find($id);
        return view('admin.criteria.edit',['criteria' => $criteria]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => ['required'],
            'weight' => ['required'],
        ]);
        $criteria = Criteria::find($id);
        $criteria->update($data);
        return redirect()->route('criteria.index')->with('message','Berhasil Menambahkan Kriteria');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function createSubject()
    {
        $major = Major::all();
        return view('admin.criteria.create_subject', ['major' => $major]);
    }

    public function storeSubject(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'weight' => ['required'],
            'major_id' => ['required']
        ]);


        if ($data['major_id'] == 'all') {
            $criteria = Criteria::create([
                'name' => $data['name'],
                'weight' => $data['weight'],
                'role_criteria' => 'all-subject'
            ]);
            $major = Major::all();
            foreach ($major as $value) {
                $criteria->majors()->attach($value->id);
            }
        }else if ($data['major_id'] == 'smk') {
            $criteria = Criteria::create([
                'name' => $data['name'],
                'weight' => $data['weight'],
                'role_criteria' => 'subject'
            ]);
            $major = Major::whereIn('name',['OTKP','BDPM'.'Akuntansi','RPL', 'TKJ', 'Multimedia'])->get();
            foreach ($major as $value) {
                $criteria->majors()->attach($value->id);
            }
        }else{
            $criteria = Criteria::create([
                'name' => $data['name'],
                'weight' => $data['weight'],
                'role_criteria' => 'subject'
            ]);
            $criteria->majors()->attach($data['major_id']);
        }

        return redirect()->route('criteria.index')->with('message','Berhasil Menambahkan Kriteria');
    }

    public function editSubject(string $id)
    {
        $criteria = Criteria::find($id);
        $major = Major::all();

        return view('admin.criteria.edit_subject',['criteria' => $criteria, 'major' => $major]);
    }

    public function updateSubject(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => ['required'],
            'weight' => ['required'],
            'major_id' => ['required']
        ]);

        if ($data['major_id'] == 'all') {
            $criteria = Criteria::find($id);
            $major = Major::all();
            $criteria->update([
                'name' => $data['name'],
                'weight' => $data['weight'],
                'role_criteria' => 'all-subject'
            ]);
            foreach ($major as $value) {
                $criteria->majors()->attach($value->id);
            }
        }else{
            $criteria = Criteria::find($id);
            $criteria->update([
                'name' => $data['name'],
                'weight' => $data['weight'],
                'role_criteria' => 'all-subject'
            ]);
            $criteria->majors()->detach();
            $criteria->majors()->attach($data['major_id']);
        }

        return redirect()->route('criteria.index')->with('message','Berhasil Menambahkan Kriteria');
    }
}
