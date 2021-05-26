<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class FrontendController extends Controller
{
    public function landing(){
        return Inertia::render('Welcome');
    }

    public function jobSeeker(){
        return Inertia::render('EligibilityForm');
    }
}
