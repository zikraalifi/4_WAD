<?php

namespace App\Http\Controllers;

use App\Models\JadwalKonsultasi;
use Illuminate\Http\Request;
use Carbon\Carbon; // Untuk validasi tanggal

class JadwalKonsultasiController extends Controller
{
    /**
     * Menampilkan daftar semua resource. (Read)
     */
    public function index()
    {
        // Mengambil semua jadwal konsultasi terbaru dari database
        $jadwalKonsultasis = JadwalKonsultasi::latest()->get();
        // Mengirim data jadwal konsultasi ke view 'jadwal_konsultasi.index'
        return view('jadwal_konsultasi.index', compact('jadwalKonsultasis'));
    }

    /**
     * Menampilkan form untuk membuat resource baru. (Create)
     */
    public function create()
    {
        // Menampilkan view form untuk membuat jadwal konsultasi baru
        return view('jadwal_konsultasi.create');
    }

    /**
     * Menyimpan resource yang baru dibuat ke storage. (Create)
     */
    public function store(Request $request)
    {
        // Melakukan validasi data yang diterima dari request
        $request->validate([
            'nama_mahasiswa' => 'required|string|max:255',
            'nama_dokter' => 'required|string|max:255',
            'tanggal' => [
                'required',
                'date',
                // Custom rule untuk memastikan tanggal tidak di masa lalu
                function ($attribute, $value, $fail) {
                    if (Carbon::parse($value)->isPast()) {
                        $fail('Tanggal tidak boleh sudah lewat.');
                    }
                },
            ],
            'jam' => 'required|date_format:H:i',
        ]);

        // Membuat entri baru di database dengan semua data dari request
        JadwalKonsultasi::create($request->all());

        // Mengarahkan kembali ke halaman index dengan pesan sukses
        return redirect()->route('jadwal.index')->with('success', 'Jadwal konsultasi berhasil ditambahkan!');
    }

    /**
     * Menampilkan form untuk mengedit resource yang ditentukan. (Update)
     *
     * CATATAN: Metode ini diubah sementara untuk debugging.
     * Sebelumnya menggunakan implicit model binding: public function edit(JadwalKonsultasi $jadwalKonsultasi)
     * Sekarang menggunakan pencarian eksplisit untuk debugging.
     */
    public function edit($id) // Mengambil ID sebagai parameter
    {
        // Mencari jadwal konsultasi berdasarkan ID.
        // Jika tidak ditemukan, akan otomatis melempar 404 Not Found.
        $jadwalKonsultasi = JadwalKonsultasi::findOrFail($id);

        // Mengirim objek jadwal konsultasi ke view 'jadwal_konsultasi.edit'
        return view('jadwal_konsultasi.edit', compact('jadwalKonsultasi'));
    }

    /**
     * Memperbarui resource yang ditentukan di storage. (Update)
     */
    public function update(Request $request, JadwalKonsultasi $jadwalKonsultasi)
    {
        // Melakukan validasi data yang diterima dari request
        $request->validate([
            'nama_mahasiswa' => 'required|string|max:255',
            'nama_dokter' => 'required|string|max:255',
            'tanggal' => [
                'required',
                'date',
                // Custom rule untuk memastikan tanggal tidak di masa lalu, kecuali jika tanggalnya sama dengan yang sudah ada
                function ($attribute, $value, $fail) use ($jadwalKonsultasi) {
                    if (Carbon::parse($value)->isPast() && $value !== $jadwalKonsultasi->tanggal->format('Y-m-d')) {
                        $fail('Tanggal tidak boleh sudah lewat.');
                    }
                },
            ],
            'jam' => 'required|date_format:H:i',
        ]);

        // Memperbarui entri di database dengan data dari request
        $jadwalKonsultasi->update($request->all());

        // Mengarahkan kembali ke halaman index dengan pesan sukses
        return redirect()->route('jadwal.index')->with('success', 'Jadwal konsultasi berhasil diperbarui!');
    }

    /**
     * Menghapus resource yang ditentukan dari storage. (Delete)
     */
    public function destroy(JadwalKonsultasi $jadwalKonsultasi)
    {
        // Menghapus entri jadwal konsultasi dari database
        $jadwalKonsultasi->delete();
        // Mengarahkan kembali ke halaman index dengan pesan sukses
        return redirect()->route('jadwal.index')->with('success', 'Jadwal konsultasi berhasil dibatalkan!');
    }

    /**
     * API: Mendapatkan semua jadwal atau berdasarkan nama mahasiswa.
     */
    public function apiIndex(Request $request)
    {
        if ($request->has('nama_mahasiswa')) {
            // Mencari jadwal berdasarkan nama mahasiswa (case-insensitive like)
            $jadwalKonsultasis = JadwalKonsultasi::where('nama_mahasiswa', 'like', '%' . $request->nama_mahasiswa . '%')->get();
        } else {
            // Mengambil semua jadwal konsultasi
            $jadwalKonsultasis = JadwalKonsultasi::all();
        }

        // Mengembalikan data dalam format JSON
        return response()->json($jadwalKonsultasis);
    }
}