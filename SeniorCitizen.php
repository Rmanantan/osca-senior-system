<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SeniorCitizen extends Model
{
    protected $fillable = [
        'osca_id','first_name','middle_name','last_name','birth_date',
        'sex','barangay','address','contact_number','philhealth',
        'pension_status'
    ];

    protected function casts(): array
    {
        return ['birth_date' => 'date', 'philhealth' => 'boolean'];
    }

    public function benefits(): HasMany
    {
        return $this->hasMany(Benefit::class);
    }

    public function getFullNameAttribute(): string
    {
        return trim("{$this->first_name} {$this->middle_name} {$this->last_name}");
    }
}
