<?php

namespace App\Http\Controllers\WEB\ADMIN;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request){
        return view('admin.dashboard.index');
    }

    public function login(){
        return view('admin.auth.login');
    }

    public function logout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
