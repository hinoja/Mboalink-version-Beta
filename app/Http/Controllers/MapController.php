<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    /**
     * display mapView
     * return
     */
    public function location(){
        return view('localisation');
    }
}
