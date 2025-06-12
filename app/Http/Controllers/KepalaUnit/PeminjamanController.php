<?php

namespace App\Http\Controllers\KepalaUnit;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\WhatsappNotification;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Mobil;
use Illuminate\Support\Facades\Auth; // Tambahkan ini

class PeminjamanController extends Controller
{
    public function index()
    {
        $totalPeminjaman = Peminjaman::where('status', 'Diproses')->count();
        $listPeminjaman = Peminjaman::with("mobil.merek", 'mobil')->where('status', 'Diproses')->get();
        return view('kepala_unit.peminjaman.index', compact(['listPeminjaman', 'totalPeminjaman']));
    }

    public function approval(string $id)
    {
        $peminjaman = Peminjaman::with('user', 'lokasiPeminjaman', 'mobil.merek')->findOrFail($id);
        // dd($peminjaman);
        return view('kepala_unit.peminjaman.approval', compact('peminjaman'));
    }

    public function approve(Request $request, string $id, WhatsappNotification $wa)
    {
        $request->validate([
            'status' => 'required|in:Disetujui,Ditolak',
            'catatan_kepala_unit' => 'nullable|string'
        ]);

        $peminjaman = Peminjaman::with('user', 'lokasiPeminjaman')->findOrFail($id);
        $user = $peminjaman->user;
        $message = <<<EOT
*📢 [Notifikasi Peminjaman Kendaraan]*

*ID:* {$peminjaman->id}
Yth. *{$user->username},*

Pengajuan peminjaman kendaraan Anda telah disetujui dengan rincian sebagai berikut:

*Nama:* {$user->username}
*Jurusan:* {$user->jurusan->nama_jurusan}
*Prodi:* {$user->prodi->nama_prodi}

*Estimasi Waktu:*
📅 {$peminjaman->tanggal_peminjaman->format('Y-m-d')} - {$peminjaman->tanggal_pengembalian->format('Y-m-d')}
⏰ {$peminjaman->jam_peminjaman} - {$peminjaman->jam_pengembalian}

🔗 https://amkd.com/pegawai/pengembalian/{$peminjaman->id}

Silakan mengambil kunci di *Pusat Informasi* dan ambil kendaraan di *{$peminjaman->lokasiPeminjaman->lokasi}*.

Terima Kasih,
*Aplikasi Manajemen Kendaraan Dinas*
Kepala Unit
EOT;

        $peminjaman->update([
            'status' => $request->status,
            'catatan_kepala_unit' => $request->catatan_kepala_unit
        ]);

        if ($request->status === 'Ditolak') {
            Mobil::find($peminjaman->mobil_id)?->update(['status_ketersediaan' => 'Tersedia']);
        }

        if ($request->status === 'Disetujui') {
            $wa->sendMessage(
                $user->no_telepon,
                $message
            );
        }

        return redirect()->route('kepala-unit.peminjaman.index')
            ->with('success', 'Status peminjaman berhasil diperbarui');
    }
}