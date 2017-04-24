<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	protected $fillable = ['password', 'firstname', 'middlename', 'lastname', 'email', 'course', 'photo', 'studentid', 'summary', 'address', 'phone_number', 'status'];

    public function skills(){
      return $this->hasMany(Skill::class);
    }

    public function experiences(){
      return $this->hasMany(Experience::class);
    }

    public function educations(){
      return $this->hasMany(Education::class);
    }

    public function department(){
      return $this->belongsTo(DepartmentAdmin::class);
    }

    public function chats(){
      return $this->hasMany(Chat::class);
    }

    public function conversations(){
      return $this->hasMany(Conversation::class);
    }
}
