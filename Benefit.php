<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Benefit extends Model
{
    protected $fillable = [
        'senior_citizen_id','benefit_type','amount','release_date','status','notes','recorded_by'
    ];

    protected function casts(): array
    {
        return ['release_date' => 'date', 'amount' => 'decimal:2'];
    }

    public function seniorCitizen(): BelongsTo
    {
        return $this->belongsTo(SeniorCitizen::class);
    }

    public function recorder(): BelongsTo
    {
        return $this->belongsTo(User::class, 'recorded_by');
    }
}
