<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use App\Models\Sapi;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    function count()
    {
        $count = Sapi::count();
        $countPemesanan = Pemesanan::count();

        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        // Sum the 'amount' column for the current month
        $sumForCurrentMonth = Pemesanan::whereYear('created_at', $currentYear)
            ->whereMonth('created_at', $currentMonth)
            ->sum('pembayaran');

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

        $pemesananGrouped = Pemesanan::select(
            DB::raw('YEAR(pemesanan.created_at) as year'),
            DB::raw('MONTH(pemesanan.created_at) as month'),
            'sapi.tipe',
            DB::raw('COUNT(*) as total_count'),
            DB::raw('SUM(pemesanan.pembayaran) as total_pembayaran')
        )
        ->join('sapi', 'pemesanan.id_sapi', '=', 'sapi.id')
        ->groupBy('year', 'month', 'sapi.tipe')
        // ->orderBy('year', 'month')
        ->get();

        return view('index', compact('count', 'countPemesanan', 'sumForCurrentMonth', 'uniqueCustomerCount', 'groupBySapi', 'pemesananGrouped'));
    }
}
