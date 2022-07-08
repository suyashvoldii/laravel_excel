<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class UsersImportController extends Controller
{
    public function show(){
        //return Excel::download(new UsersExport, 'users.xlsx');
         return view('users.import');
    }

    public function store(Request $request){
       // $file = $request->file('file');

        $file = $request->file('file')->store('import');

        Excel::import(new UsersImport, $file);

        return back()->with('status','Excel imported');
      
    }
}
