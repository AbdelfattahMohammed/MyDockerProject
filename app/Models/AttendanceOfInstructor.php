<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttendanceOfInstructor extends Model
{
    use HasFactory;

    protected $fillable = ['instructor_id', 'date', 'status'];

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }
}
