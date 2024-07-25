<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabataan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nickname',
        'date_of_birth',
        'age',
        'position',
        'barangay',
        'home_address',
        'gender',
        'religion',
        'mobile_phone',
        'city_municipality',

        // Educational Background
        'post_graduate_course',
        'post_graduate_year',
        'college_course',
        'college_year',
        'high_school',
        'high_school_year',
        'elementary',
        'elementary_year',
        'other_education',
        'other_education_year',

        // Emergency Contact Information
        'emergency_contact_name',
        'emergency_contact_address',
        'emergency_contact_relationship',
        'emergency_contact_phone',
    ];
}
