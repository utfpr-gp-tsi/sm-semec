<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Act extends Model
{
    protected $fillable = [
    	'act' , 'start' , 'validaty' , 'number' , 'time' , 'contract_id' , 
    ];

     //public function contracts(){
    	//rturn $this->hasMany(Contract::class,'server_id');
    //}
}
