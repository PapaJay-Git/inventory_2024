<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dafac extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',

        'region',
        'province_district',
        'city_municipality_barangay',
        'barangay_evacuation_center_site',
        'serial_no',
        'head_of_family_surname',
        'head_of_family_first_name',
        'head_of_family_middle_name',
        'sex',
        'age',
        'date_of_birth',
        'occupation',
        'monthly_net_income',
        'is_4ps_beneficiary',
        'is_indigenous_people',
        'type_of_ethnicity',

        // Housing Information
        'housing_type',

        // Codes
        'code',

        // Housing Condition
        'housing_condition',

        // Health Condition
        'health_condition',

        // Signatures and Dates
        'name_of_brg_captain',
        'date_registered',
        'name_of_lswdo',

    ];

    public function familyMembers()
    {
        return $this->hasMany(FamilyMember::class);
    }
}
