<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendance';

    protected $fillable = ['student_id', 'attendance_date', 'status'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
