<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
    		'name',
    		'office_number',
    		'manager',
    ];

    //một phòng ban có nhiều nhân viên
    public function employees(){
    	return $this->hasMany('App\Employee');
    }
}
