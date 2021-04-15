<?php

namespace App\Http\Controllers\researchdevelopment\DataCollections;

use App\Http\Controllers\Controller;
use App\Imports\ResearchDevelopment\DatacollectionImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;
use Symfony\Component\HttpFoundation\Response;

class DataCollectionsImportsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('access_research_development_data_import'), Response::HTTP_FORBIDDEN,'403 Forbidden');

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
