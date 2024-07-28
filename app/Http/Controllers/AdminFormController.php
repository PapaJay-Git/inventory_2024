<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminFormController extends Controller
{
    //

    public function show(string $id){

        $allowedForms = [
            'daycares',
            'pwds',
            'solo_parents',
            'dafacs',
            'kabataans',
            'kababaihans',
        ];

        if(!in_array($id, $allowedForms)){
            abort(404);
        }

        $forms = User::where('id', '!=', Auth::user()->id)
        ->select([
            'users.*',
            DB::raw("(SELECT COUNT(*) FROM $id WHERE user_id = users.id) AS data_count")
        ])
        ->get();

        return view('users.admin.forms.index', compact('id', 'forms'));

    }
}
