<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();
        $counts = Pengaduan::query()
            ->where('user_id', $user->id)
            ->selectRaw('status, COUNT(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');
        $pengaduans = Pengaduan::query()
            ->where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        return view('user.dashboard', [
            'totalAspirasi' => (int) $counts->get('aspirasi', 0),
            'totalProses' => (int) $counts->get('proses', 0),
            'totalSelesai' => (int) $counts->get('selesai', 0),
            'pengaduans' => $pengaduans,
        ]);
    }
}
