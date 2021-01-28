<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;
use App\Models\Pdf;


class PdfController extends Controller
{
    public function index() 
    {
        $word = "Proposal";
        $file = new Pdf;
        $file->name = "test.pdf";
        $file->size = 50;
        $file->file = "Proposalfdnfif";

        if($this->isPdf($file) ) 
        {
            echo "is PDF"."<br>";
            if($this->searchPdf($file, $word))
            {
                echo "has the word ".$word."<br>";
                $pdfDB = Pdf::where("name", '=', $file->name)
                            ->where("size", '=', $file->size)
                            ->first();
                if($pdfDB)
                {
                    echo "file exists...updating <br>";
                    $pdfDB->file = $file->file;
                    $pdfDB->save(); 
                } else 
                {
                    echo "file doesn't exist...creating <br>";
                    $file->save();
                }
            }
        } else 
        return response()->json([
            'error' => "This is not a PDF file"
        ], 422 );
        
    } 

    protected function isPdf($file) {
        return Str::endsWith($file->name, '.pdf');
    }

    protected function searchPdf($file,$word) {
        return str_contains($file->file,$word);
        //return false;
    }
    
}
