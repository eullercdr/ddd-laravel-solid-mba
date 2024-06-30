<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contract extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'id',
        'description',
        'amount',
        'periods',
        'date',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'id' => 'string',
        'date' => 'date',
        'amount' => 'float'
    ];

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

}
