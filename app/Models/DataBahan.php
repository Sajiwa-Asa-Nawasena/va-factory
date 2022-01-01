<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBahan extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_bahan','nama_bahan','harga'
    ];
}
