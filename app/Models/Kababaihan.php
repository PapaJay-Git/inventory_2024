<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kababaihan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',

        // Basic Information
        'date',
        'last_name',
        'first_name',
        'middle_name',
        'city_address',
        'provincial_address',
        'date_of_birth',
        'birth_place',
        'civil_status',
        'citizenship',
        'religion',
        'mobile_number',
        'occupation',
        'name_of_company',
        'company_address',
        'educational_attainment',

        'spouse_name',
        'spouse_occupation',


        'number_of_children',
        'other_organizations_membership',


        // Contact Information
        'emergency_contact_name',
        'emergency_contact_number',

        // Image or ID Path
        'image_paths',
    ];
}
