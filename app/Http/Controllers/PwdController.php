<?php

namespace App\Http\Controllers;

use App\Models\Pwd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PwdController extends Controller
{
    private function arrayValidation()
    {
        $arrayValidation = [
            // Application Details
            'application_type' => 'required|in:' . implode(',', config('app.application_type')),
            'disability_number' => 'required|string|unique:your_table_name,disability_number',
            'photo_path' => 'required|string',
            'date_applied' => 'required|date',

            // Personal Information
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'suffix' => 'nullable|string|max:50',
            'date_of_birth' => 'required|date',
            'sex' => 'required|in:' . implode(',', config('app.sex')),
            'civil_status' => 'required|in:' . implode(',', config('app.civil_status')),
            'type_of_disability' => 'required|in:' . implode(',', config('app.type_of_disability')),
            'cause_of_disability' => 'nullable|in:' . implode(',', config('app.cause_of_disability')),
            'cause_of_disability_others' => 'nullable|string|max:255',

            // Address Information
            'house_no_street' => 'required|string|max:255',
            'barangay' => 'required|string|max:255',
            'municipality' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'region' => 'required|string|max:255',

            // Contact Information
            'landline_no' => 'nullable|string|max:50',
            'mobile_no' => 'nullable|string|max:50',
            'email_address' => 'nullable|email|max:255',

            // Educational and Employment Information
            'educational_attainment' => 'required|in:' . implode(',', config('app.educational_attainment')),
            'status_of_employment' => 'required|in:' . implode(',', config('app.employment_status')),
            'types_of_employment' => 'required|in:' . implode(',', config('app.types_of_employment')),
            'category_of_employment' => 'required|in:' . implode(',', config('app.category_of_employment')),
            'occupation' => 'nullable|in:' . implode(',', config('app.occupation')),
            'occupation_others' => 'nullable|string|max:255',

            // Organization Information
            'organization_affiliated' => 'nullable|string|max:255',
            'contact_person' => 'nullable|string|max:255',
            'office_address' => 'nullable|string|max:255',
            'office_tel_no' => 'nullable|string|max:50',

            // Identification Numbers
            'sss_no' => 'nullable|string|max:50',
            'gsis_no' => 'nullable|string|max:50',
            'pagibig_no' => 'nullable|string|max:50',
            'psn_no' => 'nullable|string|max:50',
            'philhealth_no' => 'nullable|string|max:50',

            // Family Information
            'father_last_name' => 'nullable|string|max:255',
            'father_first_name' => 'nullable|string|max:255',
            'father_middle_name' => 'nullable|string|max:255',
            'mother_last_name' => 'nullable|string|max:255',
            'mother_first_name' => 'nullable|string|max:255',
            'mother_middle_name' => 'nullable|string|max:255',
            'guardian_last_name' => 'nullable|string|max:255',
            'guardian_first_name' => 'nullable|string|max:255',
            'guardian_middle_name' => 'nullable|string|max:255',

            // Form Fill-up Information
            'accomplished_by' => 'required|in:' . implode(',', config('app.accomplished_by')),
            'accomplished_by_last_name' => 'nullable|string|max:255',
            'accomplished_by_first_name' => 'nullable|string|max:255',
            'accomplished_by_middle_name' => 'nullable|string|max:255',

            // Certification Information
            'name_of_certifying_physician' => 'nullable|string|max:255',
            'license_no' => 'nullable|string|max:255',
            'processing_officer' => 'required|string|max:255',
            'approving_officer' => 'required|string|max:255',
            'encoder' => 'required|string|max:255',
            'name_of_reporting_unit_office_section' => 'required|string|max:255',
            'control_no' => 'required|string|max:255',
        ];

        return $arrayValidation;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->arrayValidation());

        // Handle validation errors
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Get the validated data
        $validatedData = $validator->validated();

        // Add the authenticated user ID to the data
        $validatedData['user_id'] = Auth::id();

        // Handle nullable fields that depend on conditions
        if (!isset($validatedData['occupation'])) {
            $validatedData['occupation_others'] = null;
        }

        if (!isset($validatedData['cause_of_disability']) || $validatedData['cause_of_disability'] != 'Others (Acquired)' && $validatedData['cause_of_disability'] != 'Others (Congenital/Inborn)') {
            $validatedData['cause_of_disability_others'] = null;
        }

        // Create a new record in the database
        Pwd::create($validatedData);

        // Redirect back with a success message
        return redirect()->route('pwds.create')
            ->with('status', 'Record created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
