<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ManajemenMobilModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ManajemenMobilControllersPengguna extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function index()
    {   
        $pgw = ManajemenMobilModel::get();
        return view('pages/pengguna/manajemen_mobil/index',['pgw' => $pgw]);
    }

	
    public function tambah(){
        return view('pages/pengguna/manajemen_mobil/tambah', []);
    }

    public function store(Request $request){

        $foto = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            // Pindahkan file ke dalam folder foto
            $tujuanfoto = 'assets/Foto Mobil';
            $foto = $file->getClientOriginalName();
            $file->move($tujuanfoto, $foto);
        } else {
            // Foto tidak diunggah, gunakan foto default.png
            $tujuanfoto = 'assets/Foto Mobil/Foto Default';
            $foto = 'default.png';
        }

	// insert data ke table ManajemenMobil
	DB::table('manajemen_mobil')->insert([
        'Merk' => $request->merk,
        'Model' => $request->model,
        'Nomor_Plat' => $request->no_plat,
        'Tarif_Sewa_Mobil' => $request->tarif_sewa,
        'Foto_Mobil' => $foto,
        'Status_Mobil' => 'Tersedia'
	]);

	// alihkan halaman ke halaman ManajemenMobil
	return redirect('/pengguna/manajemen_mobil/')->withSuccess('Data berhasil disimpan');
    }

    public function edit($id)
	{
		// mengambil data keberangkatan berdasarkan id yang dipilih
		$pgw = DB::table('manajemen_mobil')
		->where('ID_Mobil',$id)
		->get();
		// passing data keberangkatan yang didapat ke view edit.blade.php
		return view('pages/pengguna/manajemen_mobil/edit',['pgw' => $pgw]);
	}

	// update data ManajemenMobil
	public function update(Request $request){

        $foto = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            // Pindahkan file ke dalam folder foto
            $tujuanfoto = 'assets/Foto Mobil';
            $foto = $file->getClientOriginalName();
            $file->move($tujuanfoto, $foto);
        } else {
            // Foto tidak diunggah, gunakan foto default.png
            $tujuanfoto = 'assets/Foto Mobil/Foto Default';
            $foto = 'default.png';
        }

		// update data ManajemenMobil
		DB::table('manajemen_mobil')->where('ID_Mobil',$request->id_mobil)->update([
            'Merk' => $request->merk,
            'Model' => $request->model,
            'Nomor_Plat' => $request->no_plat,
            'Tarif_Sewa_Mobil' => $request->tarif_sewa,
            'Foto_Mobil' => $foto,
            'Status_Mobil' => 'Tersedia'
        ]);
		
		
		// alihkan halaman ke halaman ManajemenMobil
		return redirect('/pengguna/manajemen_mobil')->withSuccess('Data berhasil diperbaharui');
    }

	public function hapus($id){

    // Menghapus data mobil berdasarkan id yang dipilih
    $mobil = DB::table('manajemen_mobil')->where('ID_Mobil', $id)->first();

        if ($mobil) {
            // Menghapus file foto jika file tersebut ada
            if ($mobil->Foto_Mobil) {
                $fotoPath = public_path('assets/Foto Mobil/' . $mobil->Foto_Mobil);
                if (File::exists($fotoPath)) {
                    File::delete($fotoPath);
                }
            }
    
            // Menghapus data mobil dari tabel
            DB::table('manajemen_mobil')->where('ID_Mobil', $id)->delete();
    
            // Alihkan halaman ke halaman mobil
            return redirect('/pengguna/manajemen_mobil')->withDanger('Data berhasil dihapus');
        }
	}

	
}