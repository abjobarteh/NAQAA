<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\systemadmin\CreateTrainingProviderStaffRankRequest;
use App\Http\Requests\systemadmin\UpdateTrainingProviderStaffRankRequest;
use App\Models\TrainingProviderStaffsRank;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class TrainingProviderStaffsRankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('access_academic_admin_staff_ranks'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ranks = TrainingProviderStaffsRank::all();

        return view('systemadmin.adminStaffRanks.index', compact('ranks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('create_academic_admin_staff_rank'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('systemadmin.adminStaffRanks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTrainingProviderStaffRankRequest $request)
    {
        TrainingProviderStaffsRank::create($request->validated());

        return redirect(route('admin.training-provider-staff-ranks.index'))->withSuccess('Rank successfully added');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('create_academic_admin_staff_rank'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rank = TrainingProviderStaffsRank::where('id',$id)->get();

        return view('systemadmin.adminStaffRanks.edit', compact('rank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrainingProviderStaffRankRequest $request, TrainingProviderStaffsRank $training_provider_staff_rank)
    {
        $training_provider_staff_rank->update($request->validated());

        return redirect(route('admin.training-provider-staff-ranks.index'))->withSuccess('Rank successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
