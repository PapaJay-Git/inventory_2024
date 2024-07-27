<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application, which will be used when the
    | framework needs to place the application's name in a notification or
    | other UI elements where an application name needs to be displayed.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | the application so that it's available within Artisan commands.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. The timezone
    | is set to "UTC" by default as it is suitable for most use cases.
    |
    */

    'timezone' => env('APP_TIMEZONE', 'UTC'),

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by Laravel's translation / localization methods. This option can be
    | set to any locale for which you plan to have translation strings.
    |
    */

    'locale' => env('APP_LOCALE', 'en'),

    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is utilized by Laravel's encryption services and should be set
    | to a random, 32 character string to ensure that all encrypted values
    | are secure. You should do this prior to deploying the application.
    |
    */

    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY'),

    'previous_keys' => [
        ...array_filter(
            explode(',', env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode Driver
    |--------------------------------------------------------------------------
    |
    | These configuration options determine the driver used to determine and
    | manage Laravel's "maintenance mode" status. The "cache" driver will
    | allow maintenance mode to be controlled across multiple machines.
    |
    | Supported drivers: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],


    /*
    |--------------------------------------------------------------------------
    | Scripts Versioning
    |--------------------------------------------------------------------------
    |
    | This value determines the "version" of your scripts such as css/js
    | This will help you remove the cached versions of these in users web browsers
    |
    */

    'scripts_version' => '1.0.0.6',

    /**
     * Default password for all barangay accounts
     */
    'default_password' => 'P@ssword123',

    /**
     * DAYCARES DATA
     */

    'kind_of_breastfeeding' => [
        'Exclusive',
        'Mixed'
    ],

    'scheduled_session' => [
        'Morning',
        'Afternoon'
    ],

    'parents_counterpart' => [
        'Cash',
        'In Kind',
        'None'
    ],

    'attendance_status' => [
        'Continuing',
        'Dropped Out',
        'Graduated'
    ],

    'dropout_reason' => [
        'Illness',
        'Transfer of Residence',
        'Others'
    ],

    'facility_address' => [
        'facility_street_address',
        'facility_barangay',
        'facility_city_municipality',
        'facility_province',
        'facility_region'
    ],

    'child_name' => ['first_name', 'middle_name', 'last_name', 'ext', 'nickname'],

    'home_address' => ['home_street_address', 'home_barangay', 'home_city_municipality', 'home_province', 'home_region'],



    /**
     * PWDS DATA
     */

    'type_of_disabilities' => [
        'Deaf or Hard of Hearing',
        'Intellectual Disability',
        'Learning Disability',
        'Mental Disability',
        'Physical Disability/Orthopedic',
        'Psychosocial Disability',
        'Speech and Language Impairment',
        'Visual Disability',
        'Cancer (RA 11215)',
        'Rare Disease (RA 10747)'
    ],

    'cause_of_disability' => [
        'Chronic Illness (Acquired)',
        'Cerebral Palsy (Acquired)',
        'Injury (Acquired)',
        'Others (Acquired)',

        'Cerebral Palsy (Congenital/Inborn)',
        'Down Syndrome (Congenital/Inborn)',
        'ADHD (Congenital/Inborn)',
        'Others (Congenital/Inborn)',
    ],

    'civil_status' => [
        'Single',
        'Married',
        'Separated',
        'Cohabitation',
        'Widow/er'
    ],

    'sex' => ['Male', 'Female'],

    'educational_attainment' => [
        'None',
        'Kindergarten',
        'Elementary',
        'Junior High School',
        'Senior High School',
        'College',
        'Vocational',
        'Post Graduate'
    ],

    'status_of_employment' => [
        'Employed',
        'Unemployed',
        'Self-Employed'
    ],

    'types_of_employment' => [
        'Permanent/Regular',
        'Seasonal',
        'Casual',
        'Emergency'
    ],

    'category_of_employment' => [
        'Government',
        'Private'
    ],

    'occupation' => [
        'Managers',
        'Professionals',
        'Technicians and Associate Professionals',
        'Clerical Support Workers',
        'Service and Sales Workers',
        'Skilled Agricultural Forestry and Fishery',
        'Craft and Related Trade Workers',
        'Plant and Machine Operators and Assemblers',
        'Elementary Occupations',
        'Armed Forces Occupations',
        'Others',
    ],

    'organizational_information' => [
        'organization_affiliated',
        'contact_person',
        'office_address',
        'office_tel_no',
    ],

    'accomplished_by' => [
        'Applicant',
        'Guardian',
        'Representative'
    ],

    'accomplished_by_name' => [
        'accomplished_by_last_name',
        'accomplished_by_first_name',
        'accomplished_by_middle_name',
    ],

    'application_type' => [
        'New',
        'Renewal'
    ],

    'residence_address' => [
        'house_no_street',
        'barangay',
        'municipality',
        'province',
        'region',
    ],

    'id_reference_no' => [
        'sss_no',
        'gsis_no',
        'pagibig_no',
        'psn_no',
        'philhealth_no',
    ],

    'contail_details' => [
        'landline_no',
        'mobile_no',
        'email_address',
    ],

    'family_background' => [
        'father_last_name',
        'father_first_name',
        'father_middle_name',
        'mother_last_name',
        'mother_first_name',
        'mother_middle_name',
        'guardian_last_name',
        'guardian_first_name',
        'guardian_middle_name',
    ],

    'personal_information' => ['first_name', 'middle_name', 'last_name', 'suffix'],

    'pwd_images_path' => '/images/pwd_images/',

    'spo_status' => [
        'New',
        'Renewal',
        'Terminated',
        'Disapproved'
    ],

    // SOLO PARENTS

    'address' => ['street_address', 'barangay', 'city_municipality', 'province', 'region'],


    // DAFAQ

    'housing_type' => [
        'House and lot owner',
        'Rented house and lot',
        'House with rent-to-own',
        'House on lot with consent of owner',
        'Rent-free house with consent of owner',
        'Rent-free house and lot without consent of owner'
    ],


    'code' => [
        'C - PWD',
        'B - Lactating Mother',
        'A - Older Person',
    ],

    'housing_condition' => [
        'Partially Damaged',
        'Totally Damaged',
    ],

    'health_condition' => [
        'Dead',
        'Injured',
        'Missing',
        'With Illness',
    ],

    'dafac_address' => [
        'region',
        'province_district',
        'city_municipality_barangay',
        'barangay_evacuation_center_site',
    ],

    'head_of_the_family' => [
        'head_of_family_surname',
        'head_of_family_first_name',
        'head_of_family_middle_name',
    ],

    'kabataan_names' => [
        'first_name',
        'middle_name',
        'last_name',
        'nickname',
    ],

    'kabataan_in_case_of_emergency' => [
        'emergency_contact_name',
        'emergency_contact_address',
        'emergency_contact_relationship',
        'emergency_contact_phone',
    ],

    'kabataan_education_fields' => [
        [
            'post_graduate_course',
            'post_graduate_year'
        ],
        [
            'college_course',
            'college_year'
        ],
        [
            'high_school',
            'high_school_year'
        ],
        [
            'elementary',
            'elementary_year'
        ],
        [
            'other_education',
            'other_education_year'
        ],
    ],

    'kababaihan_names' => [
        'first_name',
        'middle_name',
        'last_name',
    ],

    'kababaihan_images_path' => '/images/kababaihan_images/',

];
