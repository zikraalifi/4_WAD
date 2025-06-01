<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\User;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('user')->get(); // relasi biar efisien
        return view('doctor.index', compact('doctors'));
    }

    public function create()
    {
        $users = User::all(); // Buat dropdown user_id di form create
        return view('doctor.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
        ]);

        Doctor::create($request->all());

        return redirect()->route('doctors.index')->with('success', 'Data dokter berhasil ditambahkan');
    }

    public function show($id)
    {
        $doctor = Doctor::with('user')->findOrFail($id);
        return view('doctor.show', compact('doctor'));
    }

    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        $users = User::all(); // Buat dropdown user_id di form edit
        return view('doctor.edit', compact('doctor', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
        ]);

        $doctor = Doctor::findOrFail($id);
        $doctor->update($request->all());

        return redirect()->route('doctors.index')->with('success', 'Data dokter berhasil diupdate');
    }

    public function destroy($id)
    {
        Doctor::destroy($id);
        return redirect()->route('doctors.index')->with('success', 'Data dokter berhasil dihapus');
    }
}
