<?php

namespace App\Http\Controllers\WEB\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(Request $request){
        return view('admin.dashboard.index');
    }
}
