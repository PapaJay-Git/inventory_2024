<?php

namespace App\Http\Controllers;

use App\Models\Dafac;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DafacController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dafacs = Dafac::with(['familyMembers'])
            ->where('dafacs.user_id', Auth::user()->id)
            ->get();

        return view('users.forms.dafacs.index', compact('dafacs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.forms.dafacs.create');
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

        if ($data['is_indigenous_people'] == '0') {
            $data['type_of_ethnicity'] = null;
        }
        // Create a new DAFAC and save it to the database
        $dafac = Dafac::create($data);
        $familyMembers = $request->input('family_members') ?? [];

        foreach ($familyMembers as $familyMember) {
            $dafac->familyMembers()->create($familyMember);
        }

        return redirect()->route('dafacs.create')->with('status', 'DAFAC record created successfully');
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

        $dafac = Dafac::with(['familyMembers'])
            ->where('dafacs.user_id', Auth::user()->id)
            ->where('dafacs.id', $id)
            ->firstOrFail();

        return view('users.forms.dafacs.edit', compact('dafac'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dafac = Dafac::with(['familyMembers'])
            ->where('dafacs.user_id', Auth::user()->id)
            ->where('dafacs.id', $id)
            ->firstOrFail();

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        $validator = $this->validateCustomData($request);
        $validator->validate();

        if ($data['is_indigenous_people'] == '0') {
            $data['type_of_ethnicity'] = null;
        }
        // Create a new DAFAC and save it to the database
        $dafac->update($data);
        $familyMembers = $request->input('family_members') ?? [];

        $dafac->familyMembers()->delete();
        foreach ($familyMembers as $familyMember) {
            $dafac->familyMembers()->create($familyMember);
        }

        return redirect()->route('dafacs.edit', $id)->with('status', 'DAFAC record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dafac = Dafac::where('dafacs.user_id', Auth::user()->id)
            ->where('dafacs.id', $id)
            ->firstOrFail();
        $dafac->familyMembers()->delete();
        $dafac->delete();

        return redirect()->route('dafacs.index')->with('status', 'DAFAC record deleted successfully!');
    }

    private function validateCustomData($request)
    {
        $validator = Validator::make($request->all(), $this->arrayValidation());

        // Custom validation logic
        $validator->after(function ($validator) use ($request) {
            // Check ECCD experiences array
            if ($request->has('family_members')) {
                foreach ($request->input('family_members') as $family_member) {
                    if (
                        empty($family_member['family_member_name']) ||
                        empty($family_member['relationship_to_head']) ||
                        empty($family_member['age']) ||
                        empty($family_member['gender']) ||
                        empty($family_member['education']) ||
                        empty($family_member['occupational_skills']) ||
                        empty($family_member['remarks'])
                    ) {
                        $validator->errors()->add(
                            'family_members',
                            'All Family member fields must be filled.'
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
            // Dafac Table
            'region' => ['required', 'string', 'max:255'],
            'province_district' => ['required', 'string', 'max:255'],
            'city_municipality_barangay' => ['required', 'string', 'max:255'],
            'barangay_evacuation_center_site' => ['required', 'string', 'max:255'],
            'serial_no' => ['required', 'string', 'max:255'],
            'head_of_family_surname' => ['required', 'string', 'max:255'],
            'head_of_family_first_name' => ['required', 'string', 'max:255'],
            'head_of_family_middle_name' => ['nullable', 'string', 'max:255'],
            'sex' => ['required', 'in:' . implode(',', config('app.sex'))],
            'age' => ['required', 'integer', 'min:0'],
            'date_of_birth' => ['required', 'date'],
            'occupation' => ['required', 'in:' . implode(',', config('app.occupation'))],
            'monthly_net_income' => ['required', 'numeric', 'min:0'],
            'is_4ps_beneficiary' => ['boolean', 'required'],
            'is_indigenous_people' => ['boolean', 'required'],
            'type_of_ethnicity' => ['required_if:indigenous_people,1', 'nullable',  'string', 'max:255'],
            'housing_type' => ['required', 'in:' . implode(',', config('app.housing_type'))],
            'code' => ['required', 'in:' . implode(',', config('app.code'))],
            'housing_condition' => ['required', 'in:' . implode(',', config('app.housing_condition'))],
            'health_condition' => ['required', 'in:' . implode(',', config('app.health_condition'))],
            'name_of_brg_captain' => ['nullable', 'string', 'max:255'],
            'date_registered' => ['required', 'date'],
            'name_of_lswdo' => ['nullable', 'string', 'max:255'],

            // Family Members Table
            'family_members' => ['array', 'max:6'],
            'family_members.*.family_member_name' => ['nullable', 'string', 'max:255'],
            'family_members.*.relationship_to_head' => ['nullable', 'string', 'max:255'],
            'family_members.*.age' => ['nullable', 'integer', 'min:0'],
            'family_members.*.gender' => ['nullable', 'in:' . implode(',', config('app.sex'))],
            'family_members.*.education' => ['nullable', 'string', 'max:255'],
            'family_members.*.occupational_skills' => ['nullable', 'string', 'max:255'],
            'family_members.*.remarks' => ['nullable', 'string'],
        ];

        return $arrayValidation;
    }
}
