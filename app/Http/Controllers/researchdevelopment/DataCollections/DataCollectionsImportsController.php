<?php

namespace App\Http\Controllers\researchdevelopment\DataCollections;

use App\Http\Controllers\Controller;
use App\Imports\ResearchDevelopment\DatacollectionImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;

class DataCollectionsImportsController extends Controller
{
    public function index()
    {
       return view('researchdevelopment.datacollectionimports'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'excelfile' => 'required|mimes:xlsx,xls,csv'
        ]);
        
        
        dd((new HeadingRowImport())->toArray($request->file('excelfile')));

        Excel::import(new DatacollectionImport, $request->file('excelfile'));

        return redirect()->route('researchdevelopment.datacollection.datacollection-imports.index')
                ->withSuccess('Import has started. we will notify when its done');
    }
}
