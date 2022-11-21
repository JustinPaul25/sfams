<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['school_year', 'grade_level'];

    public function getSchoolYearAttribute()
    {
        return SchoolYear::find($this->school_year_id);
    }

    public function getGradeLevelAttribute()
    {
        return GradeLevel::find($this->grade_level_id);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function gradeLevel()
    {
        return $this->belongsTo(GradeLevel::class);
    }
}
