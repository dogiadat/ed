<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //chọn những trường trong bản mà ta thao tác
    protected $fillable = [
    	'name',
    	'department_id',
    	'email',
    	'job',
    	'phone',
        'photo',
    ];

    //một nhân viên có một phòng ban
    public function department(){
    	return $this->belongsTo('App\Department');
    }
    public function projects(){
        return $this->belongsToMany('App\Project');
    }
}
