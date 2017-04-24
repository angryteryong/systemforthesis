<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
	protected $fillable = ['school_name', 'course', 'date', 'description'];
    public function student(){
    	return $this->belongsTo(Student::class);
    }
}
