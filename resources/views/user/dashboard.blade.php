<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Pengaduan Sekolah</title>
    <!-- Menggunakan Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* Custom CSS untuk menyesuaikan desain */
        body {
            background-color: #ffffff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }

        /* --- Header --- */
        .top-header {
            background-color: #1a6840; /* Hijau Gelap */
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo-box {
            width: 60px;
            height: 60px;
            background-color: #f1c40f;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            color: #1a6840;
            font-size: 20px;
            border: 2px dashed #1a6840;
            margin-right: 15px;
        }
        .header-title h1 { margin: 0; font-size: 18px; font-weight: 700; }
        .header-title p { margin: 0; font-size: 12px; }
        
        /* --- Sidebar --- */
        .sidebar {
            border-right: 2px solid #000;
            min-height: calc(100vh - 90px);
            padding: 30px 20px;
        }
        .nav-custom {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            color: #333;
            text-decoration: none;
            font-weight: 600;
            transition: 0.2s;
        }
        .nav-custom:hover { background-color: #f1f1f1; }
        .nav-custom.active { background-color: #e6d8d8; color: #6a3b3b; }
        .nav-custom svg { width: 20px; height: 20px; margin-right: 15px; stroke-width: 2; fill: none; stroke: currentColor;}

        /* --- Main Content --- */
        .main-content {
            padding: 30px 40px;
            position: relative;
        }
        .page-title { font-size: 28px; font-weight: 700; margin-bottom: 30px; }
        
        /* Search Box */
        .search-bar {
            background-color: #eae2ea;
            border-radius: 20px;
            padding: 8px 20px;
            display: flex;
            align-items: center;
            width: 300px;
        }
        .search-bar input {
            border: none;
            background: transparent;
            outline: none;
            margin-left: 10px;
            width: 100%;
            font-size: 14px;
        }

        /* Cards */
        .card-stat {
            border: none;
            border-radius: 8px;
            padding: 20px;
            height: 100%;
        }
        .bg-aspirasi { background-color: #dcdcf9; }
        .bg-proses { background-color: #fcfca6; }
        .bg-selesai { background-color: #d4fcc7; }
        
        .card-stat-title {
            display: flex;
            align-items: center;
            font-weight: 700;
            font-size: 16px;
            margin-bottom: 15px;
        }
        .card-stat-title svg { width: 24px; height: 24px; margin-right: 10px; stroke: #333; stroke-width: 2; fill: none;}
        .card-stat-number { font-size: 24px; font-weight: 700; text-align: center; }

        /* Table Customization */
        .table-custom th {
            background-color: #eaeaea;
            border: 1px solid #000;
            font-weight: 600;
        }
        .table-custom td {
            border: 1px solid #000;
            vertical-align: middle;
        }
        .badge-proses {
            background-color: #fcfca6;
            color: #333;
            font-weight: 600;
            padding: 5px 15px;
            border-radius: 15px;
            font-size: 12px;
        }
        .btn-lihat { color: #e57373; text-decoration: none; font-weight: 500; }
        .btn-lihat:hover { color: #d32f2f; }
    </style>
</head>
<body>

    <!-- Header -->
    <header class="top-header">
        <div class="d-flex align-items-center">
            <div class="logo-box">SMS</div>
            <div class="header-title">
                <h1>PENGADUAN SARANA SEKOLAH</h1>
                <p>SMK MUHAMMADIYAH 1 BANTUL</p>
            </div>
        </div>
        <div class="text-end">
            <!-- Menggunakan Blade untuk memanggil nama user -->
            <div>{{ Auth::user()->name }}</div>
            <div>{{ Auth::user()->email }}</div>
        </div>
    </header>

    <div class="container-fluid p-0">
        <div class="row g-0">
            
            <!-- Sidebar -->
            <div class="col-md-2 sidebar">
                <a href="{{ route('dashboard') }}" class="nav-custom active">
                    <svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                    Beranda
                </a>
                <a href="{{ route('pengaduan.create') }}" class="nav-custom">
                    <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                    Tambah pengaduan
                </a>
                <a href="{{ route('pengaduan.index') }}" class="nav-custom">
                    <svg viewBox="0 0 24 24"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                    Aktivitas
                </a>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 main-content">
                
                <!-- Top Bar: Title & Search -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="page-title m-0">Dashboard</h2>
                    <a href="{{ route('pengaduan.create') }}" class="btn btn-success">Buat Pengaduan</a>
                </div>

                <!-- Stat Cards -->
                <div class="row mb-5">
                    <div class="col-md-4">
                        <div class="card-stat bg-aspirasi">
                            <div class="card-stat-title">
                                <svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                                Aspirasi
                            </div>
                            <div class="card-stat-number">{{ $totalAspirasi }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-stat bg-proses">
                            <div class="card-stat-title">
                                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                Proses
                            </div>
                            <div class="card-stat-number">{{ $totalProses }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-stat bg-selesai">
                            <div class="card-stat-title">
                                <svg viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                Selesai
                            </div>
                            <div class="card-stat-number">{{ $totalSelesai }}</div>
                        </div>
                    </div>
                </div>

                <!-- Table Section -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="m-0 fw-bold">Aktivitas Terbaru</h4>
                    <a href="{{ route('pengaduan.index') }}" class="btn-lihat">Lihat semua &rarr;</a>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-custom text-center">
                        <thead>
                            <tr>
                                <th width="50">NO</th>
                                <th>Kategori/Tempat</th>
                                <th>Aspirasi</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pengaduans as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->kategori }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($item->aspirasi, 60) }}</td>
                                    <td>{{ \Illuminate\Support\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                    <td>
                                        @if($item->status === 'aspirasi')
                                            <span class="badge bg-secondary">Aspirasi</span>
                                        @elseif($item->status === 'proses')
                                            <span class="badge-proses">Proses</span>
                                        @else
                                            <span class="badge bg-success">Selesai</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-4 text-muted">Anda belum pernah membuat pengaduan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- Script Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>