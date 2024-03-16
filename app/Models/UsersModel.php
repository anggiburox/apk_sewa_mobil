<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UsersModel extends Model
{
    use HasFactory;

    protected $table='users';  
    protected $fillable=['ID_User','ID_Pengguna','Email','Password','ID_User_Roles'];  
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'ID_User';

    
    public static function isUniqueUsername($email, $id)
    {
    return !static::where('Email', $email)
            ->where('ID_User', '<>', $id)
            ->exists();
    }

    public static function fetchUserProfile($id)
    {   
        $brng =  DB::table('users')
        ->where('users.ID_User', $id)
        ->get();
        return $brng;
    }
    
    public static function fetchusers($id)
    {
        $brng =  DB::table('users')
        ->where('users.ID_User',$id)
        ->first();
        return $brng;
    }

    //pengguna
    
    public static function joinuserpengguna(){
        $brng =  DB::table('users')
        ->join('pengguna', 'pengguna.ID_Pengguna', '=', 'users.ID_Pengguna')
        ->get();
        return $brng;
    }   
    


    public static function fetchUserJoinPengguna($id)
    {   
        $brng =  DB::table('users')
        ->join('pengguna', 'pengguna.ID_Pengguna', '=', 'users.ID_Pengguna')
        ->where('users.ID_User', $id)
        ->get();
        return $brng;
    }
    public static function fetchjoinpengguna($id)
    {
        $brng =  DB::table('users')
        ->join('pengguna', 'pengguna.ID_Pengguna', '=', 'users.ID_Pengguna')
        ->where('ID_User',$id)
        ->first();
        return $brng;
    }

}