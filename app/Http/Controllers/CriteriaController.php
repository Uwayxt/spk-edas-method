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
        $criteria = Criteria::with('majors')->simplePaginate(10);
        return view('admin.criteria.index',['criteria' => $criteria]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $major = Major::all();
        return view('admin.criteria.create', ['major' => $major]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'weight' => ['required'],
            'major_id' => ['required']
        ]);

        if ($data['major_id'] == 'all') {
            $major = Major::all();
            $criteria = Criteria::create([
                'name' => $data['name'],
                'weight' => $data['weight']
            ]);
            foreach ($major as $value) {
                $criteria->majors()->attach($value->id);
            }
        }else{
            $criteria =  $criteria = Criteria::create([
                'name' => $data['name'],
                'weight' => $data['weight']
            ]);
            $criteria->majors()->attach($data['major_id']);
        }
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
        return view('admin.criteria.show');
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
