<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IrrigationController extends Controller
{
    public function index(){
        return inertia('Dashboard/Irrigation/Index');
    }
}
