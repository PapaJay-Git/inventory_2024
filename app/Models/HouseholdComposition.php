<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseholdComposition extends Model
{
    use HasFactory;

    protected $fillable = [
        'solo_parent_id',
        'name',
        'sex',
        'relationship',
        'birthdate',
        'age',
        'civil_status',
        'educational_attainment',
        'occupation',
        'monthly_income',
    ];

    /**
     * Get the solo parent that owns the household composition.
     */
    public function soloParent()
    {
        return $this->belongsTo(SoloParent::class);
    }
}
