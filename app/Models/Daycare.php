<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daycare extends Model
{
    use HasFactory;

    protected $fillable = [
        'eccdfid',
        'user_id',

        // Facility Location
        'facility_region',
        'facility_province',
        'facility_city_municipality',
        'facility_barangay',
        'facility_street_address',
        'facility_name',
        'service_provider',

        // Child Information
        'last_name',
        'first_name',
        'middle_name',
        'ext', // Extension (Jr., Sr.)
        'nickname',
        'sex',
        'birth_order',
        'no_of_siblings',
        'date_of_birth',
        'birthplace',
        'birth_registered',

        // Home Address
        'home_region',
        'home_province',
        'home_city_municipality',
        'home_barangay',
        'home_street_address',

        'religion',
        'ethnicity',

        // Nutrition and Services
        'breastfeeding',
        'kind_of_breastfeeding',
        'breastfed_for_months',
        'supplementary_feeding',
        'supplementary_feeding_for_days',

        // Disability Information
        'has_disability',
        'referred_for_assistance',

        // Additional Information
        'listahanan_identified',
        'pantawid_beneficiary',
        'household_id',

        // Participation Fee
        'participation_fee_paid',
        'participation_fee_amount',

        // Session Information
        'scheduled_session',

        // Parent's Counterpart
        'parents_counterpart',

        // Attendance Status
        'attendance_status',
        'school_year',
        'dropout_reason',
        'dropout_reason_others',

        // Accomplished By
        'accomplished_by',
        'date_accomplished',
        'name_of_eccd_service_provider',
        'encoder_id',
    ];

    public function disabilities()
    {
        return $this->hasMany(ChildDisability::class);
    }

    public function eccdExperiences()
    {
        return $this->hasMany(ChildEccdExperience::class);
    }
}
