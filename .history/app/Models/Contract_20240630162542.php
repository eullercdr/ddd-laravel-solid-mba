<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'id',
        'description',
        'amount',
        'periods',
        'date'
    ];

    protected $casts = [
        'id' => 'string',
        'start_date' => 'date',
        'amount' => 'float'
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

}
