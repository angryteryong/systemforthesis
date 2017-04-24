<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
	protected $fillable = ['company_name', 'position', 'date', 'address', 'description'];
    public function student(){
    	return $this->belongsTo(Student::class);
    }
}
