<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KarungPasirController extends Controller
{
    public function form()
    {
        return view('karung.index', ['hasil' => null]);
    }

    // Input -> Proses -> Tampilkan hasil (tanpa database)
    public function hitung(Request $request)
    {
        $data = $request->validate([
            'panjang'    => 'required|numeric|min:1|max:1000',
            'tinggi_air' => 'required|numeric|min:5|max:300',
        ], [
            'panjang.required'    => 'Panjang tanggul wajib diisi.',
            'tinggi_air.required' => 'Tinggi genangan wajib diisi.',
            'panjang.min'         => 'Panjang tanggul minimal 1 meter.',
            'tinggi_air.min'      => 'Tinggi genangan minimal 5 cm.',
        ]);

        $tinggiKarung   = 15; // cm per lapisan (asumsi)
        $karungPerMeter = 5;  // karung per meter per lapisan (asumsi)

        $lapisan = (int) ceil($data['tinggi_air'] / $tinggiKarung);
        $total   = (int) ceil($data['panjang'] * $lapisan * $karungPerMeter);

        return view('karung.index', ['hasil' => [
            'panjang' => $data['panjang'],
            'tinggi'  => $data['tinggi_air'],
            'lapisan' => $lapisan,
            'total'   => $total,
        ]]);
    }
}
