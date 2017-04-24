<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentAdmin extends Model
{
	protected $fillable = ['password', 'name', 'username'];
    public function school(){
      return $this->belongsTo(SchoolAdmin::class);
    }

    public function students(){
    	return $this->hasMany(Student::class);
    }
}
