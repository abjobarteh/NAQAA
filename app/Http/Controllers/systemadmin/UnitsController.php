<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\systemadmin\StoreUnitsRequest;
use App\Http\Requests\systemadmin\UpdateUnitsRequest;
use App\Models\Directorate;
use App\Models\Unit;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('access_unit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $units = Unit::with('directorate')->get();

        $directorates = Directorate::all()->pluck('name','id');

        return view('systemadmin.units.index', compact('units','directorates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUnitsRequest $request)
    {
        if($request->validated())
        {
            foreach($request->name as $key => $value){
                Unit::create([
                    'name' => $value,
                    'directorate_id' => $request->directorate,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            return response()->json(['success' => 200]);
        }

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        abort_if(Gate::denies('edit_unit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $directorates = Directorate::all()->pluck('name','id');

        return view('systemadmin.units.edit', compact('unit', 'directorates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUnitsRequest $request, Unit $unit)
    {
        $unit->update($request->validated());

        return redirect(route('admin.units.index'))->withSuccess('Unit successfully updated');
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
