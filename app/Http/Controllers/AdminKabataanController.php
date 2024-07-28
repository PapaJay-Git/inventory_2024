<?php

namespace App\Http\Controllers;

use App\Models\Kabataan;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AdminKabataanController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->query('id', 0);

        $user = User::where('role', 'barangay_account')
        ->where('id', $id)
        ->firstOrFail();

        $barangay = $user->name;

        $kabataans = Kabataan::where('kabataans.user_id', $id)->get();

        return view('users.barangay.forms.kabataans.index', compact('kabataans', 'barangay'));
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kabataan = Kabataan::where('kabataans.id', $id)
            ->firstOrFail();

        $pdf = Pdf::loadView('pdf.kabataan', compact('kabataan'));

        return $pdf->stream('document.pdf');

        return $pdf->download('document.pdf');
    }
}
