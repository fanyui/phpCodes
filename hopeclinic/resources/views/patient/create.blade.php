@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register New Patient Information</div>
               	 <div class="panel-body">
					<form method="post" action="store">
            {{ csrf_field() }}
						 <div class="form-group">
                            <label for="patient_name" class="col-md-4 control-label">Patient Name</label>
                            <div class="col-md-6">
                                <input id="patientName" type="text" class="form-control" name="patientName" 
                                required autofocus>
                            </div>
                            <label for="address" class="col-md-4 control-label">Address</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address"  required>
                            </div>
                             <label for="birth" class="col-md-4 control-label">Date Of Birth</label>
                            <div class="col-md-6">
                                <input id="dob" type="text" class="form-control" name="dob"  required> 
                            </div>
                            <label for="maritalstatus" class="col-md-4 control-label">Marital Status</label>
                            <div class="col-md-4">
                            	<select class="form-control" name="maritalStatus">
									  <option value="1">Maried</option>
									  <option value="0">single</option>
								</select>
							</div>
                            &nbsp;
                            <label for="gender" class="col-md-3 control-label">Gender</label>
                            <div class="col-md-4">
                            	<select class="form-control" name="gender">
									  <option value="1">Male</option>
									  <option value="0">Female</option>
								</select>
							</div>
            				<div class="col-md-6">
                                <button type="submit" class="btn btn-primary">Register</button> 
                            </div>
                        </div>
					</form>
					</div>
				</div>
			</div>
		</div>

<!-- Button trigger modal -->
<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
  Patient name
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">patient name details</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection