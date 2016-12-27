<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Patient;
use App\Consultation;
use App\Http\Requests;

class doctorsController extends Controller
{
	
	//doctors index 
public function index(){
	$patients = Patient::all();
	$consultations = Consultation::all();
	return view('doctor.index',compact('patients'),compact('consultations'));
}   

 //
}
