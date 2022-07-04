<?php

namespace App\Http\Controllers;

use App\Imports\subject_rf_Import;

use App\Imports\List_Import;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExcelController extends Controller
{
    public function import_subject_rf() //субъект и федеральный округ
    {
        $import = new List_Import();
        $import->onlySheets('Субъект РФ');
        Excel::import($import, 'file.xlsx');
        return redirect('/')->with('success', 'All good!');
    }

    public function import_subsoil_user() 
    {
        $import = new List_Import();
        $import->onlySheets('Недропользователь (компания)');
        Excel::import($import, 'file.xlsx');
        return redirect('/')->with('success', 'All good!');
    }
    public function import_licence() 
    {
        $import = new List_Import();
        $import->onlySheets('Лицензия');
        Excel::import($import, 'file.xlsx');
        return redirect('/')->with('success', 'All good!');
    }

    public function import_field() 
    {
        $import = new List_Import();
        $import->onlySheets('Месторождение');
        Excel::import($import, 'file.xlsx');
        return redirect('/')->with('success', 'All good!');
    }
}
