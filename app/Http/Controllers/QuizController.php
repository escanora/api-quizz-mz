<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index() {
        return view('pages.quiz.index');
    }

    public function create() {
        return view('pages.quiz.create');
    }
}
