<?php

namespace App\Http\Controllers;


use App\Models\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CertificateController extends Controller
{
    public function download($id)
    {
        $request = Request::findOrFail($id); // Replace with your actual model

        if ($request->request_type == 'Barangay Clearance') {

            $pdf = Pdf::loadView('pdfs.barangay-clearance', compact('request'))
                ->setPaper('a4', 'portrait');

            return $pdf->download('barangay_clearance_' . $request->id . '.pdf');
        } else if ($request->request_type == 'Certificate of Indigency') {
            $pdf = Pdf::loadView('pdfs.certificate-of-indigency', compact('request'))
                ->setPaper('a4', 'portrait');

            return $pdf->download('certificate_of_indigency_' . $request->id . '.pdf');
        }

    }
}
