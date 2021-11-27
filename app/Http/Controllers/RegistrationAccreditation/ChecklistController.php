<?php

namespace App\Http\Controllers\RegistrationAccreditation;

use App\Http\Controllers\Controller;
use App\Models\RegistrationAccreditation\Checklist;
use App\Models\RegistrationAccreditation\ChecklistThematicArea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checklists = Checklist::latest()->get();

        return view('registrationAccreditation.checklist.index', compact('checklists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $thematicareas = ChecklistThematicArea::all()->pluck('name', 'id');

        return view('registrationAccreditation.checklist.create', compact('thematicareas'));
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
            'slug' => 'required|string',
            'checklist_type' => 'required|in:institution,trainer',
            'thematic_area_id' => 'required|numeric',
            'is_required' => 'required|in:yes,no',
            'is_renewal_required' => 'required|in:yes,no',
            'description' => 'nullable|string',
        ]);

        if (Checklist::where(DB::raw('lower(slug)'), 'like', '%' . strtolower($request->slug) . '%')
            ->exists()
        ) {
            return back()->withInfo('Checklist with this name already exist');
        } else {
            Checklist::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'checklist_type' => $request->checklist_type,
                'thematic_area_id' => $request->thematic_area_id,
                'is_required' => $request->is_required,
                'is_renewal_required' => $request->is_renewal_required,
                'description' => $request->description,
            ]);
        }

        return redirect(route('registration-accreditation.checklists.index'))
            ->withSuccess('Checklist successfully added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $checklist = Checklist::findOrFail($id);
        $thematicareas = ChecklistThematicArea::all()->pluck('name', 'id');

        return view('registrationAccreditation.checklist.edit', compact('thematicareas', 'checklist'));
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
            'slug' => 'required|string',
            'checklist_type' => 'required|in:institution,trainer',
            'thematic_area_id' => 'required|numeric',
            'is_required' => 'required|in:yes,no',
            'is_renewal_required' => 'required|in:yes,no',
            'description' => 'nullable|string',
        ]);

        Checklist::where('id', $id)->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'checklist_type' => $request->checklist_type,
            'thematic_area_id' => $request->thematic_area_id,
            'is_required' => $request->is_required,
            'is_renewal_required' => $request->is_renewal_required,
            'description' => $request->description,
        ]);

        return back()->withSuccess('Checklist successfully updated');
    }
}
