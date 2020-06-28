<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request){
        $userid = User::where('user_id',$request->user_id)->count();
        $usermail = User::where([
            ['user_mail',$request->user_mail],
//            ['user_role',$request->user_role],
        ])->count();
        $userphone = User::where([
            ['user_phone',$request->user_phone],
//            ['user_role',$request->user_role],
        ])->count();


        if ($userid > 0){
            return response()->json('User Id sudah ada. gunakan yang lain !');
        }
        elseif ($usermail > 0){
            return response()->json('Email telah terdaftar. gunakan yang lain !');
        }
        elseif ($userphone > 0){
            return response()->json('Nomor Hp telah terdaftar. gunakan yang lain !');
        }
        else {
            $user = new User;
            $user->user_id = $request->user_id;
            $user->user_role = $request->user_role;
            $user->user_nama = $request->user_nama;
            $user->user_mail = $request->user_mail;
            $user->user_alamat = $request->user_alamat;
            $user->user_job = $request->user_job;
            $user->user_phone = $request->user_phone;
            $user->user_password = $request->user_password;

            $user->save();
            return response()->json('Berhasil Menambah Data !');
        }
    }

}
