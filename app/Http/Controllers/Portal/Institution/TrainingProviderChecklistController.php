<?php

namespace App\Http\Controllers\Portal\Institution;

use App\Http\Controllers\Controller;
use App\Models\RegistrationAccreditation\Checklist;
use App\Models\RegistrationAccreditation\TrainingProvider;
use App\Models\RegistrationAccreditation\TrainingProviderChecklist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TrainingProviderChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainingprovider_id = (TrainingProvider::where('login_id', auth()->user()->id)->first())->id;
        $checklist_evidences = TrainingProviderChecklist::with('checklist')
            ->where('training_provider_id', $trainingprovider_id)
            ->get();

        return view('portal.institutions.checklists.index', compact('checklist_evidences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $checklists = Checklist::with('thematicArea')
            ->where('checklist_type', 'institution')
            ->get()
            ->groupBy('thematicArea.name');

        return view('portal.institutions.checklists.create', compact('checklists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $checklists = Checklist::where('checklist_type', 'institution')->get();
        $errors = [];

        foreach ($checklists as $checklist) {
            if ($checklist->is_required == 'yes') {
                if (
                    !TrainingProviderChecklist::where(
                        'training_provider_id',
                        (TrainingProvider::where('login_id', auth()->user()->id)->first())->id
                    )
                        ->where('checklist_id', $checklist->id)
                        ->exists()
                ) {
                    if (!$request->hasFile($checklist->slug)) {
                        $errors["$checklist->slug"] = "The $checklist->name file is required. Please upload the file!";
                    }
                }
            }
        }
        if (count($errors) > 0) {
            return back()->withErrors($errors);
        } else {
            // store checklist evidence details
            DB::transaction(function () use ($request, $checklists) {
                Storage::makeDirectory(auth()->user()->username);
                foreach ($checklists as $checklist) {
                    if (array_key_exists($checklist->slug, $request->file())) {
                        $file = $request->file($checklist->slug);
                        $name = time() . '_' . $checklist->slug;
                        $path = $file->storeAs(auth()->user()->username, $name);

                        if (
                            !TrainingProviderChecklist::where(
                                'training_provider_id',
                                (TrainingProvider::where('login_id', auth()->user()->id)->first())->id
                            )
                                ->where('checklist_id', $checklist->id)
                                ->exists()
                        ) {
                            TrainingProviderChecklist::create([
                                'training_provider_id' => (TrainingProvider::where('login_id', auth()->user()->id)->first())->id,
                                'checklist_id' => $checklist->id,
                                'path' => '/storage/' . $path
                            ]);
                        } else {
                            TrainingProviderChecklist::where('checklist_id', $checklist->id)
                                ->update([
                                    'path' => '/storage/' . $path
                                ]);
                        }
                    }
                }
            });
        }

        return redirect(route('portal.institution.checklist-evidence.index'))
            ->withSuccess('All Checklist evidence has successfully been uploaded');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $checklist_evidence = TrainingProviderChecklist::findOrFail($id)
            ->load('checklist', 'checklist.thematicArea');

        return view('portal.institutions.checklists.edit', compact('checklist_evidence'));
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
        $checklist_evidence = TrainingProviderChecklist::findOrFail($id)
            ->load('checklist');
        $errors = [];
        if (!array_key_exists($checklist_evidence->checklist->slug, $request->file())) {
            $errors["{$checklist_evidence->checklist->slug}"] = "The {$checklist_evidence->checklist->name} file is required. Please upload the file!";
            return back()->withErrors($errors);
        } else {
            $file = $request->file($checklist_evidence->checklist->slug);
            $name = time() . '_' . $checklist_evidence->checklist->slug;
            $path = $file->storeAs(auth()->user()->username, $name);
            $checklist_evidence->update([
                'path' => '/storage/' . $path
            ]);
        }
        return redirect(route('portal.institution.checklist-evidence.index'))
            ->withSuccess("{$checklist_evidence->checklist->name} Checklist evidence has successfully updated");
    }
}
