<?php

namespace App\Http\Controllers;

use App\Helpers\ImageGeneratorHelper;
use App\Models\Daycare;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AdminDaycareController extends Controller
{

    public function index(Request $request)
    {
        $id = $request->query('id', 0);

        $user = User::where('role', 'barangay_account')
        ->where('id', $id)
        ->firstOrFail();

        $barangay = $user->name;

        $daycares = Daycare::with(['disabilities', 'eccdExperiences'])
            ->where('daycares.user_id', $id)
            ->get();

        return view('users.barangay.forms.daycares.index', compact('daycares', 'barangay'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $daycare = Daycare::with(['disabilities', 'eccdExperiences'])
        ->where('daycares.id', $id)
        ->firstOrFail();

        $base64Logo = ImageGeneratorHelper::getImageBased64('logos/dswd.png');

        $pdf = Pdf::loadView('pdf.daycare', compact('base64Logo', 'daycare'));

        return $pdf->stream('document.pdf');

        return $pdf->download('document.pdf');
    }
}
