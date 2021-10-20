<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use App\Models\ApplicationToken;
use App\Models\ApplicationType;
use Illuminate\Http\Request;

class ApplicationTokensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $application_types = ApplicationType::all();

        return  view('systemadmin.applicationtokens.index', compact('application_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $application_types = ApplicationType::all()->pluck('name', 'id');

        return  view('systemadmin.applicationtokens.create', compact('application_types'));
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
            'application_type_id' => 'required|numeric',
            'quantity' => 'required|numeric'
        ]);

        for ($i = 0; $i <  $request->quantity; $i++) {
            $token = bin2hex(random_bytes(16));

            ApplicationToken::Create([
                'application_type_id' =>  $request->application_type_id,
                'token' => $token,
                'status' => 'available'
            ]);
        }

        return redirect(route('admin.application-tokens.index'))
            ->withSuccess('Application Tokens have successfully been generated');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $application_type = ApplicationType::findOrFail($id)->load('tokens');

        return view('systemadmin.applicationtokens.show', compact('application_type'));
    }
}
