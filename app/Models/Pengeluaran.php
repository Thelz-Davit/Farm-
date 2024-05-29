<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $table = "pengeluaran";
    protected $fillable = ['jenis_pengeluaran','keterangan','cost'];
    use HasFactory;
}
