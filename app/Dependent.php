<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependent extends Model
{
     protected $fillable = [
     	'name' , 'birth' , 'age' , 'degree' , 'study' , 'works' , 'server_id' ,
     ];

     public function servers(){
    	return $this->belongsTo(Server::class,'server_id');
    }
}


