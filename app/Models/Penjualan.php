<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = "Pemesanan";
    protected $fillable = ['nama_pelanggan','telp','alamat_pengiriman','sapi','status_pembayaran'];
    use HasFactory;
}
