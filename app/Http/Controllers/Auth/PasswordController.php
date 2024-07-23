<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function index()
    {
        return view('auth.password');
    }

    public function update(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()
            ->withErrors(['current_password' => 'Current password does not match'])
            ->withInput();
        }

        User::where('id', Auth::user()->id)
        ->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect('/password')->with('status', 'Password successfully changed');
    }
}
