@extends('layouts.app')
@section('title', 'Hitung karung pasir')

@section('content')
<section class="kartu sempit">
    <h1>Hitung kebutuhan karung pasir</h1>
    <p class="pengantar">Perkiraan jumlah karung untuk membuat tanggul darurat. Hasil ini estimasi, bukan ukuran baku.</p>

    <form action="{{ route('karung.hitung') }}" method="POST" novalidate>
        @csrf
        <div class="baris">
            <div class="bidang">
                <label for="panjang">Panjang tanggul (meter)</label>
                <input type="number" id="panjang" name="panjang" value="{{ old('panjang', $hasil['panjang'] ?? '') }}" min="1" placeholder="Contoh: 20">
                @error('panjang') <small class="galat">{{ $message }}</small> @enderror
            </div>
            <div class="bidang">
                <label for="tinggi_air">Tinggi genangan (cm)</label>
                <input type="number" id="tinggi_air" name="tinggi_air" value="{{ old('tinggi_air', $hasil['tinggi'] ?? '') }}" min="5" placeholder="Contoh: 60">
                @error('tinggi_air') <small class="galat">{{ $message }}</small> @enderror
            </div>
        </div>
        <button type="submit" class="tombol">Hitung kebutuhan</button>
    </form>

    @if ($hasil)
        <div class="hasil">
            <div class="hasil-angka" data-hitung="{{ $hasil['total'] }}">{{ number_format($hasil['total'], 0, ',', '.') }}</div>
            <div>karung pasir untuk tanggul {{ $hasil['panjang'] }} m dengan {{ $hasil['lapisan'] }} lapisan.</div>
        </div>
    @endif
</section>
@endsection
