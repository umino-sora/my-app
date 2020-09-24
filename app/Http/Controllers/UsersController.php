<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        // 「users/mypage.blade.php」を表示
        return view('users/mypage');
    }
}
