@extends('layout')

@section('content')

@foreach($patients as $patient)
<div class="row">
  <div class="col-md-6">
  
		<li>{{ $patient->patientName }}</li>
@endforeach
	</div>
</div>
	

@endsection