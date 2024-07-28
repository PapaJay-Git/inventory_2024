<?php

namespace App\Http\Controllers;

use App\Models\SoloParent;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AdminSoloParentController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->query('id', 0);

        $user = User::where('role', 'barangay_account')
        ->where('id', $id)
        ->firstOrFail();

        $barangay = $user->name;

        $soloParents = SoloParent::with(['householdCompositions'])
            ->where('solo_parents.user_id', $id)
            ->get();

        return view('users.barangay.forms.soloParents.index', compact('soloParents', 'barangay'));
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $soloParent = SoloParent::with(['householdCompositions'])
        ->where('solo_parents.id', $id)
        ->firstOrFail();

        // $base64Logo = ImageGeneratorHelper::getImageBased64('logos/dswd.png');

        $pdf = Pdf::loadView('pdf.solo_parent', compact('soloParent'));

        return $pdf->stream('document.pdf');

        return $pdf->download('document.pdf');
    }

}
