<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'benefit_type',
        'year',
        'status',
        'claim_date',
        'details',
    ];

    protected $casts = [
        'claim_date' => 'date',
        'details' => 'json',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
