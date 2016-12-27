<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    public function patient(){
    	return $this->belongsTo(Patient::class);
    }

    public function employee(){
    	return $this->belongsTo(Employee::class);
    }
    
}
