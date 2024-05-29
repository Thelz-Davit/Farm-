<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sapi extends Model
{
    protected $table = "Sapi";
    protected $fillable = ['tipe','status_kesehatan','harga_jual','harga_beli','foto','availability'];
    use HasFactory;
    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'id_sapi');
    }
}
