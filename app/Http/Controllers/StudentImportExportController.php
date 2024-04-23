<?php

namespace App\Http\Controllers;

use App\Exports\StudentExport;
use App\Imports\StudentImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class StudentImportExportController extends Controller
{
    public function export()
    {
        return Excel::download(new StudentExport, 'students.xlsx');
    }
    public function import(Request $request)
    {
        $request->validate(['students' => 'required']);
        Excel::import(new StudentImport, $request->file('students'));
        toastr()->success('Student imported successfully !');
        return to_route(Auth::user()->roleName . 'students.index');
    }
}
