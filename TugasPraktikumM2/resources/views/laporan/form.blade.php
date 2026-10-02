
@extends('layouts.app')

@section('title', 'Form Pelaporan Banjir')

@section('content')
<div class="panel">
    <div class="form-grid">
        <div>
            <div class="panel-heading">
                <div class="heading-icon">▤</div>

                <div>
                    <h1>Form Pelaporan Banjir</h1>
                    <p>Laporkan kejadian banjir di wilayah Anda</p>
                </div>
            </div>

            <div class="alert alert-info">
                <strong>ⓘ Informasi Pelaporan</strong><br>
                Pastikan data yang Anda isi sudah benar.
                Laporan Anda dapat membantu petugas mengetahui
                kondisi genangan air di wilayah terdampak.
            </div>

            <div class="illustration">
                <div class="big-icon">🏘️</div>
                <h3>Bersama Hadapi Banjir</h3>
                <p>
                    Laporkan kondisi banjir di sekitar Anda agar
                    informasi dapat digunakan sebagai data awal
                    penanganan oleh petugas terkait.
                </p>
            </div>
        </div>

        <div>
            @if ($errors->any())
                <div class="alert alert-error">
                    <strong>Periksa kembali data Anda.</strong>

                    <ul style="padding-left: 20px; margin-top: 8px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('lapor.kirim') }}" method="POST">
                @csrf

                <div class="field">
                    <label for="nama_pelapor">Nama Pelapor</label>

                    <input
                        type="text"
                        id="nama_pelapor"
                        name="nama_pelapor"
                        value="{{ old('nama_pelapor') }}"
                        placeholder="Masukkan nama lengkap Anda"
                        minlength="3"
                        maxlength="100"
                        required
                    >

                    @error('nama_pelapor')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label for="kecamatan">Kecamatan</label>

                    <select id="kecamatan" name="kecamatan" required>
                        <option value="">Pilih kecamatan</option>

                        @foreach ($daftarKecamatan as $kecamatan)
                            <option
                                value="{{ $kecamatan }}"
                                {{ old('kecamatan') == $kecamatan ? 'selected' : '' }}
                            >
                                {{ $kecamatan }}
                            </option>
                        @endforeach
                    </select>

                    @error('kecamatan')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label for="desa">Desa / Kelurahan</label>

                    <input
                        type="text"
                        id="desa"
                        name="desa"
                        value="{{ old('desa') }}"
                        placeholder="Masukkan nama desa atau kelurahan"
                        maxlength="100"
                        required
                    >

                    @error('desa')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label for="tinggi_air">Tinggi Genangan Air (cm)</label>

                    <input
                        type="number"
                        id="tinggi_air"
                        name="tinggi_air"
                        value="{{ old('tinggi_air') }}"
                        placeholder="Masukkan tinggi genangan dalam cm"
                        min="1"
                        max="500"
                        required
                    >

                    <small>
                        Contoh: 50 untuk genangan setinggi 50 cm.
                    </small>

                    @error('tinggi_air')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn">
                        ➤ &nbsp; Kirim Laporan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="tentang" class="footer-note">
    LaporBanjir &copy; {{ date('Y') }} ·
    Sistem Pelaporan Banjir Kabupaten Bandung
</div>
@endsection