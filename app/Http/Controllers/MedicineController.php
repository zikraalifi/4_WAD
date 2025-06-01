<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index()
    {
        $medicines = Medicine::all();
        return view('medicines.index', compact('medicines'));
    }

    public function show(Medicine $medicine)
    {
        return view('medicines.show', compact('medicine'));
    }


    public function create()
    {
        return view('medicines.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required',
            'jenis' => 'required',
            'stok' => 'required|integer|min:0',
            'expired_date' => 'required|date',
        ]);

        Medicine::create($request->all());

        return redirect()->route('medicines.index')->with('success', 'Obat berhasil ditambahkan.');
    }

    public function edit(Medicine $medicine)
    {
        return view('medicines.edit', compact('medicine'));
    }

    public function update(Request $request, Medicine $medicine)
    {
        $request->validate([
            'nama_obat' => 'required',
            'jenis' => 'required',
            'stok' => 'required|integer|min:0',
            'expired_date' => 'required|date',
        ]);

        $medicine->update($request->all());

        return redirect()->route('medicines.index')->with('success', 'Data obat berhasil diperbarui.');
    }

    public function destroy(Medicine $medicine)
    {
        $medicine->delete();
        return redirect()->route('medicines.index')->with('success', 'Obat berhasil dihapus.');
    }
}
