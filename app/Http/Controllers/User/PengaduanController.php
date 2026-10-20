<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PengaduanController extends Controller
{
    public function index()
    {
        // Hanya ambil data milik user yang login
        $pengaduans = Pengaduan::where('user_id', Auth::id())->latest()->get();
        return view('user.pengaduan.index', compact('pengaduans'));
    }

    public function create()
    {
        return view('user.pengaduan.create');
    }

    public function show(string $id)
    {
        $pengaduan = Pengaduan::where('user_id', Auth::id())->findOrFail($id);

        return view('user.pengaduan.show', compact('pengaduan'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori' => ['required', 'string'],
            'aspirasi' => ['required', 'string'],
            'tanggal' => ['required', 'date'],
            'foto' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);

        if ($request->hasFile('foto')) {
            $directory = public_path('images/pengaduan');
            File::ensureDirectoryExists($directory);

            $file = $request->file('foto');
            $filename = Str::uuid().'.'.$file->extension();
            $file->move($directory, $filename);
            $validated['foto'] = $filename;
        }

        $validated['user_id'] = Auth::id();
        Pengaduan::create($validated);

        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil dikirim!');
    }
}