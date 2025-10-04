<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use App\Models\Submission;

class AdminController extends Controller
{
    public function __construct()
    {
        // ini valid kalau extend Controller
        $this->middleware('auth');
    }

    public function index()
    {
        $totalProblems = Problem::count();
        $totalSubmissions = Submission::count();

        return view('admin.index', compact('totalProblems', 'totalSubmissions'));
    }
}
