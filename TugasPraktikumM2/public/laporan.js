document.addEventListener('DOMContentLoaded', function () {
    // 1) Alat ukur tinggi air (halaman form)
    var input = document.getElementById('tinggi_air');
    var air = document.getElementById('ukurAir');
    var angka = document.getElementById('ukurAngka');
    var teks = document.getElementById('ukurStatus');

    function tingkat(cm) {
        if (cm <= 0) return 'Isi tinggi air untuk melihat perkiraan tingkatnya.';
        if (cm <= 30) return 'Rendah: sekitar mata kaki hingga betis.';
        if (cm <= 70) return 'Sedang: sekitar lutut.';
        if (cm <= 150) return 'Tinggi: sekitar pinggang hingga dada.';
        return 'Sangat tinggi: melebihi tinggi dada orang dewasa.';
    }

    if (input && air) {
        var maks = parseFloat(document.querySelector('.ukur').dataset.max) || 200;
        var perbarui = function () {
            var cm = parseFloat(input.value) || 0;
            air.style.height = Math.min(cm / maks, 1) * 100 + '%';
            angka.textContent = cm;
            teks.textContent = tingkat(cm);
        };
        input.addEventListener('input', perbarui);
        perbarui();
    }

    // 2) Cegah kirim ganda
    var form = document.getElementById('formLapor');
    var tombol = document.getElementById('tombolKirim');
    if (form && tombol) {
        form.addEventListener('submit', function () {
            tombol.disabled = true;
            tombol.textContent = 'Mengirim...';
        });
    }

    // 3) Angka hasil kalkulator naik bertahap
    var hasil = document.querySelector('[data-hitung]');
    if (hasil) {
        var target = parseInt(hasil.dataset.hitung, 10), mulai = null;
        var langkah = function (t) {
            if (mulai === null) mulai = t;
            var p = Math.min((t - mulai) / 700, 1);
            hasil.textContent = Math.round(target * p).toLocaleString('id-ID');
            if (p < 1) requestAnimationFrame(langkah);
        };
        requestAnimationFrame(langkah);
    }
});
