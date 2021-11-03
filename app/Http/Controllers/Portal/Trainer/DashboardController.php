<?php

namespace App\Http\Controllers\Portal\Trainer;

use App\Http\Controllers\Controller;
use App\Models\RegistrationAccreditation\ApplicationDetail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $applications = ApplicationDetail::whereHas('trainer', function (Builder $query) {
            $query->where('login_id', auth()->user()->id);
        })
            ->latest()
            ->limit(10)
            ->get();

        return view('portal.trainers.dashboard', compact('applications'));
    }
}
