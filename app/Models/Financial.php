<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financial extends Model
{
    use HasFactory;

    protected $table = 'financial';

    protected $fillable = ['department', 'year', 'revenue', 'expenses'];

    // Automatically calculate profit
    protected $appends = ['profit'];

    public function getProfitAttribute()
    {
        return $this->revenue - $this->expenses;
    }
}
