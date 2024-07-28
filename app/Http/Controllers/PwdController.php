<?php

namespace App\Http\Controllers;

use App\Helpers\ImageGeneratorHelper;
use App\Models\Pwd;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PwdController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pwds = Pwd::where('pwds.user_id', Auth::user()->id)
            ->get();

        return view('users.barangay.forms.pwds.index', compact('pwds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.barangay.forms.pwds.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $data['user_id'] = Auth::user()->id;

        $validator = $this->validateCustomData($request, true);

        $validator->validate();

        $uuid = Str::uuid();
        $fileName = "Barangay_ID_{$data['user_id']}_pwd_{$uuid}." . $request->file('pwd_photo')->extension();
        $request->file('pwd_photo')->move(public_path(config('app.pwd_images_path')), $fileName);
        $data['pwd_photo'] = $fileName;
        $selectedDisabilities = $request->input('type_of_disabilities');
        $data['type_of_disabilities'] = json_encode($selectedDisabilities);

        // Handle nullable fields that depend on conditions
        if ($data['occupation']  != 'Others') {
            $data['occupation_others'] = null;
        }

        if (!str_contains($data['cause_of_disability'], 'Others')) {
            $data['cause_of_disability_others'] = null;
        }

        // Create a new record in the database
        Pwd::create($data);

        // Redirect back with a success message
        return redirect()->route('pwds.create')
            ->with('status', 'Record created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pwd = Pwd::where('pwds.user_id', Auth::user()->id)
            ->where('pwds.id', $id)
            ->firstOrFail();

        $pwd_photo = config('app.pwd_images_path')."".$pwd->pwd_photo;
        $base64Logo = ImageGeneratorHelper::getImageBased64('logos/DOH.png');
        $pwd_photo = ImageGeneratorHelper::getImageBased64($pwd_photo);

        $pdf = Pdf::loadView('pdf.pwd', compact('base64Logo', 'pwd', 'pwd_photo'));

        return $pdf->stream('document.pdf');

        return $pdf->download('document.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pwd = Pwd::where('pwds.user_id', Auth::user()->id)
            ->where('pwds.id', $id)
            ->firstOrFail();

        return view('users.barangay.forms.pwds.edit', compact('pwd'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pwd = Pwd::where('pwds.user_id', Auth::user()->id)
            ->where('pwds.id', $id)
            ->firstOrFail();

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        $validator = $this->validateCustomData($request, false);

        $validator->validate();

        if (isset($data['pwd_photo'])) {

            $uuid = Str::uuid();
            $fileName = "Barangay_ID_{$data['user_id']}_pwd_{$uuid}." . $request->file('pwd_photo')->extension();
            $request->file('pwd_photo')->move(public_path(config('app.pwd_images_path')), $fileName);
            $data['pwd_photo'] = $fileName;


            $imagePath = public_path(config('app.pwd_images_path') . $pwd->pwd_photo);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $selectedDisabilities = $request->input('type_of_disabilities');
        $data['type_of_disabilities'] = json_encode($selectedDisabilities);

        // Handle nullable fields that depend on conditions
        if ($data['occupation']  != 'Others') {
            $data['occupation_others'] = null;
        }

        if (!str_contains($data['cause_of_disability'], 'Others')) {
            $data['cause_of_disability_others'] = null;
        }

        $pwd->update($data);

        return redirect()->route('pwds.edit', $id)->with('status', 'PWD record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pwd = Pwd::where('pwds.user_id', Auth::user()->id)
            ->where('pwds.id', $id)
            ->firstOrFail();

        $imagePath = public_path(config('app.pwd_images_path') . $pwd->pwd_photo);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $pwd->delete();

        return redirect()->route('pwds.index')->with('status', 'PWD record deleted successfully');
    }

    /**
     * CUSTOM FUNCTIONS BELOW
     *
     * @param [type] $isCreate
     * @return void
     */
    private function arrayValidation($isCreate)
    {
        $requiredOrNullable = $isCreate ?  'required' : 'nullable';

        $arrayValidation = [
            // Application Details
            'application_type' => 'required|in:' . implode(',', config('app.application_type')),
            'disability_number' => 'required|string',
            'pwd_photo' => "$requiredOrNullable|image|mimes:jpeg,png,jpg,gif,bmp,tiff,webp,svg|max:2048",
            'date_applied' => 'required|date',

            // Personal Information
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'suffix' => 'nullable|string|max:10',
            'date_of_birth' => 'required|date',
            'sex' => 'required|in:' . implode(',', config('app.sex')),
            'civil_status' => 'required|in:' . implode(',', config('app.civil_status')),
            'type_of_disabilities' => 'in:' . implode(',', config('app.type_of_disabilities')),
            'type_of_disabilities' => 'required|array|min:1',

            'cause_of_disability' => 'required|in:' . implode(',', config('app.cause_of_disability')),
            'cause_of_disability_others' => [
                'required_if:cause_of_disability,Others (Acquired)',
                'required_if:cause_of_disability,Others (Congenital/Inborn)',
                'max:255',
            ],
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
            'status_of_employment' => 'required|in:' . implode(',', config('app.status_of_employment')),
            'types_of_employment' => 'required|in:' . implode(',', config('app.types_of_employment')),
            'category_of_employment' => 'required|in:' . implode(',', config('app.category_of_employment')),
            'occupation' => 'required|in:' . implode(',', config('app.occupation')),
            'occupation_others' => 'required_if:occupation,Others|max:255',

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
            'accomplished_by_last_name' => 'required|string|max:255',
            'accomplished_by_first_name' => 'required|string|max:255',
            'accomplished_by_middle_name' => 'required|string|max:255',

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


    private function validateCustomData($request, $isCreate)
    {
        $validator = Validator::make($request->all(), $this->arrayValidation($isCreate));

        // Custom validation logic
        $validator->after(function ($validator) use ($request) {

            if (
                !empty($request['organization_affiliated']) ||
                !empty($request['contact_person']) ||
                !empty($request['office_address']) ||
                !empty($request['office_tel_no'])
            ) {

                if (
                    empty($request['organization_affiliated']) ||
                    empty($request['contact_person']) ||
                    empty($request['office_address']) ||
                    empty($request['office_tel_no'])
                ) {
                    $validator->errors()->add(
                        'organizational_information',
                        'All Organizational Information fields must be filled if any field is provided.'
                    );
                }
            }

            $family_background = [
                'father',
                'mother',
                'guardian',
            ];

            foreach ($family_background as $family) {
                if (
                    !empty($request[$family . '_first_name']) ||
                    !empty($request[$family . '_middle_name']) ||
                    !empty($request[$family . '_last_name'])
                ) {

                    if (
                        empty($request[$family . '_first_name']) ||
                        empty($request[$family . '_middle_name']) ||
                        empty($request[$family . '_last_name'])
                    ) {
                        $validator->errors()->add(
                            'family_background',
                            "All $family name fields must be filled if any $family name field is provided."
                        );
                    }
                }
            }
        });

        return $validator;
    }
}
