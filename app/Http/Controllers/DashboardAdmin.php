<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\MahasiswaModel;
use App\Models\MitraOpenEnrichmentModel;
use App\Models\PeminjamanMobilModel;
use App\Models\PengajuanSuratModel;
use App\Models\PengajuanSuratModelKampusMerdeka;
use App\Models\PengembalianSuratModel;
use App\Models\PenggunaModel;
use Illuminate\Support\Facades\DB;

class DashboardAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function index()
    {  
        $pengguna = PenggunaModel::count();
        $mobil = PeminjamanMobilModel::count();
        return view('pages/admin/dashboard', ['pengguna'=>$pengguna, 'mobil'=>$mobil]);
    }
}