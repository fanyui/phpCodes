<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    public function consults(){
    	return $this->hasMany(Consultation::class);
    	
    }

}
