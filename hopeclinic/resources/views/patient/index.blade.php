@extends('layout')

@section('content')
<ul class="list-group">
	@foreach($patients as $patient)
	<div class="list-group-item">
		<a href="patient/{{ $patient->id }}/opd" >{{ $patient->patientName }}</a>
			<li class="list-group-items">{{ $patient->address }}</li>
			</div>
	@endforeach
</ul>
@endsection