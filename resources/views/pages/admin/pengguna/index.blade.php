@extends('layout.admin')

@section('content')
<div class="pagetitle">
    <div class="card">
        <div class="card-title card-body">
            <h2 class='mt-3 text-black'>Data Pengguna</h2>
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
                    <h5 class="card-title">
                        <a class="btn btn-info text-white" href="pengguna/tambah">
                            <i class="bi bi-plus-lg" aria-hidden="true"></i>&nbsp;
                            Tambah data
                        </a>
                    </h5>

                    <!-- Table with stripped rows -->
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th scope="col">Nomor SIM</th>
                                    <th scope="col">Nama Pengguna</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Nomor Telepon</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;?>
                                @foreach($pgw as $p)
                                <?php $no++ ;?>
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$p->Nomor_SIM_Pengguna}}</td>
                                    <td>{{$p->Nama_Pengguna}}</td>
                                    <td>{{$p->Alamat_Pengguna}}</td>
                                    <td> <a href="https://wa.me/{{ $p->Nomor_Telepon_Pengguna }}" target="_blank"
                                            class="text-primary">
                                            {{ $p->Nomor_Telepon_Pengguna }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="pengguna/edit/{{ $p->ID_Pengguna}}" data-toggle="tooltip" data-placement="top"
                                            title="Perbaharui" class="btn mb-1 btn-primary" type="button"><i
                                                class="ri-edit-box-line"></i>&nbsp; Edit</a>
                                        |
                                        <a href="pengguna/hapus/{{ $p->ID_Pengguna}}" class="delete btn mb-1 btn-danger"
                                            onclick="showConfirmation(event)" data-toggle="tooltip" data-placement="top"
                                            title="Hapus" type="button"><i class="bi bi-trash-fill"></i>&nbsp; Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
function showConfirmation(event) {
    event.preventDefault();
    var deleteLink = event.target.getAttribute('href');

    swal({
        title: "Konfirmasi",
        text: "Apakah Anda yakin ingin menghapus data ini?",
        icon: "warning",
        buttons: ["Batal", "Ya"],
        dangerMode: true,
    }).then((confirm) => {
        if (confirm) {
            window.location.href = deleteLink;
        }
    });
}
</script>

@if(Session::has('success'))
<script>
swal("Sukses", "{{ Session::get('success') }}", "success");
</script>
@endif

@if(Session::has('danger'))
<script>
swal("Sukses", "{{ Session::get('danger') }}", "success");
</script>
@endif
@endsection