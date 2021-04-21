<?php

namespace App\Http\Controllers\StandardsCurriculum;

use App\Http\Controllers\Controller;
use App\Models\Qualification;
use App\Models\StandardsCurriculum\UnitStandard;
use App\Models\StandardsCurriculum\UnitStandardReview;
use Illuminate\Http\Request;

class ReviewUnitStandardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qualifications = Qualification::all()->pluck('name','id');

        return view('standardscurriculum.unitstandards.review', compact('qualifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // foreach($request->standards as $standard){
        //     UnitStandardReview::create([
        //         'unit_standard_id' => $standard,
        //         'review_date' => $request->reviewDate
        //     ]);
        // }

        return json_encode(['status' => 200]);
    }

    public function retrieveUnitStandards(Request $request)
    {
        $standards = UnitStandard::where('qualification_id', $request->qualification)->get();

        return json_encode($standards);
    }

}
