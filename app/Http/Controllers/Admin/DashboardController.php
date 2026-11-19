<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\user;
use Illuminate\Htpp\Request;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $total_aspirasi = Pengaduan::where('status', 'aspirasi')->count();
        $total_proses = Pengaduan::where('status', 'proses')->count();
        $total_selesai = Pengaduan::where('status', 'selesai')->count();
        $pengaduans = Pengaduan::with('user')->latest()->take(5)->get();

        // Hitung total siswa (role = 'user')
        $total_user = User::where('role', 'user')->count();
        $total_admin = User::where('role', 'admin')->count();

        // Ambil 5 pengaduan terbaru
        $pengaduans = Pengaduan::with('user')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'total_aspirasi',
            'total_proses',
            'total_selesai',
            'total_user',
            'total_admin',
            'pengaduans',
        ));
    }
        // ... (kode index sebelumnya) ...

    // Fungsi baru untuk menampilkan daftar siswa
    public function daftarSiswa()
    {
        // Ambil semua user yang memiliki role 'user'
        $siswas = \App\Models\User::where('role', 'user')->latest()->get();
        
        return view('admin.siswa.index', compact('siswas'));
    }
        // ... (kode daftarSiswa sebelumnya) ...

    public function destroySiswa(string $id)
    {
        $siswa = \App\Models\User::where('role', 'user')->findOrFail($id);
        
        // Hapus juga semua pengaduan milik siswa ini (jika ada)
        // Ini mencegah error "foreign key constraint" di database
        $siswa->pengaduans()->delete();

        $siswa->delete();

        return redirect()->route('admin.siswa.index')->with('success', 'Akun siswa berhasil dihapus!');
    }
}