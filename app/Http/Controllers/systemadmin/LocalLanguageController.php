<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use App\Models\LocalLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class LocalLanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('access_general_configurations'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $local_languages = LocalLanguage::all();

        return view('systemadmin.localLanguages.index', compact('local_languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('create_general_configurations'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('systemadmin.localLanguages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(Gate::denies('create_general_configurations'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'name' => ['required', 'string'],
        ]);

        LocalLanguage::create($request->all());

        return redirect(route('admin.local-languages.index'))
            ->withSuccess('Local language successfully added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('edit_general_configurations'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $local_language = LocalLanguage::findOrFail($id);

        return view('systemadmin.localLanguages.edit', compact('local_language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LocalLanguage $local_language)
    {
        abort_if(Gate::denies('edit_general_configurations'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'name' => ['required', 'string']
        ]);

        $local_language->update($request->all());

        return back()->withSuccess('Local language successfuly updated');
    }
}
