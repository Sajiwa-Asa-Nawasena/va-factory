<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;
use Illuminate\Support\Carbon;

class CashFlow extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id', 'payment_types_id', 'cash_flow_types_id', 'date', 'amount', 'description'
    ];

    public function setDateAttribute( $value ) {
        $this->attributes['date'] = (new Carbon($value))->format('Y-m-d');
      }
}
