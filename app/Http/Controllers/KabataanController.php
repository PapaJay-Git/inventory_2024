<?php

namespace App\Http\Controllers;

use App\Models\Kabataan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KabataanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kabataans = Kabataan::where('kabataans.user_id', Auth::user()->id)
            ->get();

        return view('users.forms.kabataans.index', compact('kabataans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.forms.kabataans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $data['user_id'] = Auth::user()->id;

        $request->validate($this->arrayValidation());

        // Create a new record in the database
        Kabataan::create($data);

        // Redirect back with a success message
        return redirect()->route('kabataans.create')
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
        $kabataan = Kabataan::where('kabataans.user_id', Auth::user()->id)
            ->where('kabataans.id', $id)
            ->firstOrFail();

        return view('users.forms.kabataans.edit', compact('kabataan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kabataan = Kabataan::where('kabataans.user_id', Auth::user()->id)
            ->where('kabataans.id', $id)
            ->firstOrFail();

        $data = $request->all();

        $request->validate($this->arrayValidation());

        // Create a new record in the database
        $kabataan->update($data);

        // Redirect back with a success message
        return redirect()->route('kabataans.edit', $id)
            ->with('status', 'Record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kabataan = Kabataan::where('kabataans.user_id', Auth::user()->id)
            ->where('kabataans.id', $id)
            ->firstOrFail();

        // Create a new record in the database
        $kabataan->delete();

        // Redirect back with a success message
        return redirect()->route('kabataans.index')
            ->with('status', 'Record deleted successfully!');
    }

    private function arrayValidation()
    {

        $arrayValidation = [
            // Basic Fields
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'nickname' => 'nullable|string|max:255',
            'date_of_birth' => 'required|date',
            'age' => 'required|integer|min:0',
            'position' => 'nullable|string|max:255',
            'barangay' => 'required|string|max:255',
            'home_address' => 'required|string',
            'gender' => 'required|in:Male,Female',
            'religion' => 'required|string|max:255',
            'mobile_phone' => 'required|string|max:20', // Adjust max length based on your phone number format
            'city_municipality' => 'required|string|max:255',

            // Educational Background
            'post_graduate_course' => 'nullable|string|max:255|required_with:post_graduate_year',
            'post_graduate_year' => 'nullable|integer|digits:4|required_with:post_graduate_course',

            'college_course' => 'nullable|string|max:255|required_with:college_year',
            'college_year' => 'nullable|integer|digits:4|required_with:college_course',

            'high_school' => 'nullable|string|max:255|required_with:high_school_year',
            'high_school_year' => 'nullable|integer|digits:4|required_with:high_school',

            'elementary' => 'nullable|string|max:255|required_with:elementary_year',
            'elementary_year' => 'nullable|integer|digits:4|required_with:elementary',

            'other_education' => 'nullable|string|max:255|required_with:other_education_year',
            'other_education_year' => 'nullable|integer|digits:4|required_with:other_education',


            // Emergency Contact Information
            'emergency_contact_name' => 'required|string|max:255',
            'emergency_contact_address' => 'required|string',
            'emergency_contact_relationship' => 'required|string|max:255',
            'emergency_contact_phone' => 'required|string|max:20', // Adjust max length based on your phone number format

        ];

        return $arrayValidation;
    }
}
