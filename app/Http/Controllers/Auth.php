<?php

namespace App\Http\Controllers;

use App\Models\PenggunaModel;
use App\Models\UsersModel;
// use App\Models\mahasiswaModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Auth extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        return view('pages/auth/loginforgot');
    }

    // public function forgot()
    // {  
    //     return view('pages/auth/lupa_password');
    // }

    // public function register()
    // {  
	// 	$kode = mahasiswaModel::kode();
    //     return view('pages/auth/register', ['kode'=>$kode]);
    // }

	// public function insertregister(Request $request){
    //     $validator = Validator::make($request->all(), [     
	// 		'username' => 'required|unique:users'
	// 	], [
	// 		'username.unique' => 'Username sudah terdaftar, silahkan masukkan username lain.'
	// 	]);
	// 	// Cek apakah validasi gagal
	// 	if ($validator->fails()) {
	// 		return redirect()->back()
	// 			->withErrors($validator)
	// 			->withInput();
	// 	}

    //     DB::table('mahasiswa')->insert([
    //         'ID_mahasiswa' => $request->id_mahasiswa,
    //         'Nama_mahasiswa' => $request->nama
    //     ]);
    //     DB::table('users')->insert([
    //         'ID_mahasiswa' => $request->id_mahasiswa,
    //         'Username' => $request->username,
    //         'Password' =>  bcrypt($request->input('password')),
    //         'ID_User_Roles' =>  $request->id_user_roles
    //     ]);
        
	// return redirect('/')->withSuccess('Data berhasil disimpan');
    // }

    // update data diskusi
	public function updatelupapassword(Request $request){
        $user = UsersModel::where('Email', $request->email)->first();
        if ($user) {
            // jika username ditemukan
            // update data users
            DB::table('users')->where('Email',$request->email)->update([
                'Password' =>  $request->password,
            ]);
            // alihkan halaman ke halaman lupa_password
            
            return redirect()->back()->with('success', 'Password berhasil diperbarui')->withInput()->with('register-form', true);            
            
        } else {
            // jika username tidak ditemukan
            return redirect()->back()->withErrors(['email' => 'Email tidak ditemukan'])->withInput()->with('register-form', true);
        }
    }

    
    public function register()
    {  
		$kode = PenggunaModel::kode();
        return view('pages/auth/register', ['kode'=>$kode]);
    }

    public function insertregister(Request $request){
        $validator = Validator::make($request->all(), [     
			'email' => 'required|unique:users'
		], [
			'email.unique' => 'Email sudah terdaftar, silahkan masukkan email lain.'
		]);
		// Cek apakah validasi gagal
		if ($validator->fails()) {
			return redirect()->back()
				->withErrors($validator)
				->withInput();
		}

        DB::table('pengguna')->insert([
            'ID_Pengguna' => $request->id_pengguna,
            'Nama_Pengguna' => $request->nama
        ]);
        DB::table('users')->insert([
            'ID_Pengguna' => $request->id_pengguna,
            'Email' => $request->email,
            'Password' =>  $request->password,
            'ID_User_Roles' =>  '2'
        ]);
        
	return redirect('/')->withSuccess('Data berhasil disimpan');
    }

    public function login(Request $request){  
        $post = request()->all();
        $user = UsersModel::where('Email', $post['email'])->first();
        if ($user) {
            $role = $user->ID_User_Roles;
            if ($role == 1) {
                $tutor = UsersModel::fetchusers($user->ID_User);
                if ($post['password'] == $user->Password) {
                    $params = [
                        'islogin'   => true,
                        'email'     => $tutor->Email,
                        'password' =>$tutor->Password,
                        'id_user'     => $user->ID_User,
                        'role'      => $tutor->ID_User_Roles
                    ];
                    $request->session()->put($params);
                    if ($role == 1) {
                        return redirect()->to('/admin/dashboard');
                    } 
                } else { 
                    return redirect()->back()->with('error', 'Password salah!');
                }
            } else if ($role == 2) {
                $mahasiswa = UsersModel::fetchjoinpengguna($user->ID_User);
                if ($post['password'] == $user->Password) {
                    $params = [
                        'islogin'   => true,
                        'id_user'     => $user->ID_User,
                        'password'  =>$mahasiswa->Password,
                        'id_pengguna'     => $mahasiswa->ID_Pengguna,
                        'nama_pengguna'     => $mahasiswa->Nama_Pengguna,
                        'role'      => $mahasiswa->ID_User_Roles
                    ];          
                    $request->session()->put($params);
                    return redirect()->to('/pengguna/dashboard');
                } else {
                    return redirect()->back()->with('error', 'Password salah!');
                }
            } 
            }else{
                return redirect()->back()->with('error', 'Email salah!');
            }
    }
    

    public function logout(){
        Session::forget('id_user');
        Session::forget('islogin');
        Session::forget('email');
        Session::forget('password');
        Session::forget('id_pengguna');
        Session::forget('nama_pengguna');
        Session::forget('role');
        Session::flush();
        return redirect()->to('/');
    }
}