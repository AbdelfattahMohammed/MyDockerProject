<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use App\Models\FinancialReport;

class FinancialReportSeeder extends Seeder
{
    public function run()
    {
        FinancialReport::factory()->count(10)->create();
    }
}

