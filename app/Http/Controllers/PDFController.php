<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects;
use PDF;

class PDFController extends Controller
{
    //
    public function pdf()
    {
        $Projects = Projects::all();
        $pdf = PDF::loadView('pdf',['Projects'=>$Projects]);
        return @$pdf->stream();
    }
}
