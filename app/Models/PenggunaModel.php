<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PenggunaModel extends Model
{
    use HasFactory;

    protected $table='pengguna';  
    protected $fillable=['ID_Pengguna','Nama_Pengguna','Alamat_Pengguna','Nomor_Telepon_Pengguna','Nomor_SIM_Pengguna'];  
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'ID_Pengguna';

    public static function kode()
    {
        $kode = DB::table('pengguna')->max('ID_Pengguna');
        $addNol = '';
        $kode = str_replace("IP-", "", $kode);
        $kode = (int) $kode + 1;
        $incrementKode = $kode;
    
        if (strlen($kode) == 1) {
            $addNol = "000";
        } elseif (strlen($kode) == 2) {
            $addNol = "00";
        } elseif (strlen($kode == 3)) {
            $addNol = "0";
        }
    
        $kodeBaru = "IP-".$addNol.$incrementKode;
        return $kodeBaru;
    }

    public static function penggunajoin($id){
        $brng =  DB::table('users')
        ->join('pengguna', 'pengguna.ID_Pengguna', '=', 'users.ID_Pengguna')
        ->where('users.ID_Pengguna',$id)
        ->get();
        return $brng;
    }   

}