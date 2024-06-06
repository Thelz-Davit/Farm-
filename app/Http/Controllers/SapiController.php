<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Sapi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SapiController extends Controller
{
    public function index()
    {
        $data['sapi'] = Sapi::all();
        return view('sapi.table', $data);
    }

    public function create()
    {
        return view('sapi.form');
    }

    public function store(Request $request)
    {
        // $input = $request->all();
        // Sapi::create($input);
        $input = $request->all();

        // Handle the image upload
        if ($request->file('foto')) {
            $image = $request->file('foto');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('img'), $imageName);

            // Save the image path in the input array
            $input['foto'] = 'img/' . $imageName;
        }

        // Create a new Sapi record with the input data
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
        if ($request->file('foto')) {
            $image = $request->file('foto');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('img'), $imageName);

            // Save the image path in the input array
            $input['foto'] = 'img/' . $imageName;
        }
        $sapi->update($input);
        return redirect('sapi/table');
    }

    public function destroy($id)
    {
        $sapi = Sapi::findOrFail($id);
        $sapi->delete();
        return redirect('sapi/table');
    }

<<<<<<< HEAD
    public function jumlah()
    {
        $jumlahSapi = Sapi::count();
        return view('index', compact('jumlahSapi'));
    }
=======
    public function import(Request $request)
    {

        $file = $request->file('file');
        $fileContents = file($file->getPathname());

        // Skip the header row by slicing the array from the second element
        $fileContents = array_slice($fileContents, 1);

        foreach ($fileContents as $line) {
            $data = str_getcsv($line);

            if (
                isset($data[0], $data[1], $data[2], $data[3]) &&
                is_numeric($data[2]) && is_numeric($data[3])
            ) {

                Sapi::create([
                    'tipe' => $data[0],
                    'status_kesehatan' => $data[1],
                    'harga_jual' => (int) $data[2], // Convert to integer
                    'harga_beli' => (int) $data[3], // Convert to integer
                ]);
            } else {
                // Log invalid data
                // Log::warning('Invalid data in CSV line:', $data);
            }
        }

        return redirect()->back()->with('success', 'CSV file imported successfully.');
    }


>>>>>>> 5183b06cafa3a7b45a8466a875e182ed47d16eb1
}
