<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PredefinedSettingsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        abort_if(Gate::denies('access_general_configurations'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('systemadmin.predefinedconfigurations');
    }
}
