<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    protected $fillable = [
        'registration' , 'start date' , 'finish date' , 'license type' , 'days' , 'server_id' ,
    ];

    public function servers(){
    	return $this->belongsTo(Server::class,'server_id');
    }
}
