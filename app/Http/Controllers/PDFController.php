<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function generatePDF(){       //min 1.30 video
        $data = [
            #dados da bd para enviar
        ];

        $pdf = PDF::loadView('pdf.myPDF', $data);

        return $pdf->download('myPDF.pdf');
    }

}
