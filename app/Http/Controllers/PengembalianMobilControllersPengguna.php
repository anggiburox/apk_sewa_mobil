<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PengembalianModel;
use App\Models\PenggunaModel;
use App\Models\ManajemenMobilModel;
use App\Models\PeminjamanMobilModel;
use Illuminate\Support\Facades\DB;

class PengembalianMobilControllersPengguna extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function index()
    {   
        $pgw = PengembalianModel::pengembalianjoinwheresession(session()->get('id_pengguna'));
        return view('pages/pengguna/pengembalian_mobil/index',['pgw' => $pgw]);
    }

	
    public function tambah(){
		$peminjaman = PeminjamanMobilModel::peminjammobiljoinTidakTersedia();
        return view('pages/pengguna/pengembalian_mobil/tambah', ['peminjaman'=>$peminjaman]);
    }

    public function store(Request $request){

        // update data ManajemenMobil
        DB::table('manajemen_mobil')
        ->where('ID_Mobil', $request->id_mobil)
        ->update([
            'Status_Mobil' => 'Tersedia'
        ]);

	// insert data ke table ManajemenMobil
	DB::table('pengembalian_mobil')->insert([
        'ID_Peminjaman_Mobil' => $request->id_peminjaman_mobil,
        'ID_Pengguna' => $request->id_pengguna,
        'ID_Mobil' => $request->id_mobil,
        'Tanggal_Pengembalian' => $request->tanggal_pengembalian,
        'Total_Harga' => $request->total_harga,
	]);

	// alihkan halaman ke halaman ManajemenMobil
	return redirect('/pengguna/pengembalian_mobil/')->withSuccess('Data berhasil disimpan');
    }

    public function edit($id)
	{
		// mengambil data keberangkatan berdasarkan id yang dipilih
		$pgw = DB::table('pengembalian_mobil')
		->where('ID_pengembalian_mobil',$id)
		->get();
        $mobil = ManajemenMobilModel::where('Status_Mobil', 'Tersedia')->get();
		$pengguna = PenggunaModel::get();
		// passing data keberangkatan yang didapat ke view edit.blade.php
		return view('pages/pengguna/pengembalian_mobil/edit',['pgw' => $pgw,'mobil'=>$mobil,'pengguna'=>$pengguna]);
	}

	// update data ManajemenMobil
	public function update(Request $request){
		// update data ManajemenMobil
		DB::table('pengembalian_mobil')->where('ID_Pengembalian_Mobil',$request->id_pengembalian_mobil)->update([
            'ID_Pengguna' => $request->id_pengguna,
            'ID_Mobil' => $request->id_mobil,
            'Tanggal_Mulai' => $request->tanggal_mulai,
            'Tanggal_Selesai' => $request->tanggal_selesai,
        ]);

        // update data ManajemenMobil
		DB::table('manajemen_mobil')->where('ID_Mobil',$request->id_mobil)->update([
            'Status_Mobil' => 'Tersedia'
        ]);
		
		
		// alihkan halaman ke halaman ManajemenMobil
		return redirect('/pengguna/pengembalian_mobil')->withSuccess('Data berhasil diperbaharui');
    }

	public function hapus($id){
   
        // Menghapus data ManajemenMobil dari tabel
        DB::table('pengembalian_mobil')->where('ID_Pengembalian_Mobil', $id)->delete();
		// Alihkan halaman ke halaman ManajemenMobil jika tidak ada data ManajemenMobil dengan ID tersebut
		return redirect('/pengguna/pengembalian_mobil')->withDanger('Data berhasil dihapus');
	}

	
}