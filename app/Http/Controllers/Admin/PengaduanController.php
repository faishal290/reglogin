<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index()
    {
        // Admin melihat semua pengaduan
        $pengaduans = Pengaduan::with('user')->latest()->get();
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
            'status' => $request->status
        ]);
        return redirect()->route('admin.pengaduan.index')->with('success', 'Status berhasil diperbarui!');
    }
}