<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\PromovidosImport;
use Maatwebsite\Excel\Facades\Excel;


class ExcelController extends Controller
{
    public function excel_read(){
        return view('excel.import_excel');
    }

    public function excel_import(Request $request){
        //$request->validate([
        //    'archivo_excel' => 'required|file|mimes:xlsx,xls|max:2048', // Validación del archivo Excel
        //]);

        $file = $request->file('file');

        Excel::import(new PromovidosImport, $file);


        return redirect()->route('excel.read');
    }
}
