
@extends('layouts.app')

@section('title', 'Konfirmasi Laporan')

@section('content')
<div class="success-header">
    <div class="success-icon">✓</div>

    <h1>Laporan Berhasil Dikirim!</h1>

    <p>
        Terima kasih atas laporan Anda. Data telah diproses
        dan ditampilkan sebagai konfirmasi laporan.
    </p>
</div>

<div class="panel" style="max-width: 900px; margin: 0 auto;">
    <div class="summary-grid">
        <div class="summary-section">
            <h3>▤ &nbsp; Ringkasan Laporan</h3>

            <div class="summary-row">
                <span>Nama Pelapor</span>
                <strong>{{ $laporan['nama_pelapor'] }}</strong>
            </div>

            <div class="summary-row">
                <span>Kecamatan</span>
                <strong>{{ $laporan['kecamatan'] }}</strong>
            </div>

            <div class="summary-row">
                <span>Desa / Kelurahan</span>
                <strong>{{ $laporan['desa'] }}</strong>
            </div>

            <div class="summary-row">
                <span>Tinggi Genangan Air</span>
                <strong>{{ $laporan['tinggi_air'] }} cm</strong>
            </div>

            <div class="summary-row">
                <span>Waktu Laporan</span>
                <strong>{{ $waktu }} WIB</strong>
            </div>
        </div>

        <div class="summary-section">
            <h3>ⓘ &nbsp; Status Genangan</h3>

            <div class="status-badge status-{{ $status['kelas'] }}">
                {{ strtoupper($status['label']) }}
            </div>

            <h4 style="font-size: 13px; margin-bottom: 10px;">
                Saran Penanganan
            </h4>

            <div class="advice">
                {{ $status['saran'] }}
            </div>
        </div>
    </div>

    <div class="alert alert-info" style="margin-top: 25px; margin-bottom: 0;">
        <strong>ⓘ Informasi</strong><br>
        Data laporan hanya diproses sementara dan tidak
        disimpan secara permanen ke database.
    </div>
</div>

<div class="bottom-actions">
    <a href="{{ route('lapor.form') }}" class="btn btn-secondary">
        ⌂ &nbsp; Kembali ke Beranda
    </a>

    <a href="{{ route('lapor.form') }}" class="btn">
        ▤ &nbsp; Kirim Laporan Lagi
    </a>
</div>
@endsection