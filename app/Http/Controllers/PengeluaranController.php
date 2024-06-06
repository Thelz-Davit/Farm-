<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index()
    {
        $data['pengeluaran'] = Pengeluaran::all();
        return view('finansial.pengeluaran.table',$data);
    }

    public function create()
    {
        return view('finansial.pengeluaran.form');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Pengeluaran::create($input);
        return redirect('pengeluaran/table');
    }

    public function edit($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        return view('finansial.pengeluaran.edit', compact('pengeluaran'));
    }

    public function update(Request $request, $id)
    {
        $pesan = Pengeluaran::findOrFail($id);
        $input = $request->all();
        $pesan->update($input);
        return redirect('pengeluaran/table');
    }
    public function destroy($id)
    {
        $pesan = Pengeluaran::findOrFail($id);
        $pesan->delete();
        return redirect('pengeluaran/table');
    }
}
