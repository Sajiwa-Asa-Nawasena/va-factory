<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataCustomeJersey extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_bahan','kode_jenis','email','no_wa','nama','satuan','total','qty'
    ];
}
