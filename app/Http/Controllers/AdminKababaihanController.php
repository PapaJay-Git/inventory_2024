<?php

namespace App\Http\Controllers;

use App\Helpers\ImageGeneratorHelper;
use App\Models\Kababaihan;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AdminKababaihanController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->query('id', 0);

        $user = User::where('role', 'barangay_account')
        ->where('id', $id)
        ->firstOrFail();

        $barangay = $user->name;
        $kababaihans = Kababaihan::where('kababaihans.user_id', $id)->get();

        return view('users.barangay.forms.kababaihans.index', compact('kababaihans', 'barangay'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kababaihan = Kababaihan::where('kababaihans.id', $id)
        ->firstOrFail();

        $images_path = [];
        foreach (json_decode($kababaihan->image_paths, true) as $file_name){
            $path = config('app.kababaihan_images_path') . $file_name;

            $images_path[] = ImageGeneratorHelper::getImageBased64($path);
        }

        $pdf = Pdf::loadView('pdf.kababaihan', compact('images_path', 'kababaihan'));

        return $pdf->stream('document.pdf');

        return $pdf->download('document.pdf');
    }

}
