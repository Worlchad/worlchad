<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    public function management(){
        return view('about.management');
    }

    public function executives(){
        return view('about.executives');
    }
}
