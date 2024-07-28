<?php

namespace App\Http\Controllers;

use App\Helpers\ImageGeneratorHelper;
use App\Models\Dafac;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AdminDafacController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->query('id', 0);

        $user = User::where('role', 'barangay_account')
        ->where('id', $id)
        ->firstOrFail();

        $barangay = $user->name;
        $dafacs = Dafac::with(['familyMembers'])
            ->where('dafacs.user_id', $id)
            ->get();

        return view('users.barangay.forms.dafacs.index', compact('dafacs', 'barangay'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dafac = Dafac::with(['familyMembers'])
        ->where('dafacs.id', $id)
        ->firstOrFail();

        $base64Logo = ImageGeneratorHelper::getImageBased64('logos/dswd.png');

        $pdf = Pdf::loadView('pdf.dafac', compact('base64Logo', 'dafac'));

        return $pdf->stream('document.pdf');

        return $pdf->download('document.pdf');
    }

}
