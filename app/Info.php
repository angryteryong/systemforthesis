<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    public function student(){
    	$this->belongsTo(Student::class);
    }
}
