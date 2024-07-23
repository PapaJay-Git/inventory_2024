<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoloParent extends Model
{
    use HasFactory;

    protected $fillable = [
        'case_number',
        'full_name',
        'philys_card_number',
        'sex',
        'date_of_birth',
        'age',
        'place_of_birth',
        'address',
        'educational_attainment',
        'civil_status',
        'religion',
        'company_agency',
        'employment_status',
        'monthly_income',
        'contact_numbers',
        'pantawid_beneficiary',
        'indigenous_person',
        'lgbtq',
        'pwd',
        'email_address',
        'classification_circumstances',
        'needs_problems',
        'emergency_name',
        'emergency_address',
        'emergency_contact',
        'emergency_relationship',
    ];

    /**
     * Get the household compositions for the solo parent.
     */
    public function householdCompositions()
    {
        return $this->hasMany(HouseholdComposition::class);
    }
}
