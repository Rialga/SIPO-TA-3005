<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request){
        $user = new User;

        $user->user_id = $request->user_id;
        $user->user_role = $request->user_role ;
        $user->user_nama = $request->user_nama ;
        $user->user_mail = $request->user_mail ;
        $user->user_alamat = $request->user_alamat ;
        $user->user_job = $request->user_job ;
        $user->user_phone = $request->user_phone ;
        $user->user_password = $request->user_password ;

        $user->save();
        return response()->json('Berhasil Menambah Data !');
    }

}
