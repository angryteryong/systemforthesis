<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
	protected $fillable = ['status'];
    public function company(){
    	return $this->belongsTo(Company::class);
    }

    public function student(){
    	return $this->belongsTo(Student::class);
    }

    public function conversation(){
    	return $this->belongsTo(Conversation::class);
    }
}
