<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = ['updated_at', 'deletedbycompany', 'deletedbystudent'];
    public function chats(){
    	return $this->hasMany(Chat::class);
    }

    public function company(){
    	return $this->belongsTo(Company::class);
    }

    public function student(){
    	return $this->belongsTo(Student::class);
    }
}
