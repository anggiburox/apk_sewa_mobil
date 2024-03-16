@extends('layout.admin')

@section('content')
<div class="pagetitle">
    <div class="card">
        <div class="card-title card-body">
            <h2 class='mt-3 text-black'>Data Manajemen Mobil</h2>
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
                        <a class="btn btn-info text-white" href="manajemen_mobil/tambah">
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
                                    <th scope="col">Merk</th>
                                    <th scope="col">Model</th>
                                    <th scope="col">Nomor Plat</th>
                                    <th scope="col">Tarif Sewa Mobil</th>
                                    <th scope="col">Foto Mobil</th>
                                    <th scope="col">Status Mobil</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;?>
                                @foreach($pgw as $p)
                                <?php $no++ ;?>
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$p->Merk}}</td>
                                    <td>{{$p->Model}}</td>
                                    <td>{{$p->Nomor_Plat}}</td>
                                    <td>{{$p->Tarif_Sewa_Mobil}}</td>
                                    <td>
                                        @if (empty($p->Foto_Mobil) || !file_exists(public_path('assets/Foto Mobil/' . $p->Foto_Mobil)))
                                            <img src="{{ asset('assets/Foto Mobil/Foto Default/default.png') }}" width="50" height="50">
                                        @else
                                            <img src="{{ asset('assets/Foto Mobil/' . $p->Foto_Mobil) }}" width="50" height="50">
                                        @endif
                                    </td>
                                    <td>
                                        @if ($p->Status_Mobil == 'Tersedia')
                                            <span class="badge bg-success">{{$p->Status_Mobil}}</span>
                                        @else
                                            <span class="badge bg-danger">{{$p->Status_Mobil}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="manajemen_mobil/edit/{{ $p->ID_Mobil}}" data-toggle="tooltip" data-placement="top"
                                            title="Perbaharui" class="btn mb-1 btn-primary" type="button"><i
                                                class="ri-edit-box-line"></i>&nbsp; Edit</a>
                                        |
                                        <a href="manajemen_mobil/hapus/{{ $p->ID_Mobil}}" class="delete btn mb-1 btn-danger"
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