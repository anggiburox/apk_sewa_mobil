@extends('layout.admin')

@section('content')
<div class="pagetitle">
    <div class="card">
        <div class="card-title card-body">
            <h2 class='mt-3 text-black'>Tambah Data Pengembalian Mobil</h2>
        </div>
    </div>
</div>
<!-- End Page Title -->

<section class="section">

    <!-- row -->

    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <!-- Form tambah data pengembalian_mobil -->
                    <form action="/admin/pengembalian_mobil/store" method="POST" id='form-submit' enctype="multipart/form-data">
                        @csrf
                        <h6 class="mb-5 mt-3" style='color:red;'>(*) Data wajib diisi</h6>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-3 col-form-label">Nomor Plat <label
                                    style='color:red;'>(*)</label></label>
                            <div class="col-sm-2">
                                <select name='id_mobil' id="selectPengguna" class='form-control' onchange=showPengguna() required>
                                    <option value="">-- Pilih Data --</option>
                                    @foreach($peminjaman as $p)
                                    <option value="{{ $p->ID_Mobil }}"
                                        data-sim='{{$p->Nomor_SIM_Pengguna}}'
                                        data-idpengguna='{{$p->ID_Pengguna}}' 
                                        data-namapengguna='{{$p->Nama_Pengguna}}' 
                                        data-alamat='{{$p->Alamat_Pengguna}}' 
                                        data-telepon='{{$p->Nomor_Telepon_Pengguna}}'
                                        data-idmobil='{{$p->ID_Mobil}}'
                                        data-model='{{$p->Model}}'
                                        data-merk='{{$p->Merk}}'
                                        data-tarifsewa='{{$p->Tarif_Sewa_Mobil}}'
                                        data-tanggalmulai='{{$p->Tanggal_Mulai}}'
                                        data-tanggalselesai='{{$p->Tanggal_Selesai}}'
                                        data-hargaharian='{{$p->Harga_Harian}}'
                                        data-idpeminjaman='{{$p->ID_Peminjaman_Mobil}}'
                                        >
                                        {{ $p->Nomor_Plat}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="inputText" class="col-sm-3 col-form-label">Nomor SIM Pengguna <label
                                    style='color:red;'>(*)</label></label>
                            <div class="col-sm-2">
                                <input type='hidden' id='id_peminjaman_mobil' name="id_peminjaman_mobil" class='form-control' readonly style='background:#e6e6fa;'>
                                <input type='hidden' id='id_mobil' name="id_mobil" class='form-control' readonly style='background:#e6e6fa;'>
                                <input type='text' id='sim_pengguna' class='form-control' readonly style='background:#e6e6fa;'>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-3 col-form-label">Nama Pengguna<label
                                    style='color:red;'>(*)</label></label>
                            <div class="col-sm-2">
                                <input type="hidden"class="form-control" name="id_pengguna" required id='id_pengguna' readonly style='background:#e6e6fa;'>
                                <input type="text"class="form-control" name="" required id='nama_pengguna' readonly style='background:#e6e6fa;'>
                            </div>
                            <label for="inputText" class="col-sm-3 col-form-label">Alamat Pengguna <label
                                    style='color:red;'>(*)</label></label>
                            <div class="col-sm-2">
                                <textarea name='' id='alamat_pengguna' readonly style='background:#e6e6fa;' class='form-control' required></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-3 col-form-label">Nomor Telepon pengguna<label
                                    style='color:red;'>(*)</label></label>
                            <div class="col-sm-2">
                                <input type="number" min='0' class="form-control" name="" required id='telepon_pengguna' readonly style='background:#e6e6fa;'>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-3 col-form-label">Model<label
                                    style='color:red;'>(*)</label></label>
                            <div class="col-sm-2">
                                <input type='text' id='model_mobil' class='form-control' readonly style='background:#e6e6fa;'>
                            </div>
                            <label for="inputText" class="col-sm-3 col-form-label">Merk<label
                                    style='color:red;'>(*)</label></label>
                            <div class="col-sm-2">
                                <input type='text' id='merk_mobil' class='form-control' readonly style='background:#e6e6fa;'>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-3 col-form-label">Tarif Sewa Mobil <label
                                    style='color:red;'>(*)</label></label>
                            <div class="col-sm-2">
                                <input type='text' id='tarif_sewa_mobil' class='form-control' readonly style='background:#e6e6fa;'>
                            </div>
                            <label for="inputText" class="col-sm-3 col-form-label">Tangal Mulai <label
                                    style='color:red;'>(*)</label></label>
                            <div class="col-sm-2">
                                <input type="text" id="tanggal_mulai" class="form-control" name="tanggal_mulai" required readonly style='background:#e6e6fa;'>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-3 col-form-label">Tanggal Selesai<label
                                    style='color:red;'>(*)</label></label>
                            <div class="col-sm-2">
                                <input type="text" id="tanggal_selesai" class="form-control" name="tanggal_selesai" required readonly style='background:#e6e6fa;'>
                            </div>
                            <label for="inputText" class="col-sm-3 col-form-label">Total Sewa Harian<label
                                    style='color:red;'>(*)</label></label>
                            <div class="col-sm-2">
                                <input type="text" id="harga_harian" class="form-control" name="tanggal_selesai" required readonly style='background:#e6e6fa;'>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-3 col-form-label">Tanggal Pengembalian<label
                                    style='color:red;'>(*)</label></label>
                            <div class="col-sm-2">
                                <input type="date" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian" required onchange="hitungTotalHarga()">
                            </div>
                            <label for="inputText" class="col-sm-3 col-form-label">Total Harga<label
                                    style='color:red;'>(*)</label></label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id='total_harga' name="total_harga" required readonly style='background:#e6e6fa;'>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="button" onclick="form_submit()"><i
                                    class='bi bi-check-circle'></i>&nbsp;
                                Simpan</button>
                            <a href="/admin/pengembalian_mobil" class="btn btn-secondary"><i class='bi bi-x-circle'></i>&nbsp;
                                Kembali</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
$('#selectPengguna').select2({});
$('#selectMobil').select2({});

function showPengguna() {
    var select = document.getElementById("selectPengguna");
    var selectedOption = select.options[select.selectedIndex];
    var idPenggunaa = selectedOption.dataset.idpengguna;
    var alamatPengguna = selectedOption.dataset.alamat;
    var teleponPengguna = selectedOption.dataset.telepon;
    var simPengguna = selectedOption.dataset.sim;
    var idMobill = selectedOption.dataset.idmobil;
    var idPeminjamanMobil = selectedOption.dataset.idpeminjaman;
    var tarifMobil = selectedOption.dataset.tarifsewa;
    var modelMobil = selectedOption.dataset.model;
    var merkMobil = selectedOption.dataset.merk;
    var namaPengguna = selectedOption.dataset.namapengguna;
    var tanggalPenggunaMulai = selectedOption.dataset.tanggalmulai;
    var tanggalPenggunaSelesai = selectedOption.dataset.tanggalselesai;
    var hargaHarianMobil = selectedOption.dataset.hargaharian;

    if (idPeminjamanMobil && idMobill && idPenggunaa && hargaHarianMobil && alamatPengguna && teleponPengguna && simPengguna && tarifMobil && modelMobil && merkMobil && namaPengguna && tanggalPenggunaMulai && tanggalPenggunaSelesai) {
        document.getElementById("id_peminjaman_mobil").value = idPeminjamanMobil;
        document.getElementById("id_pengguna").value = idPenggunaa;
        document.getElementById("id_mobil").value = idMobill;
        document.getElementById("alamat_pengguna").value = alamatPengguna;
        document.getElementById("telepon_pengguna").value = teleponPengguna;
        document.getElementById("sim_pengguna").value = simPengguna;
        document.getElementById("tarif_sewa_mobil").value = tarifMobil;
        document.getElementById("model_mobil").value = modelMobil;
        document.getElementById("merk_mobil").value = merkMobil;
        document.getElementById("nama_pengguna").value = namaPengguna;
        document.getElementById("tanggal_mulai").value = tanggalPenggunaMulai;
        document.getElementById("tanggal_selesai").value = tanggalPenggunaSelesai;
        document.getElementById("harga_harian").value = hargaHarianMobil;
    } else {
        document.getElementById("id_peminjaman_mobil").value = "";
        document.getElementById("id_pengguna").value = "";
        document.getElementById("id_mobil").value = "";
        document.getElementById("alamat_pengguna").value = "";
        document.getElementById("telepon_pengguna").value = "";
        document.getElementById("sim_pengguna").value = "";
        document.getElementById("tarif_sewa_mobil").value = "";
        document.getElementById("model_mobil").value = "";
        document.getElementById("merk_mobil").value = "";
        document.getElementById("nama_pengguna").value = "";
        document.getElementById("tanggal_mulai").value = "";
        document.getElementById("tanggal_selesai").value = "";
        document.getElementById("harga_harian").value = "";
    }

    hitungTotalHarga();
}

function hitungTotalHarga() {
        var tanggalSelesai = new Date(document.getElementById("tanggal_selesai").value);
        var tanggalPengembalian = new Date(document.getElementById("tanggal_pengembalian").value);
        var hargaHarian = parseFloat(document.getElementById("harga_harian").value);

        if (!isNaN(tanggalSelesai.getTime()) && !isNaN(tanggalPengembalian.getTime())) {
            var diffTime = tanggalPengembalian.getTime() - tanggalSelesai.getTime();
            var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

            // Harga total default adalah harga harian dikali jumlah hari sewa
            var totalHarga = diffDays * hargaHarian;

            // Jika tanggal pengembalian melebihi tanggal selesai, hitung denda atau biaya tambahan
            if (diffDays > 0) {
                // Misalnya, denda adalah 10% dari harga harian per hari
                var denda = hargaHarian * diffDays;
                // Tambahkan denda ke total harga
                totalHarga += denda;
            }

            // Tampilkan total harga di input total_harga
            document.getElementById("total_harga").value = totalHarga.toFixed(0);
        } else {
            document.getElementById("total_harga").value = "";
        }
    }


function form_submit() {
    // Menjalankan validasi form sebelum menampilkan konfirmasi
    if (document.getElementById('form-submit').checkValidity()) {
        swal({
            title: "Konfirmasi",
            text: "Apakah Anda yakin mengisi data ini?",
            icon: "warning",
            buttons: ["Batal", "Ya"],
            dangerMode: true,
        }).then((confirm) => {
            if (confirm) {
                document.getElementById('form-submit').submit();
            }
        });
    } else {
        // Menampilkan pesan error jika validasi form gagal
        swal({
            icon: 'error',
            title: 'Oops...',
            text: 'Harap lengkapi semua kolom yang diperlukan!',
        });
    }
}

var rupiah = document.getElementById("rupiah");
rupiah.addEventListener("keyup", function(e) {
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    rupiah.value = formatRupiah(this.value, "Rp. ");
});

/* Fungsi formatRupiah */
function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
    }

    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
}

</script>
@endsection