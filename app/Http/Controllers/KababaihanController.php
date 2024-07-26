<?php

namespace App\Http\Controllers;

use App\Models\Kababaihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class KababaihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kababaihans = Kababaihan::where('kababaihans.user_id', Auth::user()->id)
            ->get();

        return view('users.forms.kababaihans.index', compact('kababaihans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.forms.kababaihans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $data['user_id'] = Auth::user()->id;

        $request->validate($this->arrayValidation(true));

        $fileNames = [];

        // Handle each file upload
        foreach ($request->file('image_paths') as $file) {
            $uuid = Str::uuid();
            $fileName = "Barangay_ID_{$data['user_id']}_kababaihans_{$uuid}." . $file->extension();
            $file->move(public_path(config('app.kababaihan_images_path')), $fileName);
            $fileNames[] = $fileName;
        }

        $data['image_paths'] = json_encode($fileNames);

        // Create a new record in the database
        Kababaihan::create($data);

        // Redirect back with a success message
        return redirect()->route('kababaihans.create')
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
        $kababaihan = Kababaihan::where('kababaihans.user_id', Auth::user()->id)
            ->where('kababaihans.id', $id)
            ->firstOrFail();

        return view('users.forms.kababaihans.edit', compact('kababaihan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kababaihan = Kababaihan::where('kababaihans.user_id', Auth::user()->id)
            ->where('kababaihans.id', $id)
            ->firstOrFail();

        $data = $request->all();

        $request->validate($this->arrayValidation(false));

        $fileNames = $kababaihan->image_paths;

        if (isset($data['image_paths'])) {

            // Handle each file upload
            $fileNames = [];

            foreach (json_decode($kababaihan->image_paths, true) as $path) {
                $imagePath = public_path(config('app.kababaihan_images_path') . $path);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            foreach ($request->file('image_paths') as $file) {
                $uuid = Str::uuid();
                $fileName = "Barangay_ID_{$data['user_id']}_kababaihans_{$uuid}." . $file->extension();
                $file->move(public_path(config('app.kababaihan_images_path')), $fileName);
                $fileNames[] = $fileName;
            }

            $data['image_paths'] = json_encode($fileNames);
        }

        // Update a new record in the database
        $kababaihan->update($data);

        // Redirect back with a success message
        return redirect()->route('kababaihans.edit', $id)
            ->with('status', 'Record update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kababaihan = Kababaihan::where('kababaihans.user_id', Auth::user()->id)
            ->where('kababaihans.id', $id)
            ->firstOrFail();


        foreach (json_decode($kababaihan->image_paths, true) as $path) {
            $imagePath = public_path(config('app.kababaihan_images_path') . $path);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Update a new record in the database
        $kababaihan->delete();

        // Redirect back with a success message
        return redirect()->route('kababaihans.index')
            ->with('status', 'Record deleted successfully!');
    }

    private function arrayValidation($isCreate)
    {
        $requiredOrNullable = $isCreate ?  'required' : 'nullable';

        $arrayValidation = [
            // Application Details
            'date' => 'required|date',
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'city_address' => 'required|string|max:255',
            'provincial_address' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'birth_place' => 'required|string|max:255',
            'civil_status' => 'required|in:' . implode(',', config('app.civil_status')),
            'citizenship' => 'required|string|max:255',
            'religion' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:15',
            'occupation' => 'required|in:' . implode(',', config('app.occupation')),
            'name_of_company' => 'nullable|string|max:255|required_with:company_address',
            'company_address' => 'nullable|string|max:255|required_with:name_of_company',
            'educational_attainment' => 'required|in:' . implode(',', config('app.educational_attainment')),

            'spouse_name' => 'nullable|string|max:255',
            'spouse_occupation' => 'nullable|in:' . implode(',', config('app.occupation')),
            'number_of_children' => 'required|integer|min:0',
            'other_organizations_membership' => 'nullable|string|max:255',

            // Contact Information
            'emergency_contact_name' => 'required|string|max:255',
            'emergency_contact_number' => 'required|string|max:15',

            // Image or ID Path
            'image_paths' => "$requiredOrNullable|array|max:3",
            'image_paths.*' => "$requiredOrNullable|image|mimes:jpeg,png,jpg,gif,bmp,tiff,webp,svg|max:2048",
        ];

        return $arrayValidation;
    }
}
