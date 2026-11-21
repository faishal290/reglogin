<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\User; // Ubah 'user' menjadi 'User' (huruf besar)
use Illuminate\Http\Request; // Perbaiki typo 'Htpp' menjadi 'Http'
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(): View
    {
        $total_aspirasi = Pengaduan::where('status', 'aspirasi')->count();
        $total_proses = Pengaduan::where('status', 'proses')->count();
        $total_selesai = Pengaduan::where('status', 'selesai')->count();

        // Hitung total siswa (role = 'user')
        $total_user = User::where('role', 'user')->count();
        $total_admin = User::where('role', 'admin')->count();

        // Ambil 5 pengaduan terbaru
        $pengaduans = Pengaduan::with('user')->latest()->take(5)->get();

        // TAMBAHKAN QUERY TOP CATEGORIES DI SINI
        $top_categories = DB::table('pengaduans')
            ->select('kategori', DB::raw('count(*) as total'))
            ->groupBy('kategori')
            ->orderBy('total', 'desc')
            ->limit(3)
            ->get();

        // HANYA ADA SATU RETURN VIEW DI SINI
        return view('admin.dashboard', compact(
            'total_aspirasi', 
            'total_proses', 
            'total_selesai', 
            'total_user', 
            'total_admin', 
            'pengaduans',
            'top_categories' // <-- Variabel ini sekarang sudah terkirim ke view
        ));
    }

    // Fungsi baru untuk menampilkan daftar siswa
    public function daftarSiswa()
    {
        // Ambil semua user yang memiliki role 'user'
        $siswas = User::where('role', 'user')->latest()->get();
        
        return view('admin.siswa.index', compact('siswas'));
    }

    public function destroySiswa(string $id)
    {
        $siswa = User::where('role', 'user')->findOrFail($id);
        
        // Hapus juga semua pengaduan milik siswa ini (jika ada)
        // Ini mencegah error "foreign key constraint" di database
        $siswa->pengaduans()->delete();

        $siswa->delete();

        return redirect()->route('admin.siswa.index')->with('success', 'Akun siswa berhasil dihapus!');
    }
}