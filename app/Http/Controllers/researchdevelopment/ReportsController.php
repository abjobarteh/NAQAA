<?php

namespace App\Http\Controllers\researchdevelopment;

use App\Exports\ResearchDevelopment\ResearchSurveyReportExport;
use App\Http\Controllers\Controller;
use App\Models\ResearchDevelopment\ResearchSurvey;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportsController extends Controller
{
    public function learnersReport()
    {
        return view('researchdevelopment.reports.learners');
    }
    public function researchSurveyReport()
    {
        return view('researchdevelopment.reports.research');
    }
    public function labourMarketReport()
    {
        return view('researchdevelopment.reports.labourmarket');
    }

    public function generateResearchReport(Request $request)
    {
        $research = ResearchSurvey::query();

        if ($request->filled('research_topic')) {
            $research->where('research_topic', $request->research_topic);
        }

        // $research->get();
        // dd($research->get());

        return Excel::download(new ResearchSurveyReportExport($research->get()), 'researchsurveyreport.xlsx');
    }
}
