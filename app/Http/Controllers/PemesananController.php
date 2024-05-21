<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use App\Models\Sapi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemesananController extends Controller
{
    public function index()
    {
        $data['pesan'] = Pemesanan::all();
        return view('pemesanan.table', $data);
    }

    public function create()
    {
        //get sapi untuk dropdown
        $user = Auth::user();
        $sapi = Sapi::all();
        // belum bikin kolom availabilitynya
        // $sapi = Sapi::where('availability', 1)->get();
        return view('pemesanan.form', compact('sapi', 'user'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Pemesanan::create($input);
        return redirect('pemesanan/table');
    }

    public function show($id)
    {
        //untuk modal
        $pesanan = Sapi::find($id);
        return response()->json($pesanan);
    }

    public function update(Request $request, $id)
    {
        $pesan = Pemesanan::findOrFail($id);
        $input = $request->all();
        $pesan->update($input);
        return redirect('pemesanan/table');
    }
    public function destroy($id)
    {
        $pesan = Pemesanan::findOrFail($id);
        $pesan->delete();
        return redirect('pemesanan/table');
    }
}
