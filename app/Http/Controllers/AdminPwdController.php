<?php

namespace App\Http\Controllers;

use App\Helpers\ImageGeneratorHelper;
use App\Models\Pwd;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AdminPwdController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->query('id', 0);

        $user = User::where('role', 'barangay_account')
        ->where('id', $id)
        ->firstOrFail();

        $barangay = $user->name;

        $pwds = Pwd::where('pwds.user_id', $id)->get();

        return view('users.barangay.forms.pwds.index', compact('pwds', 'barangay'));
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pwd = Pwd::where('pwds.id', $id)
            ->firstOrFail();

        $pwd_photo = config('app.pwd_images_path')."".$pwd->pwd_photo;
        $base64Logo = ImageGeneratorHelper::getImageBased64('logos/DOH.png');
        $pwd_photo = ImageGeneratorHelper::getImageBased64($pwd_photo);

        $pdf = Pdf::loadView('pdf.pwd', compact('base64Logo', 'pwd', 'pwd_photo'));

        return $pdf->stream('document.pdf');

        return $pdf->download('document.pdf');
    }
}
