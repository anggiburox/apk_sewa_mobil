<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PeminjamanMobilModel extends Model
{
    use HasFactory;

    protected $table='peminjaman_mobil';  
    protected $fillable=['ID_Peminjaman_Mobil','ID_Pengguna','ID_Mobil','Tanggal_Mulai','Tanggal_Selesai','Harga_Harian'];  
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'ID_Peminjaman_Mobil';


    
    public static function peminjammobiljoin(){
        $brng =  DB::table('peminjaman_mobil')
        ->join('pengguna', 'pengguna.ID_Pengguna', '=', 'peminjaman_mobil.ID_Pengguna')
        ->join('manajemen_mobil', 'manajemen_mobil.ID_Mobil', '=', 'peminjaman_mobil.ID_Mobil')
        ->get();
        return $brng;
    }  
   
    public static function peminjammobiljoinsession($id){
        $brng =  DB::table('peminjaman_mobil')
        ->join('pengguna', 'pengguna.ID_Pengguna', '=', 'peminjaman_mobil.ID_Pengguna')
        ->join('manajemen_mobil', 'manajemen_mobil.ID_Mobil', '=', 'peminjaman_mobil.ID_Mobil')
        ->where('peminjaman_mobil.ID_Pengguna',$id)
        ->get();
        return $brng;
    }  
   

    
    public static function peminjammobiljoinTidakTersedia(){
        $brng =  DB::table('peminjaman_mobil')
        ->join('pengguna', 'pengguna.ID_Pengguna', '=', 'peminjaman_mobil.ID_Pengguna')
        ->join('manajemen_mobil', 'manajemen_mobil.ID_Mobil', '=', 'peminjaman_mobil.ID_Mobil')
        ->where('manajemen_mobil.Status_Mobil', 'Tidak Tersedia')
        ->get();
        return $brng;
    }  
}