@extends('layouts/layout')

@section('title')
	Register - Job Placement System for Dagupan City
@stop

@section('registerForm')
	<div class="row">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-6">
			<div class="panel panel-info loginPanel">
				<div class="panel-heading" style="text-align: center;">
					<h4><span class='glyphicon glyphicon-align-left'></span> REGISTER YOUR COMPANY </h4>
				</div>
				<div class="panel-body">
					<form class="form-horizontal" method='post' action='/register' enctype="multipart/form-data" data-toggle="validator" style="margin: auto; width: 90%">
						{{ csrf_field() }}
						<div class="form-group">
							<div>
							    <input type="name" name="name" class="form-control input-lg" id="name" placeholder="Company Name" pattern="[a-zA-Z -]+" required>
							</div>
						</div>
						<div class="form-group">
							<div> 
							      <input type="name" name="address" class="form-control input-lg" id="address" placeholder="Company Address" pattern="[a-zA-Z0-9 ,-]+" required>
							</div>
						</div>
						<div class="form-group">
							<div> 
							      <input type="email" name="email" class="form-control input-lg" id="email" placeholder="Company E-mail" required>
							</div>
						</div>
						<div class="form-group">
							<div> 
							      <input type="name" name="username" class="form-control input-lg" id="username" placeholder="Desired Username" pattern="[a-zA-Z0-9]+">
							</div>
						 </div>
						 <div class="form-group">
							<div> 
							      <input type="password" name="password" class="form-control input-lg" id="password" placeholder="Enter Password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
							</div>
						 </div>
						<div class="form-group">
							<div>
							    <input type="password" class="form-control input-lg" id="email" placeholder="Re-enter Password" data-match="#password" required>
							</div>
						</div>
						 <!-- <div class="alert alert-warning"><strong>NOTE! </strong>Some notes here</div> -->
						<div class="form-group"> 
							<div>
								<label for="photo">Company's Logo (OPTIONAL):</label>
							   <input type="file" class='btn btn-lg file' name='photo' id="photo">
							</div>
				 		</div>
						<div class="form-group"> 
							<div>
							    <button type="submit" class="btn btn-primary btn-lg btn-block" id="inputlg">Register</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-sm-3">
		</div>
	</div>
@stop