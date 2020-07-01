<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class UserController extends Controller
{

    public function profile() {
        $data = Auth::user();
        return response()->json($data, 200);
    }

}
