<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function branchAccount()
    {
        return $this->hasOne(BranchAccount::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
