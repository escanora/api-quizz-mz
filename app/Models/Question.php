<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index() {
        return view('pages.question.index');
    }

    public function create() {
        return view('pages.question.create');
    }
}
