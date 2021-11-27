<?php

namespace App\Http\Controllers\RegistrationAccreditation;

use App\Http\Controllers\Controller;
use App\Models\RegistrationAccreditation\ChecklistThematicArea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChecklistThematicAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thematicareas = ChecklistThematicArea::all()->pluck('name', 'id');

        return view('registrationAccreditation.checklistarea.index', compact('thematicareas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registrationAccreditation.checklistarea.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        if (
            ChecklistThematicArea::where(DB::raw('lower(name)'), 'like', '%' . strtolower($request->name) . '%')
            ->exists()
        ) {
            return back()->withInfo('Checklist thematic area with this name already exist');
        } else {
            ChecklistThematicArea::create([
                'name' => $request->name,
                'description' => $request->description,
            ]);
        }

        return redirect(route('registration-accreditation.checklist-thematic-area.index'))
            ->withSuccess('Checklist thematic area successfully added');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $thematicarea = ChecklistThematicArea::findOrFail($id);

        return view('registrationAccreditation.checklistarea.edit', compact('thematicarea'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        ChecklistThematicArea::where('id', $id)
            ->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);

        return back()
            ->withSuccess('Checklist thematic area successfully added');
    }
}
