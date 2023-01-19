<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['account', 'payments', 'students'];

    protected $hidden = ['created_at', 'updated_at'];

    public function getAccountAttribute()
    {
        return BranchAccount::where('branch_id', $this->id)->first();
    }

    public function getPaymentsAttribute()
    {
        return Payment::where('branch_id', $this->id)->get();
    }

    public function getStudentsAttribute()
    {
        return Student::where('branch_id', $this->id)->where('status', 'ENROLLED')->count();
    }

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

    public function account()
    {
        return $this->hasOne(Account::class);
    }
}
