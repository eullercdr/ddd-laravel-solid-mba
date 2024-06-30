<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'contract_id',
        'amount',
        'payment_date',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'id' => 'string',
        'payment_date' => 'date',
        'amount' => 'float'
    ];

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}
