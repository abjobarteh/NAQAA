<?php

namespace App\Http\Controllers\StandardsCurriculum;

use App\Http\Controllers\Controller;
use App\Http\Requests\StandardsCurriculum\StoreQualificationsRequest;
use App\Http\Requests\StandardsCurriculum\UpdateQualificationsRequest;
use App\Models\EducationField;
use App\Models\EducationSubField;
use App\Models\Qualification;
use App\Models\QualificationLevel;
use App\Models\QualificationReview;
use App\Models\ModeOfDelivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class QualificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('access_qualifications'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $qualifications = Qualification::with(['level', 'fieldOfEducation', 'lastreview'])->get();

        return view('standardscurriculum.qualifications.index', compact('qualifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('create_qualifications'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fields = EducationField::all()->pluck('name', 'id');
        $subfields = EducationSubField::all()->pluck('name', 'id');
        $levels = QualificationLevel::all()->pluck('name', 'id');
        $deliveries = ModeOfDelivery::all()->pluck('name', 'id');

        return view('standardscurriculum.qualifications.create', compact('fields', 'subfields', 'levels', 'deliveries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQualificationsRequest $request)
    {
        Qualification::create($request->validated());

        return redirect()->route('standardscurriculum.qualifications.index')->withSuccess('Qualification successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Qualification $qualification)
    {
        abort_if(Gate::denies('show_qualifications'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $qualification->load(['fieldOfEducation', 'subfieldOfEducation', 'level', 'unitStandards']);

        return view('standardscurriculum.qualifications.show', compact('qualification'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Qualification $qualification)
    {
        abort_if(Gate::denies('edit_qualifications'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fields = EducationField::all()->pluck('name', 'id');
        $subfields = EducationSubField::all()->pluck('name', 'id');
        $levels = QualificationLevel::all()->pluck('name', 'id');
        $deliveries = ModeOfDelivery::all()->pluck('name', 'id');

        return view('standardscurriculum.qualifications.edit', compact('qualification', 'fields', 'subfields', 'levels', 'deliveries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQualificationsRequest $request, Qualification $qualification)
    {
        $qualification->update($request->validated());

        return back()->withSuccess('Qualification successfully updated');
    }


    public function updateReviewDate(Request $request)
    {
        $review = new QualificationReview(['review_date' => $request->review_date]);

        $qualification = Qualification::find($request->id);

        $qualification->reviews()->save($review);

        return json_encode(['status' => '200', 'message' => 'Qualification review Date Successfully updated']);
    }
}
