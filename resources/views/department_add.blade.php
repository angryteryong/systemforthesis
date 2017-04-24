@extends('layouts/layout')

@section('title')
	Job Placement System for Dagupan City - Add Department
@stop

@section('addDepartment')
@if(session('type') == 'schooladmin' || session('type') == 'superadmin')
	<div class="row">
		<div class="col-sm-3">
		</div>

		<div class="col-sm-6">
			<h3>Add Department</h3>
			<form class="form-horizontal" method='post' action='/department/actions/add' data-toggle="validator" role="form">
			{{ csrf_field() }}
				<div class="form-group">
					    <div class="col-sm-12">
					      <input type="name" name="name" class="form-control input-lg" id="name" placeholder="Enter Department Name" pattern="[a-zA-Z -]+" required>
					    </div>
				</div>
				<div class="form-group">
					<div class="col-sm-12"> 
					      <input type="text" name="username" class="form-control input-lg" id="username" placeholder="Enter Username for Department" pattern="[a-zA-Z-]+" required>
					</div>
				 </div>
				 <div class="form-group">
					<div class="col-sm-12"> 
					      <input type="password" name="password" class="form-control input-lg" id="password" placeholder="Enter Password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>
					</div>
				 </div>
				<div class="form-group">
					    <div class="col-sm-12">
					      <input type="password" class="form-control input-lg" id="email" placeholder="Re-enter Password" data-match="#password" required>
					    </div>
				</div>

				<!-- <div class="form-group"> 
					<div class="col-sm-10">
					   <input type="file" class='btn btn-lg file' name='fileToUpload' id="inputlg" value="Upload Photo" style="width: 663;">
					</div>
		 		</div> -->
		 		
				<div class="form-group"> 
					<div class="col-sm-12">
					    <button type="submit" class="btn btn-primary btn-lg btn-block" id="inputlg">Add</button>
					</div>
		 		</div>
			</form>
		</div>

		<div class="col-sm-3">
		</div>
	</div>
@else
	ERROR
@endif
@stop