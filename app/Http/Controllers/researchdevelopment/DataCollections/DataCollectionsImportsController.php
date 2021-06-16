<?php

namespace App\Http\Controllers\researchdevelopment\DataCollections;

use App\Http\Controllers\Controller;
use App\Imports\ResearchDevelopment\DatacollectionImport;
use App\Imports\ResearchDevelopment\JobVacancyImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;
use Symfony\Component\HttpFoundation\Response;

class DataCollectionsImportsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('access_research_development_data_import'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('researchdevelopment.datacollectionimports');
    }

    public function store(Request $request)
    {
        $request->validate([
            'excelFile' => 'required|mimes:xlsx,xls,csv'
        ]);


        // dd((new HeadingRowImport())->toArray($request->file('excelFile')));
        // dd(request()->file('excelFile'));
        // $file = $request->file('excelFile')->getRealPath();

        $import = Excel::import(new JobVacancyImport, request()->file('excelFile'));



        return redirect()->route('researchdevelopment.datacollection-imports.index')
            ->withSuccess('Data successfully imported');
    }
}
