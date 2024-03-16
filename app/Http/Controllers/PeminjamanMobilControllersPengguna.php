<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PeminjamanMobilModel;
use App\Models\PenggunaModel;
use App\Models\ManajemenMobilModel;
use Illuminate\Support\Facades\DB;

class PeminjamanMobilControllerspengguna extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function index()
    {   
        $pgw = PeminjamanMobilModel::peminjammobiljoinsession(session()->get('id_pengguna'));
        return view('pages/pengguna/peminjaman_mobil/index',['pgw' => $pgw]);
    }

	
    public function tambah(){
        $mobil = ManajemenMobilModel::where('Status_Mobil', 'Tersedia')->get();
		$pengguna = PenggunaModel::get();
        return view('pages/pengguna/peminjaman_mobil/tambah', ['mobil'=>$mobil, 'pengguna'=>$pengguna]);
    }

    public function store(Request $request){

        // update data ManajemenMobil
        DB::table('manajemen_mobil')
        ->where('ID_Mobil', $request->id_mobil)
        ->update([
            'Status_Mobil' => 'Tidak Tersedia'
        ]);

	// insert data ke table ManajemenMobil
	DB::table('peminjaman_mobil')->insert([
        'ID_Pengguna' => $request->id_pengguna,
        'ID_Mobil' => $request->id_mobil,
        'Tanggal_Mulai' => $request->tanggal_mulai,
        'Tanggal_Selesai' => $request->tanggal_selesai,
        'Harga_Harian' => $request->total_sewa_harian,
	]);

	// alihkan halaman ke halaman ManajemenMobil
	return redirect('/pengguna/peminjaman_mobil/')->withSuccess('Data berhasil disimpan');
    }

    public function edit($id)
	{
		// mengambil data keberangkatan berdasarkan id yang dipilih
		$pgw = DB::table('peminjaman_mobil')
		->where('ID_Peminjaman_Mobil',$id)
		->get();
        $mobil = ManajemenMobilModel::where('Status_Mobil', 'Tersedia')->get();
		$pengguna = PenggunaModel::get();
		// passing data keberangkatan yang didapat ke view edit.blade.php
		return view('pages/pengguna/peminjaman_mobil/edit',['pgw' => $pgw,'mobil'=>$mobil,'pengguna'=>$pengguna]);
	}

	// update data ManajemenMobil
	public function update(Request $request){
		// update data ManajemenMobil
		DB::table('peminjaman_mobil')->where('ID_Peminjaman_Mobil',$request->id_peminjaman_mobil)->update([
            'ID_Pengguna' => $request->id_pengguna,
            'ID_Mobil' => $request->id_mobil,
            'Tanggal_Mulai' => $request->tanggal_mulai,
            'Tanggal_Selesai' => $request->tanggal_selesai,
            'Harga_Harian' => $request->total_sewa_harian,
        ]);

        // update data ManajemenMobil
		DB::table('manajemen_mobil')->where('ID_Mobil',$request->id_mobil)->update([
            'Status_Mobil' => 'Tidak Tersedia'
        ]);
		
		
		// alihkan halaman ke halaman ManajemenMobil
		return redirect('/pengguna/peminjaman_mobil')->withSuccess('Data berhasil diperbaharui');
    }

	public function hapus($id){
   
        // Menghapus data ManajemenMobil dari tabel
        DB::table('peminjaman_mobil')->where('ID_Peminjaman_Mobil', $id)->delete();
		// Alihkan halaman ke halaman ManajemenMobil jika tidak ada data ManajemenMobil dengan ID tersebut
		return redirect('/pengguna/peminjaman_mobil')->withDanger('Data berhasil dihapus');
	}

	
}