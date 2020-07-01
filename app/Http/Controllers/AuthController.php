<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;


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
            $user->user_password = Hash::make($request->user_password);

            $user->save();
            return response()->json('Berhasil Menambah Data !');
        }
    }



    public function login(Request $request)
    {
        $credentials = $request->only('user_id', 'user_password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'User Id / Password Salah'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(compact('token'));

    }

    public function getAuthenticatedUser()
    {
        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }

        return response()->json(compact('user'));
    }

    public function logout(Request $request){
//        try{
//            $this->validate($request,['token'=> 'required']);
//            JWTAuth::invalidate($request->input('token'));
//            return response()->json(['sukses' => true,'pesan'=>'Berhasil Log Out']);
//        }catch(\Exception $e){
//            return response()->json(['sukses'=>false, 'pesan'=>'Gagal Logout'], $e->getStatusCode());
//        }

        JWTAuth::invalidate();
        return response([
            'status' => 'success',
            'msg' => 'Logged out Successfully.'
        ], 200);
    }

}
