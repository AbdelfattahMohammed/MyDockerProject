<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h2 class="mb-4">Search Results for "{{ $query }}"</h2>

        @if (
            $students->isEmpty() &&
                $instructors->isEmpty() &&
                $departments->isEmpty() &&
                $courses->isEmpty() &&
                $events->isEmpty() &&
                $financialReports->isEmpty() &&
                $attendance->isEmpty() &&
                $attendanceOfInstructors->isEmpty())
            <div class="alert alert-warning">No results found.</div>
        @else
            <div class="row">
                @if (!$students->isEmpty())
                    <div class="col-md-6">
                        <h3>Students</h3>
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>Name</th>
                                    <th>Year</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->year }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

                @if (!$instructors->isEmpty())
                    <div class="col-md-6">
                        <h3>Instructors</h3>
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>Full Name</th>
                                    <th>Work Days</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($instructors as $instructor)
                                    <tr>
                                        <td>{{ $instructor->full_name }}</td>
                                        <td>{{ $instructor->work_days }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

            <div class="row mt-4">
                @if (!$departments->isEmpty())
                    <div class="col-md-6">
                        <h3>Departments</h3>
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>Department Name</th>
                                    <th>Head of Department</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($departments as $department)
                                    <tr>
                                        <td>{{ $department->department_name }}</td>
                                        <td>{{ $department->head_of_department }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

                @if (!$courses->isEmpty())
                    <div class="col-md-6">
                        <h3>Courses</h3>
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>Course Name</th>
                                    <th>Level</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($courses as $course)
                                    <tr>
                                        <td>{{ $course->course_name }}</td>
                                        <td>{{ $course->course_level }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

            <div class="row mt-4">
                @if (!$events->isEmpty())
                    <div class="col-md-6">
                        <h3>Events</h3>
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>Event Name</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                    <tr>
                                        <td>{{ $event->event_name }}</td>
                                        <td>{{ $event->event_date }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

                @if (!$financialReports->isEmpty())
                    <div class="col-md-6">
                        <h3>Financial Reports</h3>
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>Report ID</th>
                                    <th>Department</th>
                                    <th>Year</th>
                                    <th>Revenue</th>
                                    <th>Expenses</th>
                                    <th>Profit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($financialReports as $report)
                                    <tr>
                                        <td>{{ number_format($report->id, 2) }}</td>
                                        <td>{{ $report->department }}</td>
                                        <td>{{ $report->year}}</td>
                                        <td>${{ number_format($report->revenue, 2) }}</td>
                                        <td>${{ number_format($report->expenses, 2) }}</td>
                                        <td>${{ number_format($report->profit, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

            <div class="row mt-4">
                @if (!$attendance->isEmpty())
                    <div class="col-md-6">
                        <h3>Student Attendance</h3>
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>Student Name</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attendance as $record)
                                    <tr>
                                        <td>{{ $record->student->name ?? 'N/A' }}</td>
                                        <td>{{ $record->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

                @if (!$attendanceOfInstructors->isEmpty())
                    <div class="col-md-6">
                        <h3>Instructor Attendance</h3>
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>Instructor Name</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attendanceOfInstructors as $record)
                                    <tr>
                                        <td>{{ $record->instructor->full_name ?? 'N/A' }}</td>
                                        <td>{{ $record->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        @endif
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
