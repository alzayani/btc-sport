<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employees extends Model
{
    use SoftDeletes;
    protected $table = 'employees';
    protected $guarded = [];


    #####################################  Attribute  #############################################


    public function getLogoAttribute($val)
    {
        return ($val !== null) ? asset('assets/upload/contacts/' . $val) : asset('assets/upload/contacts/not-available.jpg');
    }


    #####################################  Relationship  #############################################


    public function department()
    {
        return $this->belongsTo('App\Models\Department', 'department_id');
    }

    // One Employee can supervise many Employees
    public function managing()
    {
        return $this->hasMany('App\Models\Employees', 'manager_id');
    }

    // Employee can be supervised by one supervisor
    public function supervisedBy()
    {
        return $this->belongsTo('App\Models\Employees', 'manager_id');
    }


    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['dob'])->age;
    }


    // Employee has Many Attachments
    public function attachments()
    {
        return $this->morphMany('App\Models\Attachments', 'module');
    }


    public function allowances()
    {
        return $this->hasMany('App\Models\Allowances', 'emp_id');
    }

    public function user()
    {
        return $this->hasOne('App\Models\User', 'employee_id');
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class, 'employee_id');
    }

    public function approvedAttendanceDetail()
    {
        return $this->hasMany(AttendanceApprovedDetail::class, 'employee_id');
    }

    public function leaves()
    {
        return $this->hasMany(Leave::class, 'employee_id')->orderByDesc('id');
    }
}
