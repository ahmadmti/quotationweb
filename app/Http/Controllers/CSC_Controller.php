<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{country,state,city};

class CSC_Controller extends Controller
{
    //
    public function index(){

        $data['countries'] = country::get(["name","id"]);
        return view('country-state-city',$data);
    }
    public function getState(Request $request)
    {
        $data['states'] = state::where("country_id",$request->country_id)
                    ->get(["name","id"]);
        return response()->json($data);
    }
    public function getCity(Request $request)
    {
        $data['cities'] = city::where("state_id",$request->state_id)
                    ->get(["name","id"]);
        return response()->json($data);
    }
}
