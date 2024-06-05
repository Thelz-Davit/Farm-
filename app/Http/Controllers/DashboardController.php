<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use App\Models\Pengeluaran;
use App\Models\Sapi;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    function count()
    {
        $count = Sapi::where('availability', 1)->count();
        $countPemesanan = Pemesanan::count();

        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        // Sum the 'amount' column for the current month
        $result = Sapi::where('availability', 0)
        ->select(
            DB::raw('SUM(harga_jual) as total_harga_jual'),
            DB::raw('SUM(harga_beli) as total_harga_beli')
        )->first();

        $cost = Pengeluaran::select(
            DB::raw('SUM(cost) as total_cost')
        )->first();
        
        $rawpemasukanKotor = $result->total_harga_jual;

        // Calculate the difference
        $rawdifference = ($result->total_harga_jual - $result->total_harga_beli) - $cost->total_cost;

        $pengeluaran = number_format($cost->total_cost, 0, ',', '.');
        $difference = number_format($rawdifference, 0, ',', '.');
        $pemasukanKotor = number_format($rawpemasukanKotor, 0, ',', '.');

        $uniqueCustomerCount = Pemesanan::distinct('nama_pelanggan')->count('nama_pelanggan');

        $groupBySapi = Sapi::select('tipe', DB::raw('count(*) as total'))
            ->groupBy('tipe')
            ->get();

        $pemesananByMonth = Pemesanan::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as total_count'),
            DB::raw('SUM(pembayaran) as total_pembayaran')
        )
            ->groupBy('year', 'month')
            // ->orderBy('year', 'month')
            ->get();

        

        $pemesananGrouped = DB::table('pemesanan')
        ->join('sapi', 'pemesanan.id_sapi', '=', 'sapi.id')
        ->select(DB::raw('MONTHNAME(pemesanan.created_at) AS month'), 'sapi.tipe', DB::raw('COUNT(*) AS total_count'))
        ->groupBy(DB::raw('MONTHNAME(pemesanan.created_at)'), 'sapi.tipe')
        ->get();

        // return response()->json($this->formatData($pemesananGrouped));
        return view('index', compact('count', 'countPemesanan', 'uniqueCustomerCount', 'groupBySapi', 'pemesananGrouped','difference','pemasukanKotor','pengeluaran'));
    }

    private function formatData($data) {
        $result = [];
    
        foreach ($data as $item) {
            $month = $item->month;
            $type = $item->tipe;
            $total = $item->total_count;
    
            if (!isset($result[$month])) {
                $result[$month] = [
                    'month' => $month,
                    'count' => []
                ];
            }
    
            $result[$month]['count'][] = [
                'tipe' => $type,
                'total' => $total
            ];
        }
    
        return array_values($result);
    }
    
}
