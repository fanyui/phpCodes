<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function member(){
    	return $this->hasMany(Employee::class);
    }
}
