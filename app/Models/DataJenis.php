<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataJenis extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_bahan','kode_jenis','nama_jenis','harga'
    ];
}
