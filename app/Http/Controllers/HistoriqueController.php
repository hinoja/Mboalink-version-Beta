<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class HistoriqueController extends Controller
{
    public function index(){
        $lastActivity = Activity::all(); //returns the last logged activity
       dd($lastActivity);
        return $lastActivity;
    }
}
