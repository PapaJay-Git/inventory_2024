<?php

namespace App\Http\Controllers;

use App\Models\Daycare;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BarangayAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangays = User::where('role', 'barangay_account')->get();

        return view('users.admin.barangay-accounts.index', compact('barangays'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.admin.barangay-accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validate the request
        $request->validate([
            'barangay_name' => ['required', 'string', 'unique:users,name'],
            'username' => ['required', 'string', 'unique:users,username'],
            'psgc_barangay' => ['required', 'string', 'unique:users,psgc_barangay'],
        ]);

        // Create a new garden and save it to the database
        User::create([
            'name' => $request['barangay_name'],
            'username' => $request['username'],
            'psgc_barangay' => $request['psgc_barangay'],
            'role' => 'barangay_account',
            'password' => Hash::make(config('app.default_password'))
        ]);

        return redirect("/barangay-accounts/create")->with('status', 'Barangay account created successfully');
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
        $barangay = User::where('role', 'barangay_account')
        ->where('id', $id)
        ->firstOrFail();

        return view('users.admin.barangay-accounts.edit', compact('barangay'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $barangay = User::where('role', 'barangay_account')
        ->where('id', $id)
        ->firstOrFail();

        $validateArray = [
            'barangay_name' => ['required', 'string', 'unique:users,name,'.$id],
            'username' => ['required', 'string', 'unique:users,username,'.$id],
            'psgc_barangay' => ['required', 'string', 'unique:users,psgc_barangay,'.$id],
        ];
        $updates = [];

        if (!empty($request['new_password']) || !empty($request['new_password_confirmation'])) {
            $validateArray['new_password'] = ['required', 'string', 'min:8', 'confirmed'];

            $updates['password'] = Hash::make($request['new_password']);
        }

        // Validate the request
        $request->validate($validateArray);

        $updates['name'] = $request['barangay_name'];
        $updates['username'] = $request['username'];
        $updates['psgc_barangay'] = $request['psgc_barangay'];

        $barangay->update($updates);

        return redirect("/barangay-accounts/$id/edit")->with('status', 'Barangay account updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $excludedIds = DB::table('daycares')->select('user_id')
        ->union(DB::table('pwds')->select('user_id'))
        ->union(DB::table('solo_parents')->select('user_id'))
        ->union(DB::table('kabataans')->select('user_id'))
        ->union(DB::table('kababaihans')->select('user_id'))
        ->pluck('user_id');

        $barangay = User::where('role', 'barangay_account')
        ->where('id', $id)
        ->whereNotIn('id', $excludedIds)
        ->first();

        if (!$barangay) {
            return redirect("/barangay-accounts")->withErrors(['error' => 'Cannot delete a barangay account that already has Data.']);
        }

        $barangay->delete();

        return redirect("/barangay-accounts")->with('status', 'Barangay account deleted successfully!');
    }
}
