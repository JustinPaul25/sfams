<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['name', 'grade_level', 'section', 'grade', 'account', 'requirements', 'payments', 'grades'];

    protected $casts = [
        'created_at'  => 'date:m-d-Y',
    ];

    public function getNameAttribute()
    {
        return $this->last_name.', '.$this->first_name;
    }

    public function getGradeLevelAttribute()
    {
        return GradeLevel::find($this->grade_level_id);
    }

    public function getSectionAttribute()
    {
        return Section::find($this->section_id);
    }

    public function getAccountAttribute()
    {
        return Account::where('student_id', $this->id)->first();
    }

    public function getRequirementsAttribute()
    {
        return StudentRequirement::where('student_id', $this->id)->first();
    }

    public function getGradeAttribute()
    {
        $sy = SchoolYear::where('status', 'active')->first();

        $grade = Grade::where('student_id', $this->id)->where('school_year_id', $sy->id)->first();

        return $grade;
    }

    public function getGradesAttribute()
    {
        return Grade::where('student_id', $this->id)->get();
    }

    public function getPaymentsAttribute()
    {
        return Payment::where('student_id', $this->id)->get();
    }

    protected function firstName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucwords($value),
        );
    }

    protected function lastName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucwords($value),
        );
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    
    public function gradeEntered()
    {
        return $this->belongsTo(GradeLevel::class, 'grade_entered_id', 'id');
    }

    public function gradeLevel()
    {
        return $this->belongsTo(GradeLevel::class, 'grade_level_id', 'id');
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function account()
    {
        return $this->hasOne(Account::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function studentRequirement()
    {
        return $this->hasOne(StudentRequirement::class);
    }
}
