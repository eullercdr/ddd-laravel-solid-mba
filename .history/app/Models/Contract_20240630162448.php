<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'description',
        'amount',
        'periods',
        'start_date'
    ];

    protected $casts = [
        'id' => 'uuid',
        'start_date' => 'date',
        'amount' => 'float'
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

}
