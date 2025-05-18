<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialReport extends Model
{
    use HasFactory;

    protected $fillable = ['report_date', 'total_budget', 'expenses', 'revenue', 'event_id'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
