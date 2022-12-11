<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchStudent extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['grade_level'];
    
    public function getGradeLevelAttribute()
    {
        return GradeLevel::find($this->grade_level_id);
    }
}
