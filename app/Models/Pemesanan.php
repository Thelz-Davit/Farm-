<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = "Pemesanan";
    protected $fillable = ['nama_pelanggan','telp','alamat_pengiriman','id_sapi','status_pembayaran','pembayaran','admin'];
    use HasFactory;
}
