<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\State;
use App\Models\City;

class AjaxsController extends Controller
{
    //
    public function getStates(Request $request){
        $data = [];
        // dd("k");

        if($request->has('id')){
            $data = State::where('country_id','=',$request->get('id'))->get()->pluck('id','name');
        }
        return response()->json($data);
    }

    public function getCities(Request $request){
        $data = [];

        if($request->has('id')){
            $data = City::where('state_id','=',$request->get('id'))->get()->pluck('id','name');
        }
        return response()->json($data);
    }
}
