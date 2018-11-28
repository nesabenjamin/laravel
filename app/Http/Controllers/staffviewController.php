<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use ZipArchive;

class staffviewController extends Controller
{
    function index(){
        $forma = DB::select('select * from forma');

        return view('staffview ',[
            'forma'=> $forma
        ]);
    }
    function ajax(Request $request){
        $id = $request->input('ID');
        $forma = DB::select("select * from forma WHERE aid = $id");
        $companytype = DB::select("select * from companytype WHERE appID = $id");
        $html = \View::make("application", [
            'forma'=> $forma[0],
            'companies'=> $companytype
        ])->render();
        return ['application' => $html];

    }
    function approval(Request $request){
        $id = $request->input('ID');
        $forma = DB::select("select * from forma WHERE aid = $id");

        $html = \View::make("approval", [
            'forma'=> $forma[0],
        ])->render();
        return ['Approvement' => $html];
    }

    public function pdf(){

        $pdf = \App::make('dompdf.wrapper');
        $forma = DB::select("select * from forma WHERE aid = 1004");
        $companytype = DB::select("select * from companytype WHERE appID = 1004");

        $html = \View::make("application", [
            'forma'=> $forma[0],
            'companies'=> $companytype
        ])->render();
        $pdf->loadHTML($html);//
        $pdf->stream();//
        return $pdf->download('LaravelDomPDF.pdf');

         //$pdf->loadHTML($html)->save('Licenses/Application100.pdf');//for License
    }

    public function zip()
    {

            // Define Dir Folder
            $public_dir=public_path();
            // Zip File Name
            $zipFileName = 'AllDocuments.zip';
            // Create ZipArchive Obj
            $zip = new ZipArchive;
            if ($zip->open('Applications/' . $zipFileName, ZipArchive::CREATE) === TRUE) {
                // Add File in ZipArchive
                $zip->addFile('Applications/Application100.pdf','Application100.pdf');
                // Close ZipArchive
                $zip->close();
            }
            // Set Header
            $headers = array(
                'Content-Type' => 'application/octet-stream',
            );
            $filetopath='Applications/'.$zipFileName;
            // Create Download Response
            if(file_exists($filetopath)){
                return response()->download($filetopath,$zipFileName,$headers);
            }

        //return view('createZip');
    }

}
