<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
	protected $fillable = ['status', 'body'];
    public function department(){
    	return $this->belongsTo(DepartmentAdmin::class);
    }

    public function student(){
    	return $this->belongsTo(Student::class);
    }
}
