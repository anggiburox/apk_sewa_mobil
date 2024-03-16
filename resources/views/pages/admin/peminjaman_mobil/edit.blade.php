@extends('layout.admin')

@section('content')
<div class="pagetitle">
    <div class="card">
        <div class="card-title card-body">
            <h2 class='mt-3 text-black'>Update Data Peminjaman Mobil</h2>
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
                    <!-- Form tambah data peminjaman_mobil -->
                @foreach($pgw as $pp)
                    <form action="/admin/peminjaman_mobil/update" method="POST" id='form-submit' enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <h6 class="mb-5 mt-3" style='color:red;'>(*) Data wajib diisi</h6>
                        <div class="row mb-3">
                            <input type='hidden' name='id_peminjaman_mobil' class='form-control' readonly style='background:#e6e6fa;' value="{{$pp->ID_Peminjaman_Mobil}}">
                            <input type='hidden' name='id_pengguna' class='form-control' readonly style='background:#e6e6fa;' value="{{$pp->ID_Pengguna}}">
                            <label for="inputText" class="col-sm-3 col-form-label">Pengguna <label
                                    style='color:red;'>(*)</label></label>
                            <div class="col-sm-2">
                                <select name='id_pengguna' id="selectPengguna" class='form-control' onchange=showPengguna() required disabled>
                                    <option value="">-- Pilih Data Pengguna --</option>
                                    @foreach($pengguna as $p)
                                    <option value="{{ $p->ID_Pengguna }}"
                                        data-sim='{{$p->Nomor_SIM_Pengguna}}'
                                        data-alamat='{{$p->Alamat_Pengguna}}' data-telepon='{{$p->Nomor_Telepon_Pengguna}}'>
                                        {{ $p->Nama_Pengguna}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="inputText" class="col-sm-3 col-form-label">Nomor SIM Pengguna <label
                                    style='color:red;'>(*)</label></label>
                            <div class="col-sm-2">
                                <input type='text' id='sim_pengguna' class='form-control' readonly style='background:#e6e6fa;'>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-3 col-form-label">Alamat Pengguna <label
                                    style='color:red;'>(*)</label></label>
                            <div class="col-sm-2">
                                <textarea name='' id='alamat_pengguna' readonly style='background:#e6e6fa;' class='form-control' required></textarea>
                            </div>
                            <label for="inputText" class="col-sm-3 col-form-label">Nomor Telepon pengguna<label
                                    style='color:red;'>(*)</label></label>
                            <div class="col-sm-2">
                                <input type="number" min='0' class="form-control" name="" required id='telepon_pengguna' readonly style='background:#e6e6fa;'>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-3 col-form-label">Model Mobil <label
                                    style='color:red;'>(*)</label></label>
                            <div class="col-sm-2">
                                <select name='id_mobil' id="selectMobil" class='form-control' onchange=showMobil() required>
                                    <option value="">-- Pilih Data Model Mobil --</option>
                                    @foreach($mobil as $p)
                                    <option value="{{ $p->ID_Mobil}}"
                                        data-noplat='{{$p->Nomor_Plat}}'
                                        data-tarifsewa='{{$p->Tarif_Sewa_Mobil}}'>
                                        {{ $p->Model}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="inputText" class="col-sm-3 col-form-label">Nomor Plat <label
                                    style='color:red;'>(*)</label></label>
                            <div class="col-sm-2">
                                <input type='text' id='no_plat_mobil' class='form-control' readonly style='background:#e6e6fa;'>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-3 col-form-label">Tarif Sewa Mobil <label
                                    style='color:red;'>(*)</label></label>
                            <div class="col-sm-2">
                                <input type='text' id='tarif_sewa_mobil' class='form-control' readonly style='background:#e6e6fa;'>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-3 col-form-label">Tangal Mulai <label
                                    style='color:red;'>(*)</label></label>
                            <div class="col-sm-2">
                                <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" onchange="hitungTotalSewa()"  required>
                            </div>
                            <label for="inputText" class="col-sm-3 col-form-label">Tanggal Selesai<label
                                    style='color:red;'>(*)</label></label>
                            <div class="col-sm-2">
                                <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" onchange="hitungTotalSewa()"  required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-3 col-form-label">Total Sewa Harian<label
                                    style='color:red;'>(*)</label></label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="total_sewa_harian" name="total_sewa_harian" readonly style='background:#e6e6fa;'>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="button" onclick="form_submit()"><i
                                    class='bi bi-check-circle'></i>&nbsp;
                                Simpan</button>
                            <a href="/admin/peminjaman_mobil" class="btn btn-secondary"><i class='bi bi-x-circle'></i>&nbsp;
                                Kembali</a>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
$('#selectPengguna').select2({});
var selectedValue = "{{ $pgw[0]->ID_Pengguna }}";
$("#selectPengguna").val(selectedValue).trigger("change");
$('#selectMobil').select2({});

function showPengguna() {
    var select = document.getElementById("selectPengguna");
    var selectedOption = select.options[select.selectedIndex];
    var alamatPengguna = selectedOption.dataset.alamat;
    var teleponPengguna = selectedOption.dataset.telepon;
    var simPengguna = selectedOption.dataset.sim;

    if (alamatPengguna && teleponPengguna && simPengguna) {
        document.getElementById("alamat_pengguna").value = alamatPengguna;
        document.getElementById("telepon_pengguna").value = teleponPengguna;
        document.getElementById("sim_pengguna").value = simPengguna;
    } else {
        document.getElementById("alamat_pengguna").value = "";
        document.getElementById("telepon_pengguna").value = "";
        document.getElementById("sim_pengguna").value = "";
    }
}

function showMobil() {
    var select = document.getElementById("selectMobil");
    var selectedOption = select.options[select.selectedIndex];
    var platMobil = selectedOption.dataset.noplat;
    var tarifMobil = selectedOption.dataset.tarifsewa;

    if (platMobil && tarifMobil) {
        document.getElementById("no_plat_mobil").value = platMobil;
        document.getElementById("tarif_sewa_mobil").value = tarifMobil;
    } else {
        document.getElementById("no_plat_mobil").value = "";
        document.getElementById("tarif_sewa_mobil").value = "";
    }
    
    hitungTotalSewa();
}


function hitungTotalSewa() {
    var tanggalMulai = new Date(document.getElementById("tanggal_mulai").value);
    var tanggalSelesai = new Date(document.getElementById("tanggal_selesai").value);

    if (!isNaN(tanggalMulai.getTime()) && !isNaN(tanggalSelesai.getTime())) {
        // Tambahkan 1 hari pada tanggal selesai untuk memasukkan hari tersebut dalam perhitungan
        tanggalSelesai.setDate(tanggalSelesai.getDate() + 1);

        var diffTime = Math.abs(tanggalSelesai - tanggalMulai);
        var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

        var tarifSewa = parseFloat(document.getElementById("tarif_sewa_mobil").value);
        var totalSewaHarian = diffDays * tarifSewa;

        document.getElementById("total_sewa_harian").value = totalSewaHarian.toFixed(0);
    } else {
        document.getElementById("total_sewa_harian").value = "";
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