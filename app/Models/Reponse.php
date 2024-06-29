<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReponseController extends Controller
{
    public function index() {
        return view('pages.reponse.index');
    }

    public function create() {
        return view('pages.reponse.create');
    }
}
