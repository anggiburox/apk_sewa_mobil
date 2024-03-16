@extends('layout.admin')

@section('content')
<div class="pagetitle">
    <div class="card">
        <div class="card-title card-body">
            <h2 class='mt-3 text-black'>Update Data Manajemen Mobil</h2>
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
                    <!-- Form tambah data manajemen_mobil -->
                    
                @foreach($pgw as $pp)
                    <form action="/admin/manajemen_mobil/update" method="POST" id='form-submit' enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <h6 class="mb-5 mt-3" style='color:red;'>(*) Data wajib diisi</h6>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-3 col-form-label">Merk <label
                                    style='color:red;'>(*)</label></label>
                            <div class="col-sm-5">
                                <input type="hidden" class="form-control" name="id_mobil" value='{{$pp->ID_Mobil}}' required>
                                <input type="text" class="form-control" name="merk" value='{{$pp->Merk}}' required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-3 col-form-label">Model<label
                                    style='color:red;'>(*)</label></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="model" value='{{$pp->Model}}' required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-3 col-form-label">Nomor Plat<label
                                    style='color:red;'>(*)</label></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="no_plat" value='{{$pp->Nomor_Plat}}' required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-3 col-form-label">Tarif Sewa Mobil<label
                                    style='color:red;'>(*)</label></label>
                            <div class="col-sm-5">
                                    <input type="number" min='0' class="form-control" name="tarif_sewa"
                                        value='{{$pp->Tarif_Sewa_Mobil}}' required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-3 col-form-label">Foto</label>
                            <div class="col-sm-5">
                                <input type="file" class="form-control" name="foto" accept="image/png, image/jpeg">
                                <span style='color:red; font-size:10px;'>Besar file maksimal 1024 KB atau 1 MB Ekstensi
                                    file:
                                    jpeg/jpg,
                                    png</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="button" onclick="form_submit()"><i
                                    class='bi bi-check-circle'></i>&nbsp;
                                Simpan</button>
                            <a href="/admin/manajemen_mobil" class="btn btn-secondary"><i class='bi bi-x-circle'></i>&nbsp;
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