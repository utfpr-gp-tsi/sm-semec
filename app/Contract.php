<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
        'registration' , 'admission' , 'termination' , 'secretary' , 'place' , 'role' , 'server_id , '
    ];

    public function servers(){
    	return $this->belongsTo(Servers::class,'server_id');
    }
}
