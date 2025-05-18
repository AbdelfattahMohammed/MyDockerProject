<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $fillable = ['name', 'gender', 'year', 'department_id', 'gpa', 'attendance', 'absence', 'address', 'phone'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function attendanceRecords()
    {
        return $this->hasMany(Attendance::class);
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class, 'student_id');
    }
}
