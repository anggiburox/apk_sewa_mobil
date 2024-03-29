@extends('layout.admin')

@section('content')
<div class="pagetitle">
    <div class="card">
        <div class="card-title card-body">
            <h2 class='mt-3 text-black'>Tambah Data Pengguna</h2>
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
                    <!-- Form tambah data pengguna -->
                    <form action="/admin/pengguna/store" method="POST" id='form-submit' enctype="multipart/form-data">
                        @csrf
                        <h6 class="mb-5 mt-3" style='color:red;'>(*) Data wajib diisi</h6>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-3 col-form-label">Nomor SIM <label
                                    style='color:red;'>(*)</label></label>
                            <div class="col-sm-5">
                                <input type="hidden" class="form-control" name="id_pengguna" value="{{$kode}}" required>
                                <input type="number" min='0' class="form-control" name="nomor_sim_pengguna" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-3 col-form-label">Nama Pengguna<label
                                    style='color:red;'>(*)</label></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="nama_pengguna" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-3 col-form-label">Alamat Pengguna <label
                                    style='color:red;'>(*)</label></label>
                            <div class="col-sm-5">
                                <textarea name='alamat_pengguna' class='form-control' required></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-3 col-form-label">Nomor Telepon <label
                                    style='color:red;'>(*)</label></label>
                            <div class="col-sm-5">
                                <div class="input-group mb-3">
                                    <input type="number" min="0" class="form-control"
                                        name='nomor_telepon_pengguna' required />
                                </div>
                            </div>
                        </div>
                        <input type='hidden' name='id_user'>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-3 col-form-label">Email <label
                                    style='color:red;'>(*)</label></label>
                            <div class="col-sm-5">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">@</span>
                                    <input type="email" class="form-control" name='email' required
                                        aria-describedby="basic-addon1" />
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="button" onclick="form_submit()"><i
                                    class='bi bi-check-circle'></i>&nbsp;
                                Simpan</button>
                            <a href="/admin/pengguna" class="btn btn-secondary"><i class='bi bi-x-circle'></i>&nbsp;
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
</script>
@endsection