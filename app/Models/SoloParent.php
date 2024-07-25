<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoloParent extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',

        // Basic Information
        'case_number',
        'last_name',
        'first_name',
        'middle_name',
        'suffix',
        'philsys_card_number',
        'sex',
        'date_of_birth',
        'age',
        'place_of_birth',

        // Residence Address
        'region',
        'province',
        'city_municipality',
        'barangay',
        'street_address',

        // Additional Information
        'educational_attainment',
        'civil_status',
        'occupation',
        'religion',
        'company_agency',
        'status_of_employment',
        'monthly_income',
        'contact_numbers',
        'email_address',
        'pantawid_beneficiary',
        'household_id',
        'indigenous_person',
        'affiliation',
        'lgbtq',
        'pwd',
        'classification_circumstances',
        'needs_problems',

        // Emergency Contact Information
        'emergency_name',
        'emergency_address',
        'emergency_number',
        'emergency_relationship',


        'spo_status',
        'solo_parent_id_card_number',
        'solo_parent_category',
        'date_issuance',
        'beneficiary_code',
    ];

    /**
     * Get the household compositions for the solo parent.
     */
    public function householdCompositions()
    {
        return $this->hasMany(HouseholdComposition::class);
    }
}
