<?php

namespace App\Http\Livewire\ResearchDevelopment\Reports;

use App\Exports\ResearchDevelopment\ResearchSurveyReportExport;
use App\Models\ResearchDevelopment\ResearchSurvey;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class ResearchSurveyReports extends Component
{
    public $research_topic, $research_purpose, $main_findings, $authors, $publication_date, $funding_body, $report_type;
    public $is_research_topic = false, $is_research_purpose = false, $is_main_findings = false, $is_authors = false,
        $is_publication_date = false, $is_funding_body = false;

    public function mount($report_type)
    {
        $this->report_type = $report_type;
        switch ($this->report_type) {
            case "research_topic":
                $this->is_research_topic = true;
            case "research_purpose":
                $this->is_research_purpose = true;
            case "main_findings":
                $this->is_main_findings = true;
            case "authors":
                $this->is_authors = true;
            case "publication_date":
                $this->is_publication_date = true;
            case "funding_body":
                $this->is_funding_body = true;
            case "default":
                return back();
        }
    }

    public function render()
    {
        return view('livewire.research-development.reports.research-survey-reports')
            ->extends('layouts.admin');
    }

    public function getReport()
    {
        $this->validate([
            'research_topic' => 'required|string',
        ]);

        $research = ResearchSurvey::query();

        if (
            !is_null($this->research_topic) &&
            is_null($this->research_purpose) &&
            is_null($this->main_findings) &&
            is_null($this->authors) &&
            is_null($this->publication_date) &&
            is_null($this->funding_body)
        ) {
            $research->where('research_topic', 'like', '%' . $this->research_topic . '%');
        }
        if (
            !is_null($this->research_purpose) &&
            is_null($this->research_topic) &&
            is_null($this->main_findings) &&
            is_null($this->authors) &&
            is_null($this->publication_date) &&
            is_null($this->funding_body)
        ) {
            $research->where('purpose', 'like', '%' . $this->research_topic . '%');
        }


        if ($research->get()->isEmpty()) {
            dd('No data exist');
        }

        return Excel::download(new ResearchSurveyReportExport($research->get()), 'research_survey_reports.xlsx');
    }
}
