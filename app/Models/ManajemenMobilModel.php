<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ManajemenMobilModel extends Model
{
    use HasFactory;

    protected $table='manajemen_mobil';  
    protected $fillable=['ID_Mobil','Merk','Model','Nomor_Plat','Tarif_Sewa_Mobil','Foto_Mobil','Status_Mobil'];  
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'ID_Mobil';

}