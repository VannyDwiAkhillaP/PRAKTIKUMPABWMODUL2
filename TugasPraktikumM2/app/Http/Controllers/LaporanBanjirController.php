<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanBanjirController extends Controller
{
    public const KECAMATAN = [
        'Baleendah',
        'Banjaran',
        'Bojongsoang',
        'Cileunyi',
        'Ciparay',
        'Dayeuhkolot',
        'Katapang',
        'Majalaya',
        'Pameungpeuk',
        'Rancaekek',
    ];

    // Menampilkan halaman form laporan banjir
    public function form()
    {
        return view('laporan.form', [
            'daftarKecamatan' => self::KECAMATAN,
        ]);
    }

    // Memproses data laporan tanpa database
    public function kirim(Request $request)
    {
        $data = $request->validate([
            'nama_pelapor' => 'required|string|min:3|max:100',
            'kecamatan' => 'required|in:' . implode(',', self::KECAMATAN),
            'desa' => 'required|string|max:100',
            'tinggi_air' => 'required|numeric|min:1|max:500',
        ], [
            'nama_pelapor.required' => 'Nama pelapor wajib diisi.',
            'nama_pelapor.min' => 'Nama pelapor minimal 3 karakter.',
            'kecamatan.required' => 'Pilih kecamatan lokasi kejadian.',
            'kecamatan.in' => 'Kecamatan tidak dikenali.',
            'desa.required' => 'Desa atau kelurahan wajib diisi.',
            'tinggi_air.required' => 'Tinggi genangan wajib diisi.',
            'tinggi_air.numeric' => 'Tinggi genangan harus berupa angka.',
            'tinggi_air.min' => 'Tinggi genangan minimal 1 cm.',
            'tinggi_air.max' => 'Tinggi genangan maksimal 500 cm.',
        ]);

        $tinggi = (float) $data['tinggi_air'];

        if ($tinggi <= 30) {
            $status = [
                'kelas' => 'rendah',
                'label' => 'Rendah',
                'saran' => 'Pantau perkembangan air dan amankan barang di lantai dasar.',
            ];
        } elseif ($tinggi <= 70) {
            $status = [
                'kelas' => 'sedang',
                'label' => 'Sedang',
                'saran' => 'Siapkan tas siaga dan pindahkan dokumen penting ke tempat tinggi.',
            ];
        } elseif ($tinggi <= 150) {
            $status = [
                'kelas' => 'tinggi',
                'label' => 'Tinggi',
                'saran' => 'Matikan listrik jika aman dilakukan dan bersiap menuju lokasi yang lebih aman.',
            ];
        } else {
            $status = [
                'kelas' => 'sangat',
                'label' => 'Sangat tinggi',
                'saran' => 'Segera menuju tempat aman dan hubungi petugas BPBD.',
            ];
        }

        return view('laporan.konfirmasi', [
            'laporan' => [
                'nama_pelapor' => $data['nama_pelapor'],
                'kecamatan' => $data['kecamatan'],
                'desa' => $data['desa'],
                'tinggi_air' => $tinggi,
            ],
            'status' => $status,
            'waktu' => now('Asia/Jakarta')->format('d/m/Y H:i'),
        ]);
    }
}