<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function index()
    {
        $major = Major::simplePaginate(10);
        return view('admin.major.index',['major' => $major]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.major.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'weight' => ['required','numeric']
        ]);

        Major::create($data);
        return redirect()->route('major.index')->with('message','Berhasil Menambahkan Jurusan');
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
