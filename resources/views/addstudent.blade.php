@extends('layouts/layout')

@section('title')
	Job Placement System for Dagupan City - Add Department
@stop

@section('addStudent')
@if(session('type') == 'departmentadmin' || session('type') == 'superadmin')
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<h3>REGISTER A STUDENT</h3>
			<form class="form-horizontal" method='post' action='/students/add' enctype="multipart/form-data" data-toggle="validator" role="form">
			{{ csrf_field() }}
				<div class="form-group">
					    <div class="col-sm-12">
					      <input type="name" name="lastname" class="form-control input-lg" id="lastname" placeholder="Last Name"  pattern="[a-zA-Z ]+"required>
					    </div>
				</div>
				<div class="form-group">
					<div class="col-sm-12"> 
					      <input type="name" name="firstname" class="form-control input-lg" id="firstname" placeholder="First Name"  pattern="[a-zA-Z ]+" required>
					</div>
				 </div>
				 <div class="form-group">
					<div class="col-sm-12"> 
					      <input type="name" name="middlename" class="form-control input-lg" id="middlename" placeholder="Middle Name" pattern="[a-zA-Z ]+" >
					</div>
				 </div>
				 <div class="form-group">
					<div class="col-sm-12"> 
					      <input type="text" name="course" class="form-control input-lg" id="course" placeholder="Course" pattern="[a-zA-Z ]+" required>
					</div>
				 </div>
				 <div class="form-group">
					<div class="col-sm-12"> 
					      <input type="text" name="studentid" class="form-control input-lg" id="studentid" placeholder="Student ID" pattern="[a-zA-Z0-9-]+" required>
					</div>
				 </div>
				 <div class="alert alert-warning col-sm-12" ><strong>NOTE! </strong>The student's <i>USERNAME</i> will be generated based on <i>Student ID, Department, and School</i>. The <i>PASSWORD</i> will be randomly generated.</div>
				<div class="form-group"> 
					<div class="col-sm-12">
						<label for="photo">Student's Photo (OPTIONAL):</label>
					   <input type="file" class='btn btn-lg file' name='photo' id="photo" >
					</div>
		 		</div>
		 		
				<div class="form-group"> 
					<div class="col-sm-12">
					    <button type="submit" class="btn btn-primary btn-lg btn-block" id="inputlg" >Register</button>
					</div>
		 		</div>
			</form>
		</div>
		<div class="col-sm-3"></div>
	</div>
@else
	ERROR
@endif
@stop