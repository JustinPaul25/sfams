<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enroll extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['school_year'];

    public function getSchoolYearAttribute()
    {
        return SchoolYear::find($this->school_year_id);
    }
}
