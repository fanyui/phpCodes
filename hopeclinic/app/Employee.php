<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    public function consult(){
    	return $this->hasMany(Consultation::class);
    }
    public function labtechnician(){
    	return $this->hasmany(Lab::class);
    	
    }
    public function department(){
    	return $this->belongsTo(Department::class);
    	
    }
}
