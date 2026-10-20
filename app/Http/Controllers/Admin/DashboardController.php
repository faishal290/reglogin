<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $total_aspirasi = Pengaduan::where('status', 'aspirasi')->count();
        $total_proses = Pengaduan::where('status', 'proses')->count();
        $total_selesai = Pengaduan::where('status', 'selesai')->count();
        $pengaduans = Pengaduan::with('user')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'total_aspirasi',
            'total_proses',
            'total_selesai',
            'pengaduans',
        ));
    }
}