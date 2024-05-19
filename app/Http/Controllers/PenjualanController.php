<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        // $data['sapi'] = Sapi::all();
        // return view('sapi.table',$data);
        return view('finansial.table');
    }
}
