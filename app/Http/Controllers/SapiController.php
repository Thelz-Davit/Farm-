<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Sapi;
use Illuminate\Http\Request;

class SapiController extends Controller
{
    public function index()
    {
        $data['sapi'] = Sapi::all();
        return view('sapi.table',$data);
    }

    public function create()
    {
        return view('sapi.form');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Sapi::create($input);
        return redirect('sapi/table');
    }

    public function edit($id)
    {
        $sapi = Sapi::findOrFail($id);
        return view('sapi.edit', compact('sapi'));
    }

    public function update(Request $request, $id)
    {
        $sapi = Sapi::findOrFail($id);
        $input = $request->all();
        $sapi->update($input);
        return redirect('sapi/table');
    }

    public function destroy($id)
    {
        $sapi = Sapi::findOrFail($id);
        $sapi->delete();
        return redirect('sapi/table');
    }

    public function jumlah()
    {
        $jumlahSapi = Sapi::count();
        return view('index', compact('jumlahSapi'));
    }
}
