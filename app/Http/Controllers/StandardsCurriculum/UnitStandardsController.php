<?php

namespace App\Http\Controllers\StandardsCurriculum;

use App\Http\Controllers\Controller;
use App\Http\Requests\StandardsCurriculum\StoreUnitStandardsRequest;
use App\Http\Requests\StandardsCurriculum\UpdateUnitStandardsRequest;
use App\Models\EducationField;
use App\Models\EducationSubField;
use App\Models\Qualification;
use App\Models\QualificationLevel;
use App\Models\StandardsCurriculum\UnitStandard;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UnitStandardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('access_unit_standards'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $unitstandards = UnitStandard::with(
            ['fieldOfEducation', 'subFieldOfEducation', 'levelOfQualification', 'qualification']
        )
            ->get();

        return view('standardscurriculum.unitstandards.index', compact('unitstandards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('create_unit_standards'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fields = EducationField::all()->pluck('name', 'id');
        $subfields = EducationSubField::all()->pluck('name', 'id');
        $levels = QualificationLevel::all()->pluck('name', 'id');
        $qualifications = Qualification::all()->pluck('name', 'id');

        return view('standardscurriculum.unitstandards.create', compact('fields', 'subfields', 'levels', 'qualifications'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUnitStandardsRequest $request)
    {
        UnitStandard::create($request->all());

        return redirect()->route('standardscurriculum.unit-standards.index')
            ->withSuccess('Unit Standard successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Gate::denies('show_unit_standards'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $unitstandard = UnitStandard::with(['fieldOfEducation', 'subFieldOfEducation', 'levelOfQualification'])
            ->where('id', $id)->get();

        return view('standardscurriculum.unitstandards.show', compact('unitstandard'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('edit_unit_standards'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $unitstandard = UnitStandard::where('id', $id)->get();
        $fields = EducationField::all()->pluck('name', 'id');
        $subfields = EducationSubField::all()->pluck('name', 'id');
        $levels = QualificationLevel::all()->pluck('name', 'id');
        $qualifications = Qualification::all()->pluck('name', 'id');

        return view('standardscurriculum.unitstandards.edit', compact('unitstandard', 'fields', 'subfields', 'levels', 'qualifications'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUnitStandardsRequest $request, UnitStandard $unit_standard)
    {
        $unit_standard->update($request->validated());

        return back()->withSuccess('Unit Standard successfully update');
    }
}
