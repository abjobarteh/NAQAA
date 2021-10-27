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

        $research = ResearchSurvey::query();

        if ($this->is_research_topic) {
            $research->where('research_topic', 'like', '%' . $this->research_topic . '%');

            return Excel::download(
                new ResearchSurveyReportExport($research->get()),
                'research_survey_reports_by_topic.xlsx'
            );
        } else if ($this->is_research_purpose) {
            $research->where('purpose', 'like', '%' . $this->research_purpose . '%');

            return Excel::download(
                new ResearchSurveyReportExport($research->get()),
                'research_survey_reports_by_purpose.xlsx'
            );
        } else if ($this->is_main_findings) {
            $research->where('key_findings', 'like', '%' . $this->main_findings . '%');

            return Excel::download(
                new ResearchSurveyReportExport($research->get()),
                'research_survey_reports_by_findings.xlsx'
            );
        } else if ($this->is_authors) {
            $research->where('name_of_authors', 'like', '%' . $this->authors . '%');

            return Excel::download(
                new ResearchSurveyReportExport($research->get()),
                'research_survey_reports_by_authors.xlsx'
            );
        } else if ($this->is_publication_date) {
            $research->whereDate('publication_date', $this->publication_date);

            return Excel::download(
                new ResearchSurveyReportExport($research->get()),
                'research_survey_reports_by_publicatin_date.xlsx'
            );
        } else if ($this->is_funding_body) {
            $research->where('funded_by', 'like', '%' . $this->funding_body . '%');

            return Excel::download(
                new ResearchSurveyReportExport($research->get()),
                'research_survey_reports_by_funding_body.xlsx'
            );
        }
    }
}
