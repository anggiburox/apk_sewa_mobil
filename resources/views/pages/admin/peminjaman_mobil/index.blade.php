@extends('layout.admin')

@section('content')
<div class="pagetitle">
    <div class="card">
        <div class="card-title card-body">
            <h2 class='mt-3 text-black'>Data Peminjaman Mobil</h2>
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
                        <a class="btn btn-info text-white" href="peminjaman_mobil/tambah">
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
                                    <th scope="col">SIM</th>
                                    <th scope="col">Nama Pengguna</th>
                                    <th scope="col">Merk</th>
                                    <th scope="col">Model</th>
                                    <th scope="col">No Plat</th>
                                    <th scope="col">Foto Mobil</th>
                                    <th scope="col">Tanggal Mulai</th>
                                    <th scope="col">Tanggal Selesai</th>
                                    <th scope="col">Total Sewa Harian</th>
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
                                    <td>{{$p->Merk}}</td>
                                    <td>{{$p->Model}}</td>
                                    <td>{{$p->Nomor_Plat}}</td>
                                    <td>
                                        @if (empty($p->Foto_Mobil) || !file_exists(public_path('assets/Foto Mobil/' . $p->Foto_Mobil)))
                                            <img src="{{ asset('assets/Foto Mobil/Foto Default/default.png') }}" width="50" height="50">
                                        @else
                                            <img src="{{ asset('assets/Foto Mobil/' . $p->Foto_Mobil) }}" width="50" height="50">
                                        @endif
                                    </td>
                                    <td>{{ date("d F Y", strtotime($p->Tanggal_Mulai)) }}</td>
                                    <td>{{ date("d F Y", strtotime($p->Tanggal_Selesai)) }}</td>
                                    <td>{{$p->Harga_Harian}}</td>
                                    <td>
                                        <a href="peminjaman_mobil/edit/{{ $p->ID_Peminjaman_Mobil}}" data-toggle="tooltip" data-placement="top"
                                            title="Perbaharui" class="btn mb-1 btn-primary" type="button"><i
                                                class="ri-edit-box-line"></i>&nbsp; Edit</a>
                                        |
                                        <a href="peminjaman_mobil/hapus/{{ $p->ID_Peminjaman_Mobil}}" class="delete btn mb-1 btn-danger"
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