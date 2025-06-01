<?php

namespace App\Http\Controllers;

use App\Models\JadwalKonsultasi;
use Illuminate\Http\Request;
use Carbon\Carbon; // Untuk validasi tanggal

class JadwalKonsultasiController extends Controller
{
    /**
     * Display a listing of the resource. (Read)
     */
    public function index()
    {
        $jadwalKonsultasis = JadwalKonsultasi::latest()->get();
        // SESUAIKAN DENGAN FOLDER YANG ADA: 'jadwal_konsultasi.index'
        return view('jadwal_konsultasi.index', compact('jadwalKonsultasis'));
    }

    /**
     * Show the form for creating a new resource. (Create)
     */
    public function create()
    {
        // SESUAIKAN DENGAN FOLDER YANG ADA: 'jadwal_konsultasi.create'
        return view('jadwal_konsultasi.create');
    }

    /**
     * Store a newly created resource in storage. (Create)
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_mahasiswa' => 'required|string|max:255',
            'nama_dokter' => 'required|string|max:255',
            'tanggal' => [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    if (Carbon::parse($value)->isPast()) {
                        $fail('Tanggal tidak boleh sudah lewat.');
                    }
                },
            ],
            'jam' => 'required|date_format:H:i',
        ]);

        JadwalKonsultasi::create($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Jadwal konsultasi berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource. (Update)
     */
    public function edit(JadwalKonsultasi $jadwalKonsultasi)
    {
        // SESUAIKAN DENGAN FOLDER YANG ADA: 'jadwal_konsultasi.edit'
        return view('jadwal_konsultasi.edit', compact('jadwalKonsultasi'));
    }

    /**
     * Update the specified resource in storage. (Update)
     */
    public function update(Request $request, JadwalKonsultasi $jadwalKonsultasi)
    {
        $request->validate([
            'nama_mahasiswa' => 'required|string|max:255',
            'nama_dokter' => 'required|string|max:255',
            'tanggal' => [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    if (Carbon::parse($value)->isPast() && $value !== $jadwalKonsultasi->tanggal->format('Y-m-d')) {
                        $fail('Tanggal tidak boleh sudah lewat.');
                    }
                },
            ],
            'jam' => 'required|date_format:H:i',
        ]);

        $jadwalKonsultasi->update($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Jadwal konsultasi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage. (Delete)
     */
    public function destroy(JadwalKonsultasi $jadwalKonsultasi)
    {
        $jadwalKonsultasi->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal konsultasi berhasil dibatalkan!');
    }

    /**
     * API: Get all schedules or by student name.
     */
    public function apiIndex(Request $request)
    {
        if ($request->has('nama_mahasiswa')) {
            $jadwalKonsultasis = JadwalKonsultasi::where('nama_mahasiswa', 'like', '%' . $request->nama_mahasiswa . '%')->get();
        } else {
            $jadwalKonsultasis = JadwalKonsultasi::all();
        }

        return response()->json($jadwalKonsultasis);
    }
}
