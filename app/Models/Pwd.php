<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pwd extends Model
{
    use HasFactory;

    protected $fillable = [
            'user_id',

            // Application Details
            'application_type',
            'disability_number',
            'filename',
            'date_applied',
            'pwd_photo',

            // Personal Information
            'last_name',
            'first_name',
            'middle_name',
            'suffix',
            'date_of_birth',
            'sex',
            'civil_status',
            'type_of_disabilities',
            'cause_of_disability',
            'cause_of_disability_others',

            // Address Information
            'house_no_street',
            'barangay',
            'municipality',
            'province',
            'region',

            // Contact Information
            'landline_no',
            'mobile_no',
            'email_address',

            // Educational and Employment Information
            'educational_attainment',
            'status_of_employment',
            'types_of_employment',
            'category_of_employment',
            'occupation',
            'occupation_others',

            // Organization Information
            'organization_affiliated',
            'contact_person',
            'office_address',
            'office_tel_no',

            // Identification Numbers
            'sss_no',
            'gsis_no',
            'pagibig_no',
            'psn_no',
            'philhealth_no',

            // Family Information
            'father_last_name',
            'father_first_name',
            'father_middle_name',
            'mother_last_name',
            'mother_first_name',
            'mother_middle_name',
            'guardian_last_name',
            'guardian_first_name',
            'guardian_middle_name',

            // Form Fill-up Information
            'accomplished_by',
            'accomplished_by_last_name',
            'accomplished_by_first_name',
            'accomplished_by_middle_name',

            // Certification Information
            'name_of_certifying_physician',
            'license_no',
            'processing_officer',
            'approving_officer',
            'encoder',
            'name_of_reporting_unit_office_section',
            'control_no',
    ];
}
