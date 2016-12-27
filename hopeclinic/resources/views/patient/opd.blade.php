@extends('layout')

@section('content')

<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> Fill OPD For {{ $patient->patientName }} </div>
               	 <div class="panel-body">
					<form method="post" action="/consultation/store">
						  {{ csrf_field() }}
						 <div class="form-group">
                            <label for="weight" class="col-md-4 control-label">Weight </label>
                            <div class="col-md-6">
                                <input id="weight" type="text" class="form-control" name="weight" 
                                required autofocus>
                            </div>
                            <label for="temperature" class="col-md-4 control-label">Temperature</label>
                            <div class="col-md-6">
                                <input id="temperature" type="text" class="form-control" name="temperature"  required>
                            </div>
                             <label for="bp" class="col-md-4 control-label">Blood Pressure</label>
                            <div class="col-md-6">
                                <input id="bp" type="text" class="form-control" name="bp"  required> 
                            </div>
                            <label for="hivStatus" class="col-md-4 control-label">HIV Status</label>
                            <div class="col-md-4">
                            	<select class="form-control" name="HIVStatus">
									  <option value="1">Positive</option>
									  <option value="0">Negative</option>
								</select>
							</div>
                            &nbsp;
                            <label for="insurance" class="col-md-3 control-label">Insurance</label>
                            <div class="col-md-4">
                            	<select class="form-control" name="insurance">
									  <option value="1">Insured</option>
									  <option value="0">Not Insured</option>
								</select>
							</div>
            				<div class="col-md-6">
                                <button type="submit" class="btn btn-primary">confirmed</button> 
                            </div>
                        </div>
					</form>
					</div>
				</div>
			</div>
		</div>

@endsection