<?php

namespace App\Http\Controllers;

use App\Models\SoloParent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SoloParentController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $soloParents = SoloParent::with(['householdCompositions'])
            ->where('solo_parents.user_id', Auth::user()->id)
            ->get();

        return view('users.forms.soloParents.index', compact('soloParents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.forms.soloParents.create');
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

        if ($data['pantawid_beneficiary'] == '0') {
            $data['household_id'] = null;
        }

        if ($data['indigenous_person'] == '0') {
            $data['affiliation'] = null;
        }
        // Create a new solo parent and save it to the database
        $soloParent = SoloParent::create($data);
        $householdCompositions = $request->input('householdCompositions') ?? [];

        foreach ($householdCompositions as $householdComposition) {
            $soloParent->householdCompositions()->create($householdComposition);
        }

        return redirect()->route('solo_parents.create')->with('status', 'Solo - Parent record created successfully');
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
        $soloParent = SoloParent::with(['householdCompositions'])
            ->where('solo_parents.user_id', Auth::user()->id)
            ->where('solo_parents.id', $id)
            ->firstOrFail();

        return view('users.forms.soloParents.edit', compact('soloParent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $soloParent = SoloParent::with(['householdCompositions'])
            ->where('solo_parents.user_id', Auth::user()->id)
            ->where('solo_parents.id', $id)
            ->firstOrFail();

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;


        $validator = $this->validateCustomData($request);
        $validator->validate();

        if ($data['pantawid_beneficiary'] == '0') {
            $data['household_id'] = null;
        }

        if ($data['indigenous_person'] == '0') {
            $data['affiliation'] = null;
        }
        // Create a new solo parent and save it to the database
        $soloParent->update($data);
        $householdCompositions = $request->input('householdCompositions') ?? [];

        $soloParent->householdCompositions()->delete();
        foreach ($householdCompositions as $householdComposition) {
            $soloParent->householdCompositions()->create($householdComposition);
        }

        return redirect()->route('solo_parents.edit', $id)->with('status', 'Solo - Parent record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $soloParent = SoloParent::where('solo_parents.user_id', Auth::user()->id)
            ->where('solo_parents.id', $id)
            ->firstOrFail();
        $soloParent->householdCompositions()->delete();
        $soloParent->delete();

        return redirect()->route('solo_parents.index')->with('status', 'Solo - Parent record deleted successfully!');
    }


    private function validateCustomData($request)
    {
        $validator = Validator::make($request->all(), $this->arrayValidation());

        // Custom validation logic
        $validator->after(function ($validator) use ($request) {

            // Check householdCompositions array
            if ($request->has('householdCompositions')) {
                foreach ($request->input('householdCompositions') as $householdComposition) {
                    if (
                        empty($householdComposition['full_name']) ||
                        empty($householdComposition['relationship']) ||
                        empty($householdComposition['birthdate']) ||
                        empty($householdComposition['age']) ||
                        empty($householdComposition['sex']) ||
                        empty($householdComposition['civil_status']) ||
                        empty($householdComposition['educational_attainment']) ||
                        empty($householdComposition['occupation']) ||
                        empty($householdComposition['monthly_income'])
                    ) {
                        $validator->errors()->add(
                            'householdCompositions',
                            'All Household Composition fields must be filled.'
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
            // Basic Information
            'case_number' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'suffix' => ['nullable', 'string', 'max:255'],
            'philsys_card_number' => ['nullable', 'string', 'max:255'],
            'sex' => ['required', 'in:Male,Female'],
            'date_of_birth' => ['required', 'date'],
            'age' => ['required', 'integer', 'min:0'],
            'place_of_birth' => ['required', 'string', 'max:255'],

            // Residence Address
            'region' => ['required', 'string', 'max:255'],
            'province' => ['required', 'string', 'max:255'],
            'city_municipality' => ['required', 'string', 'max:255'],
            'barangay' => ['required', 'string', 'max:255'],
            'street_address' => ['required', 'string', 'max:255'],

            // Additional Information
            'educational_attainment' => ['required', 'in:' . implode(',', config('app.educational_attainment'))],
            'civil_status' => ['required', 'in:' . implode(',', config('app.civil_status'))],
            'occupation' => ['required',  'in:' . implode(',', config('app.occupation'))],
            'religion' => ['nullable', 'string', 'max:255'],
            'company_agency' => ['nullable', 'string', 'max:255'],
            'status_of_employment' => ['required', 'in:' . implode(',', config('app.status_of_employment'))],
            'monthly_income' => ['required', 'numeric', 'min:0'],
            'contact_numbers' => ['required', 'string', 'max:255'],
            'email_address' => ['nullable', 'email', 'max:255'],
            'pantawid_beneficiary' => ['boolean', 'required'],
            'household_id' => ['required_if:pantawid_beneficiary,1', 'nullable', 'string', 'max:255'],
            'indigenous_person' => ['boolean', 'required'],
            'affiliation' => ['required_if:indigenous_person,1', 'nullable',  'string', 'max:255'],
            'lgbtq' => ['boolean', 'required'],
            'pwd' => ['boolean', 'required'],
            'classification_circumstances' => ['nullable', 'string'],
            'needs_problems' => ['nullable', 'string'],

            // Emergency Contact Information
            'emergency_name' => ['nullable', 'string', 'max:255'],
            'emergency_address' => ['nullable', 'string'],
            'emergency_number' => ['nullable', 'string', 'max:255'],
            'emergency_relationship' => ['nullable', 'string', 'max:255'],

            'spo_status' => ['required', 'in:' . implode(',', config('app.spo_status'))],
            'solo_parent_id_card_number' => ['nullable', 'string', 'max:255'],
            'solo_parent_category' => ['nullable', 'string', 'max:255'],
            'date_issuance' => ['nullable', 'date'],
            'beneficiary_code' => ['nullable', 'string', 'max:255'],

            // Household Composition Details
            'householdCompositions' => 'array|max:10',
            'householdCompositions.*.full_name' => ['nullable', 'string', 'max:255'],
            'householdCompositions.*.sex' => ['nullable', 'in:' . implode(',', config('app.sex'))],
            'householdCompositions.*.relationship' => ['nullable', 'string', 'max:255'],
            'householdCompositions.*.birthdate' => ['nullable', 'date'],
            'householdCompositions.*.age' => ['nullable', 'integer', 'min:0'],
            'householdCompositions.*.civil_status' => ['nullable', 'in:' . implode(',', config('app.civil_status'))],
            'householdCompositions.*.educational_attainment' => ['nullable', 'in:' . implode(',', config('app.educational_attainment'))],
            'householdCompositions.*.occupation' => ['nullable', 'in:' . implode(',', config('app.occupation'))],
            'householdCompositions.*.monthly_income' => ['nullable', 'numeric', 'min:0'],
        ];

        return $arrayValidation;
    }
}
