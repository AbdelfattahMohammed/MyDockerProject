<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Financial; // Import the model

class FinancialController extends Controller
{
    public function index(Request $request)
    {
        // Get filters from the request
        $year = $request->input('year');
        $department = $request->input('department');

        // Query the database
        $query = Financial::where('year', $year);

        if ($department !== 'All') {
            $query->where('department', $department);
        }

        $reports = $query->get();

        return response()->json($reports);
    }

    public function financial()
    {
        return view('financial_reports');
    }
}
