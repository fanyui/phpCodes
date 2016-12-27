<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Consultation;
use App\Http\Requests;

class patientController extends Controller
{
    //opens a form for the creation of a new patient
    public function create(){
    	return view('patient.create');
    }

    //regiter a new patient into the database
    public function store(Request $request){
    	$patient = new Patient;
    	$patient->patientName = $request->patientName;
    	$patient->address = $request->address;
    	$patient->dob = date($request->dob);
    	$patient->maritalStatus = $request->maritalStatus;
        $patient->gender = $request->gender;
    	$patient->save();
        //return $patient;
    	//return $request->all();
    	return redirect('patient/create');
    }


    //returns a view for all the patient in the database
      public function index(){
         $patients = Patient::all();
        return view('patient.index',compact('patients'));
      }

        //opens a form for filling the opd for a patient chosen with id patient
      public function opd( Patient $patient){
            //$patientwithId = Patient::find($patient);
        return view('patient.opd',compact('patient'));
      }


        //registers the opd of a particular patient that has been chosen
      public function storeOpd(Request $request ,Patient $patient){

        $consultation = new Consultation;
        $consultation->weight = $request->weight;
        $consultation->temperature = $request->temperature;
        $consultation->bp = $request->bp;
        $consultation->HIVStatus = $request->HIVStatus;
        $consultation->insurance = $request->insurance;

        $patient->consults()->save($consultation);

        return redirect('patient');

      }

}

