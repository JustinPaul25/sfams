<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['name', 'grade_level', 'section'];

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
