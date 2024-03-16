<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PenggunaModel;
use App\Models\UsersModel;
use Illuminate\Support\Facades\DB;

class PenggunaControllersAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function index()
    {   
        $pgw = PenggunaModel::get();
        return view('pages/admin/pengguna/index',['pgw' => $pgw]);
    }

	
    public function tambah(){
		$kode = PenggunaModel::kode();
        return view('pages/admin/pengguna/tambah', ['kode'=>$kode]);
    }

    public function store(Request $request){

	// insert data ke table pengguna
	DB::table('pengguna')->insert([
		'ID_Pengguna' => $request->id_pengguna,
		'Nama_Pengguna' => $request->nama_pengguna,
		'Alamat_Pengguna' => $request->alamat_pengguna,
		'Nomor_Telepon_Pengguna' => $request->nomor_telepon_pengguna,
		'Nomor_SIM_Pengguna' => $request->nomor_sim_pengguna,
		'Email' => $request->email,
	]);

	DB::table('users')->insert([
		'ID_Pengguna' => $request->id_pengguna,
        'Email' => $request->email,
		'Password' =>  $request->nomor_sim_pengguna,
        'ID_User_Roles' => '2'
	]);
	


	// alihkan halaman ke halaman pengguna
	return redirect('/admin/pengguna/')->withSuccess('Data berhasil disimpan');
    }

    public function edit($id)
	{
		// mengambil data keberangkatan berdasarkan id yang dipilih
		$pgw = DB::table('pengguna')
		->where('ID_Pengguna',$id)
		->get();
		$user = PenggunaModel::penggunajoin($id);
		// passing data keberangkatan yang didapat ke view edit.blade.php
		return view('pages/admin/pengguna/edit',['pgw' => $pgw,'user'=>$user]);
	}

	// update data pengguna
	public function update(Request $request){
		// update data pengguna
		DB::table('pengguna')->where('ID_Pengguna',$request->id_pengguna)->update([
            'Nama_Pengguna' => $request->nama_pengguna,
            'Alamat_Pengguna' => $request->alamat_pengguna,
            'Nomor_Telepon_Pengguna' => $request->nomor_telepon_pengguna,
            'Nomor_SIM_Pengguna' => $request->nomor_sim_pengguna,
            'Email' => $request->email,
        ]);
		
		DB::table('users')->where('ID_Pengguna', $request->id_pengguna)->update([
			'Email' => $request->email,
			'Password' => $request->nomor_sim_pengguna,
		]);
		
		
		// alihkan halaman ke halaman pengguna
		return redirect('/admin/pengguna')->withSuccess('Data berhasil diperbaharui');
    }

	public function hapus($id){
   
        // Menghapus data pengguna dari tabel
        DB::table('pengguna')->where('ID_Pengguna', $id)->delete();
		// Alihkan halaman ke halaman pengguna jika tidak ada data pengguna dengan ID tersebut
		return redirect('/admin/pengguna')->withDanger('Data penguna berhasil dihapus');
	}

	
}