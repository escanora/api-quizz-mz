<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard() {
        return view('pages.modo.dashboard');
    }

    public function analytique() {
        return view('pages.modo.analytique');
    }
}
