<?php

namespace App\Http\Controllers;

use App\Helpers\ImageGeneratorHelper;
use App\Models\Daycare;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DaycareController extends Controller
{
    const DEFAULTS = [
        'breastfeeding' => [
            'kind_of_breastfeeding' => null,
            'breastfed_for_months' => null,
        ],
        'supplementary_feeding' => [
            'supplementary_feeding_for_days' => null,
        ],
        'has_disability' => [
            'referred_for_assistance' => null,
        ],
        'pantawid_beneficiary' => [
            'household_id' => null,
        ],
        'participation_fee_paid' => [
            'participation_fee_amount' => null,
        ],
        'dropout_reason' => [
            'dropout_reason_others' => null,
        ],
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $daycares = Daycare::with(['disabilities', 'eccdExperiences'])
            ->where('daycares.user_id', Auth::user()->id)
            ->get();

        return view('users.barangay.forms.daycares.index', compact('daycares'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.barangay.forms.daycares.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        $validator = $this->validateCustomData($request);
        $validator->validate();

        foreach (self::DEFAULTS as $key => $fields) {
            if (!isset($data[$key])) {
                $data = array_merge($data, $fields);
            }
        }

        if ($data['dropout_reason'] != 'Others') {
            $data['dropout_reason_others'] = null;
        }

        // Create a new daycare and save it to the database
        $daycare = Daycare::create($data);
        $disabilities = $request->input('disabilities') ?? [];
        $eccdExperiences = $request->input('eccdExperiences') ?? [];

        foreach ($disabilities as $disability) {
            $daycare->disabilities()->create($disability);
        }
        foreach ($eccdExperiences as $experience) {
            $daycare->eccdExperiences()->create($experience);
        }


        return redirect()->route('daycares.create')->with('status', 'Daycare record created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $daycare = Daycare::with(['disabilities', 'eccdExperiences'])
        ->where('daycares.user_id', Auth::user()->id)
        ->where('daycares.id', $id)
        ->firstOrFail();

        $base64Logo = ImageGeneratorHelper::getImageBased64('logos/dswd.png');

        $pdf = Pdf::loadView('pdf.daycare', compact('base64Logo', 'daycare'));

        return $pdf->stream('document.pdf');

        return $pdf->download('document.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $daycare = Daycare::with(['disabilities', 'eccdExperiences'])
            ->where('daycares.user_id', Auth::user()->id)
            ->where('daycares.id', $id)
            ->firstOrFail();

        return view('users.barangay.forms.daycares.edit', compact('daycare'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $daycare = Daycare::with(['disabilities', 'eccdExperiences'])
            ->where('daycares.user_id', Auth::user()->id)
            ->where('daycares.id', $id)
            ->firstOrFail();

        $data = $request->all();

        $validator = $this->validateCustomData($request);
        $validator->validate();

        foreach (self::DEFAULTS as $key => $fields) {
            if (!isset($data[$key])) {
                $data = array_merge($data, $fields);
                $data[$key] = false;
            }
        }

        if ($data['dropout_reason'] != 'Others') {
            $data['dropout_reason_others'] = null;
        }
        if (!isset($data['listahanan_identified'])) {
            $data['listahanan_identified'] = false;
        }

        // Create a new daycare and save it to the database
        $daycare->update($data);
        $disabilities = $request->input('disabilities') ?? [];
        $eccdExperiences = $request->input('eccdExperiences') ?? [];

        $daycare->disabilities()->delete();
        foreach ($disabilities as $disability) {
            $daycare->disabilities()->create($disability);
        }
        $daycare->eccdExperiences()->delete();
        foreach ($eccdExperiences as $experience) {
            $daycare->eccdExperiences()->create($experience);
        }


        return redirect()->route('daycares.edit', $id)->with('status', 'Daycare record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $daycare = Daycare::where('daycares.user_id', Auth::user()->id)
            ->where('daycares.id', $id)
            ->firstOrFail();
        $daycare->disabilities()->delete();
        $daycare->eccdExperiences()->delete();
        $daycare->delete();

        return redirect()->route('daycares.index')->with('status', 'Daycare record deleted successfully!');
    }


    /**
     * CUSTOM FUNCTIONS
     *
     * @param [type]
     * @param [type]
     * @return void
     */

    private function validateCustomData($request)
    {
        $validator = Validator::make($request->all(), $this->arrayValidation());

        // Custom validation logic
        $validator->after(function ($validator) use ($request) {
            // Check disabilities array
            if ($request->has('disabilities')) {
                foreach ($request->input('disabilities') as $disability) {
                    if (empty($disability['disability']) || empty($disability['cause'])) {
                        $validator->errors()->add(
                            'disabilities',
                            'All disability fields must be filled.'
                        );
                        break;
                    }
                }
            }

            // Check ECCD experiences array
            if ($request->has('eccdExperiences')) {
                foreach ($request->input('eccdExperiences') as $experience) {
                    if (
                        empty($experience['service_type']) ||
                        empty($experience['service']) ||
                        empty($experience['from_date']) ||
                        empty($experience['to_date'])
                    ) {
                        $validator->errors()->add(
                            'eccdExperiences',
                            'All ECCD experience fields must be filled.'
                        );
                        break;
                    }
                }
            }
        });

        return $validator;
    }

    private function arrayValidation()
    {

        $arrayValidation = [
            'eccdfid' => 'required|string|max:255',

            // Facility Location
            'facility_region' => 'required|string|max:255',
            'facility_province' => 'required|string|max:255',
            'facility_city_municipality' => 'required|string|max:255',
            'facility_barangay' => 'required|string|max:255',
            'facility_street_address' => 'required|string|max:255',
            'facility_name' => 'required|string|max:255',
            'service_provider' => 'required|string|max:255',

            // Child Information
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'ext' => 'nullable|string|max:10', // Extension (Jr., Sr.)
            'nickname' => 'nullable|string|max:50',
            'sex' => 'required|in:' . implode(',', config('app.sex')),
            'birth_order' => 'required|integer|min:1',
            'no_of_siblings' => 'required|integer|min:0',
            'date_of_birth' => 'required|date',
            'birthplace' => 'required|string|max:255',
            'birth_registered' => 'required|date',

            // Home Address
            'home_region' => 'required|string|max:255',
            'home_province' => 'required|string|max:255',
            'home_city_municipality' => 'required|string|max:255',
            'home_barangay' => 'required|string|max:255',
            'home_street_address' => 'required|string|max:255',

            'religion' => 'nullable|string|max:255',
            'ethnicity' => 'nullable|string|max:255',

            // Nutrition and Services
            'breastfeeding' => 'boolean|in:1',
            'kind_of_breastfeeding' => 'required_if:breastfeeding,true|nullable|in:' . implode(',', config('app.kind_of_breastfeeding')),
            'breastfed_for_months' => 'required_if:breastfeeding,true|nullable|integer|min:0',
            'supplementary_feeding' => 'boolean|in:1',
            'supplementary_feeding_for_days' => 'required_if:supplementary_feeding,true|nullable|integer|min:0',

            // Disability Information
            'has_disability' => 'boolean|in:1',
            'referred_for_assistance' => 'required_if:has_disability,true|string|in:Yes,No',

            // Additional Information
            'listahanan_identified' => 'boolean|in:1',
            'pantawid_beneficiary' => 'boolean|in:1',
            'household_id' => 'required_if:pantawid_beneficiary,true|nullable|string|max:255',

            // Participation Fee
            'participation_fee_paid' => 'boolean|in:1',
            'participation_fee_amount' => 'required_if:participation_fee_paid,true|nullable|numeric|min:0',

            // Session Information
            'scheduled_session' => 'required|in:' . implode(',', config('app.scheduled_session')),

            // Parent's Counterpart
            'parents_counterpart' => 'required|in:Cash,In Kind,None',

            // Attendance Status
            'attendance_status' => 'required|in:' . implode(',', config('app.attendance_status')),
            'school_year' => 'required|string|max:20',
            'dropout_reason' => 'required|in:' . implode(',', config('app.dropout_reason')),
            'dropout_reason_others' => 'required_if:dropout_reason,Others|nullable|string|max:255',

            // Accomplished By
            'accomplished_by' => 'required|string|max:255',
            'date_accomplished' => 'required|date',
            'name_of_eccd_service_provider' => 'required|string|max:255',
            'encoder_id' => 'required|string|max:255',


            // Validate disabilities array
            'disabilities' => 'array|max:5',
            'disabilities.*.disability' => 'nullable|string',
            'disabilities.*.cause' => 'nullable|string',

            // Validate ECCD experiences array
            'eccdExperiences' => 'array|max:8',
            'eccdExperiences.*.service_type' => 'nullable|string',
            'eccdExperiences.*.service' => 'nullable|string',
            'eccdExperiences.*.from_date' => 'nullable|date',
            'eccdExperiences.*.to_date' => 'nullable|date',
        ];

        return $arrayValidation;
    }
}
