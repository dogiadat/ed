<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = [
    	'name',
        'describe',
    ];
    public function employees(){
    	return $this->belongsToMany('App\Employee');
    }
}
