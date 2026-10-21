<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    // 1. Tambahan parameter Request $request
public function index(Request $request) 
{
    // 2. Tambahan variabel $query
    $query = Pengaduan::with('user')->latest(); 

    // 3. TAMBAHAN BARU: Logika Pencarian
    if ($request->has('search') && $request->search != '') {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('kategori', 'like', "%{$search}%")
              ->orWhereHas('user', function($userQuery) use ($search) {
                  $userQuery->where('name', 'like', "%{$search}%");
              });
        });
    }

    // 4. TAMBAHAN BARU: Logika Filter Status
    if ($request->has('status') && $request->status != '') {
        $query->where('status', $request->status);
    }

    // 5. Eksekusi (diubah dari ->get() langsung menjadi $query->get())
    $pengaduans = $query->get();

    return view('admin.pengaduan.index', compact('pengaduans'));
}

    public function show(string $id)
    {
        $pengaduan = Pengaduan::with('user')->findOrFail($id);
        return view('admin.pengaduan.show', compact('pengaduan'));
    }

    public function update(Request $request, string $id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->update([
            'status' => $request->status,
            'tanggapan_admin' => $request->tanggapan_admin
        ]);
        return redirect()->route('admin.pengaduan.index')->with('success', 'Status berhasil diperbarui!');
    }
}