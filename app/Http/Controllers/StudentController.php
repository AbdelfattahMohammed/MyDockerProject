<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('student');
    }
    public function lev1_student()
    {
        $departments = Department::with(['students' => function ($query) {
        $query->where('year', 1);
    }])->get();
        return view('lev1_student', compact('departments'));

    }
    public function lev2_student()
    {
        $departments = Department::with(['students' => function ($query) {
        $query->where('year', 2);
    }])->get();
        return view('lev2_student', compact('departments'));
    }
    public function lev3_student()
    {
        $departments = Department::with(['students' => function ($query) {
        $query->where('year', 3);
    }])->get();
        return view('lev3_student', compact('departments'));
    }
    public function lev4_student()
    {
        $departments = Department::with(['students' => function ($query) {
        $query->where('year', 4);
    }])->get();
        return view('lev4_student', compact('departments'));
    }

}
