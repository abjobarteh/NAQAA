<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function index()
    {
        $tiles = [

        ];
        
        return view('systemadmin.dashboard');
    }
}
