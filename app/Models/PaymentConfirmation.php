<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentConfirmation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'email','jumlah_bayar','no_rekening_pengirim','tgl_bayar','bukti_pembayaran'
    ];
}
