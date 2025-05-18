<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Instructor;
use App\Models\Department;
use App\Models\Course;
use App\Models\Event;
use App\Models\Financial;
use App\Models\Attendance;
use App\Models\AttendanceOfInstructor;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        // Search in 'students' table
        $students = Student::where('name', 'LIKE', "%$query%")
            ->orWhere('gender', 'LIKE', "%$query%")
            ->orWhere('address', 'LIKE', "%$query%")
            ->orWhere('phone', 'LIKE', "%$query%")
            ->orWhere('year', 'LIKE', "%$query%")
            ->orWhere('gpa', 'LIKE', "%$query%")
            ->get();

        // Search in 'instructors' table
        $instructors = Instructor::where('full_name', 'LIKE', "%$query%")
            ->orWhere('work_days', 'LIKE', "%$query%")
            ->get();

        // Search in 'departments' table
        $departments = Department::where('department_name', 'LIKE', "%$query%")
            ->orWhere('head_of_department', 'LIKE', "%$query%")
            ->get();

        // Search in 'courses' table
        $courses = Course::where('course_name', 'LIKE', "%$query%")
            ->orWhere('term', 'LIKE', "%$query%")
            ->get();

        // Search in 'events' table
        $events = Event::where('event_name', 'LIKE', "%$query%")
            ->orWhere('event_date', 'LIKE', "%$query%")
            ->get();

        // Search in 'financial_reports' table
        $financialReports = Financial::where('department', 'LIKE', "%$query%")
            ->orWhere('year', 'LIKE', "%$query%")
            ->orWhere('revenue', 'LIKE', "%$query%")
            ->orWhere('expenses', 'LIKE', "%$query%")
            ->orWhere('profit', 'LIKE', "%$query%")
            ->get();

        // Search in 'attendance' table
        $attendance = Attendance::where('status', 'LIKE', "%{$query}%")->get();


        // Search in 'attendance_of_instructors' table
        $attendanceOfInstructors = AttendanceOfInstructor::where('status', 'LIKE', "%$query%")
            ->get();

        return view('search-results', compact(
            'query',
            'students',
            'instructors',
            'departments',
            'courses',
            'events',
            'financialReports',
            'attendance',
            'attendanceOfInstructors'
        ));
    }
}
