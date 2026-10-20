<?php

namespace Tests\Feature;

use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Pengaduan;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_homepage_redirects_to_login(): void
    {
        $response = $this->get('/');

        $response->assertRedirect('/login');
    }

    public function test_role_middleware_aliases_resolve_to_their_classes(): void
    {
        app(\Illuminate\Contracts\Http\Kernel::class);
        $middleware = app('router')->getMiddleware();

        $this->assertInstanceOf(IsUser::class, app()->make($middleware['isUser']));
        $this->assertInstanceOf(IsAdmin::class, app()->make($middleware['isAdmin']));
    }

    public function test_registration_page_is_accessible_to_guests(): void
    {
        $this->get('/register')
            ->assertOk()
            ->assertSee('Daftar Akun');
    }

    public function test_registration_creates_a_regular_user_and_redirects_to_login(): void
    {
        $response = $this->post('/register', [
            'name' => 'Siswa Contoh',
            'email' => 'siswa@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('login'));
        $this->assertDatabaseHas('users', [
            'name' => 'Siswa Contoh',
            'email' => 'siswa@example.com',
            'role' => 'user',
        ]);
        $this->assertDatabaseMissing('users', [
            'email' => 'siswa@example.com',
            'password' => 'password123',
        ]);
    }

    public function test_user_pengaduan_page_has_valid_navigation_and_logout_button(): void
    {
        $this->withoutVite();

        $this->actingAs(User::factory()->create(['role' => 'user']))
            ->get(route('pengaduan.create'))
            ->assertOk()
            ->assertSee(route('pengaduan.create'), false)
            ->assertSee(route('pengaduan.index'), false)
            ->assertSee(route('logout'), false)
            ->assertSee('Logout');
    }

    public function test_user_pengaduan_index_renders_detail_link_for_each_report(): void
    {
        $this->withoutVite();
        $user = User::factory()->create(['role' => 'user']);
        $otherUser = User::factory()->create(['role' => 'user']);
        $pengaduan = Pengaduan::create([
            'user_id' => $user->id,
            'kategori' => 'Fasilitas',
            'aspirasi' => 'Lampu kelas mati',
            'tanggal' => now()->toDateString(),
            'status' => 'aspirasi',
        ]);
        Pengaduan::create([
            'user_id' => $otherUser->id,
            'kategori' => 'Data pengguna lain',
            'aspirasi' => 'Jangan tampil di aktivitas saya',
            'tanggal' => now()->toDateString(),
            'status' => 'aspirasi',
        ]);

        $this->actingAs($user)
            ->get(route('pengaduan.index'))
            ->assertOk()
            ->assertSee('Aktivitas Pengaduan Saya')
            ->assertSee('Total pengaduan:')
            ->assertSee('>1</span>', false)
            ->assertSee('Lampu kelas mati')
            ->assertSee(route('pengaduan.show', $pengaduan->id), false)
            ->assertSee('Detail')
            ->assertSee('Aksi')
            ->assertSee('min-w-[760px]', false)
            ->assertSee('overflow-x-auto', false)
            ->assertDontSee('Jangan tampil di aktivitas saya')
            ->assertDontSee('pengaduan.edit')
            ->assertDontSee('Hapus');
    }

    public function test_user_dashboard_shows_live_counts_and_recent_owned_reports(): void
    {
        $this->withoutVite();
        $user = User::factory()->create(['role' => 'user']);
        $otherUser = User::factory()->create(['role' => 'user']);

        foreach ([
            ['kategori' => 'Ruang kelas', 'aspirasi' => 'Lampu rusak', 'status' => 'aspirasi'],
            ['kategori' => 'Perpustakaan', 'aspirasi' => 'Kursi diperbaiki', 'status' => 'proses'],
            ['kategori' => 'Lapangan', 'aspirasi' => 'Garis lapangan selesai', 'status' => 'selesai'],
        ] as $report) {
            Pengaduan::create(array_merge($report, [
                'user_id' => $user->id,
                'tanggal' => now()->toDateString(),
            ]));
        }

        Pengaduan::create([
            'user_id' => $otherUser->id,
            'kategori' => 'Rahasia',
            'aspirasi' => 'Milik pengguna lain',
            'tanggal' => now()->toDateString(),
            'status' => 'aspirasi',
        ]);

        $this->actingAs($user)
            ->get(route('dashboard'))
            ->assertOk()
            ->assertViewHas('totalAspirasi', 1)
            ->assertViewHas('totalProses', 1)
            ->assertViewHas('totalSelesai', 1)
            ->assertSee('Lampu rusak')
            ->assertSee('Kursi diperbaiki')
            ->assertSee('Garis lapangan selesai')
            ->assertDontSee('Milik pengguna lain')
            ->assertDontSee('Kamar mandi')
            ->assertDontSee('rokok dikamar mandi');
    }

    public function test_user_can_submit_a_report_with_a_photo_attachment(): void
    {
        $user = User::factory()->create(['role' => 'user']);
        $photo = UploadedFile::fake()->createWithContent(
            'bukti.png',
            base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAwMCAO+/d7sAAAAASUVORK5CYII=')
        );

        $response = $this->actingAs($user)->post(route('pengaduan.store'), [
            'kategori' => 'Ruang kelas',
            'aspirasi' => 'Lampu kelas mati',
            'tanggal' => now()->toDateString(),
            'foto' => $photo,
        ]);

        $response->assertRedirect(route('pengaduan.index'));

        $pengaduan = Pengaduan::where('user_id', $user->id)->firstOrFail();
        $photoPath = public_path('images/pengaduan/'.$pengaduan->foto);

        try {
            $this->assertFileExists($photoPath);
            $this->actingAs($user)
                ->get(route('pengaduan.show', $pengaduan->id))
                ->assertOk()
                ->assertSee(asset('images/pengaduan/'.$pengaduan->foto), false);
        } finally {
            File::delete($photoPath);
        }
    }

    public function test_admin_can_access_dashboard_with_status_counts_and_recent_activity(): void
    {
        $this->withoutVite();
        $admin = User::factory()->create(['role' => 'admin']);
        $reporter = User::factory()->create(['role' => 'user']);

        Pengaduan::create([
            'user_id' => $reporter->id,
            'kategori' => 'Fasilitas',
            'status' => 'aspirasi',
            'aspirasi' => 'Lampu kelas mati',
            'tanggal' => now()->toDateString(),
        ]);
        Pengaduan::create([
            'user_id' => $reporter->id,
            'kategori' => 'Fasilitas',
            'aspirasi' => 'Perbaikan meja',
            'tanggal' => now()->toDateString(),
            'status' => 'proses',
        ]);
        Pengaduan::create([
            'user_id' => $reporter->id,
            'kategori' => 'Fasilitas',
            'aspirasi' => 'Kran bocor',
            'tanggal' => now()->toDateString(),
            'status' => 'selesai',
        ]);

        $this->actingAs($admin)
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee('Dashboard Admin')
            ->assertSee('Lampu kelas mati')
            ->assertSee('Aspirasi Baru')
            ->assertSee('Sedang Diproses')
            ->assertSee('Selesai');
    }

    public function test_seeded_admin_can_log_in_and_access_dashboard(): void
    {
        $this->withoutVite();
        $this->seed();

        $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password123',
        ])->assertRedirect('/admin/dashboard');

        $this->get(route('admin.dashboard'))->assertOk();
    }

    public function test_regular_user_cannot_access_admin_dashboard(): void
    {
        $this->actingAs(User::factory()->create(['role' => 'user']))
            ->get(route('admin.dashboard'))
            ->assertRedirect('/dashboard');
    }

    public function test_user_can_log_out(): void
    {
        $this->actingAs(User::factory()->create())
            ->post(route('logout'))
            ->assertRedirect('/login');

        $this->assertGuest();
    }
}
