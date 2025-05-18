<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['course_name', 'course_level', 'department_id', 'term'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function instructors()
    {
        return $this->hasMany(Instructor::class);
    }
}
