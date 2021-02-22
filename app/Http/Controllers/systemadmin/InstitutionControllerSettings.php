<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InstitutionControllerSettings extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('systemadmin.InstitutionSettings.index');
    }
}
