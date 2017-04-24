<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'address', 'email', 'photo', 'status', 'summary'];
    
    public function chats(){
    	return $this->hasMany(Chat::class);
    }

    public function conversations(){
      return $this->hasMany(Conversation::class);
    }
}
