<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KaprodiController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();

            return redirect()->intended('kaprodi');
        }



        return back()->with([
            'message' => 'Email atau Password salah!',
        ]);
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = Student::whereHas('majors', function ($query) {
            $user = auth()->user()->role == 'kaprodi-TI' ? 'TI' : 'MJ';
            $query->where('study_program', $user);
        })->get();
        return view('kaprodi.index',['student' => $student]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        //
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

    public function showStudent(string $id)
    {
        $student = Student::with('subjectStudent')->find($id);

        return view('kaprodi.show_student',['student' => $student]);
    }
    public function indexCriteria()
    {
        $criteria = Criteria::with('majors')->where('role_criteria','all')->simplePaginate(10);
        return view('kaprodi.criteria.index',['criteria' => $criteria]);
    }

    public function editCriteria(string $id)
    {
        $criteria = Criteria::find($id);
        return view('kaprodi.criteria.edit',['criteria' => $criteria]);
    }

    public function updateCriteria(Request $request, string $id)
    {
        $data = $request->validate([
            'weight' => ['required']
        ]);
        $criteria = Criteria::find($id);
        $criteria->update($data);
        return redirect()->route('kaprodi.criteria.index');
    }
}
