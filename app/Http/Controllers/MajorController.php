<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
            'value' => ['required'],
            'study_program' => ['required']
        ]);

        Major::create($data);
        return redirect()->route('major.index')->with('message','Berhasil Menambahkan Jurusan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // return view('admin.major.edit',['major' => $major]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $major = Major::find($id);
        return view('admin.major.edit',['major' => $major]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => ['required'],
            'value' => ['required'],
            'study_program' => ['required']
        ]);

        $major = Major::find($id);
        $major->update($data);
        return redirect()->route('major.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $major = Major::find($id);
        $major->delete();
        return redirect()->route('major.index');
    }
}
