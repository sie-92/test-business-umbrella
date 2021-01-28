<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;
use App\Models\Pdf;


class PdfController extends Controller
{
    public function index() 
    {
        $file = new Pdf;
        $file->name = "test.pdf";
        $file->size = 50;

        if($this->isPdf($file)) {

        } else 
        return response()->json([
            'error' => "This is not a PDF file"
        ], 422 );
        
    } 

    protected function isPdf($file) {
        return Str::endsWith($file->name, '.pdf');
    }

    
}
