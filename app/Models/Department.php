<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';
    protected $fillable = ['name'];
    protected $guarded = [];

    public function employees()
    {
        return $this->hasMany('App\Models\Employees', 'department_id');
    }
}
