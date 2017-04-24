<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolAdmin extends Model
{
	protected $fillable = ['password', 'name', 'photo'];
    public function student(){
      return $this->hasMany(Student::class);
    }

    public function department(){
    	return $this->hasMany(DepartmentAdmin::class);
    }
}
