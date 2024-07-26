<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{

    private function getImageBased64($path)
    {
        $path = public_path($path);
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64Logo = 'data:image/' . $type . ';base64,' . base64_encode($data);

        return $base64Logo;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pwd = 'logos/DOH.png';
        $dswd = 'logos/dswd.png';

        $base64Logo = $this->getImageBased64($dswd);
        $pdf = Pdf::loadView('pdf.template', compact('base64Logo'));

        return $pdf->stream('document.pdf');

        return $pdf->download('report.pdf'); // Download the PDF
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
