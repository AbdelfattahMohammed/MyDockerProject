<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Student;
use GuzzleHttp\Psr7\Query;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
{
    $departments = Department::all();

    $CS =Department::where('department_name', 'CS')->first();
    $IS =Department::where('department_name', 'IS')->first();;
    $AI =Department::where('department_name', 'AI')->first();;
    $BI =Department::where('department_name', 'BIO')->first();
    $cs_student_count = $CS ? Student::where('department_id', $CS->id)->count() : 0;
    $is_student_count = $IS ? Student::where('department_id', $IS->id)->count() : 0;
    $ai_student_count = $AI ? Student::where('department_id', $AI->id)->count() : 0;
    $bi_student_count = $BI ? Student::where('department_id', $BI->id)->count() : 0;
    if($IS)
        $IS=$IS->head_of_department;
    else
        $IS=null;
    if($CS)
        $CS=$CS->head_of_department;
    else
        $CS=null;
    if($AI)
        $AI=$AI->head_of_department;
    else
        $AI=null;
    if($BI)
        $BI=$BI->head_of_department;
    else
        $BI=null;
    return view('Department', compact('departments', 'CS','IS','AI','BI','cs_student_count','is_student_count','ai_student_count','bi_student_count','bi_student_count'));
}



}
