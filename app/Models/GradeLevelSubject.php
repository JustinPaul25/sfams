<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeLevelSubject extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['subject'];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}