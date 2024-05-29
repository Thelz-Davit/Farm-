<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use App\Models\Sapi;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    function countSapi(){
        $count = Sapi::count();
        $countPemesanan = Pemesanan::count();
        return view('index', compact('count', 'countPemesanan'));
    }
}
