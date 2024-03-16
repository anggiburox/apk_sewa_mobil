<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PengembalianModel extends Model
{
    use HasFactory;

    protected $table='pengembalian_mobil';  
    protected $fillable=['ID_Pengembalian_Mobil','ID_Peminjaman_Mobil','ID_Pengguna','ID_Mobil','Tanggal_Pengembalian','Total_Harga'];  
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'ID_Pengembalian_Mobil';


    
    public static function pengembalianjoin(){
        $brng =  DB::table('pengembalian_mobil')
        ->join('pengguna', 'pengguna.ID_Pengguna', '=', 'pengembalian_mobil.ID_Pengguna')
        ->join('manajemen_mobil', 'manajemen_mobil.ID_Mobil', '=', 'pengembalian_mobil.ID_Mobil')
        ->join('peminjaman_mobil', 'peminjaman_mobil.ID_Peminjaman_Mobil', '=', 'pengembalian_mobil.ID_Peminjaman_Mobil')
        ->get();
        return $brng;
    }   

    
    public static function pengembalianjoinwheresession($id){
        $brng =  DB::table('pengembalian_mobil')
        ->join('pengguna', 'pengguna.ID_Pengguna', '=', 'pengembalian_mobil.ID_Pengguna')
        ->join('manajemen_mobil', 'manajemen_mobil.ID_Mobil', '=', 'pengembalian_mobil.ID_Mobil')
        ->join('peminjaman_mobil', 'peminjaman_mobil.ID_Peminjaman_Mobil', '=', 'pengembalian_mobil.ID_Peminjaman_Mobil')
        ->where('pengembalian_mobil.ID_Pengguna',$id)
        ->get();
        return $brng;
    }   
}