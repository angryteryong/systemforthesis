@extends('layouts/layout')

@section('title')
	ADMIN PANEL - Add School
@stop

@section('adminPanel')
	@if(session('type') == 'superadmin')

		<form class="form-horizontal" style="margin-left: 350" method='post' action='/adminpanel/schools/add' enctype="multipart/form-data" data-toggle="validator" role="form">
			{{ csrf_field() }}
			<h2>Add School</h2>
			<div class="form-group">
				    <div class="col-sm-10">
				      <input type="name" name="name" class="form-control input-lg" id="name" placeholder="School Name" style="width: 663;" pattern="[a-zA-Z -]+" required>
				    </div>
			</div>
			<div class="form-group form-group has-feedback">
				<div class="col-sm-10"> 
				      <input type="text" name="username" class="form-control input-lg" id="username" placeholder="Admin's Username" style="width: 663;" pattern="[a-zA-Z]+" required>
				</div>
			 </div>
			 <div class="form-group">
				<div class="col-sm-10"> 
				      <input type="password" name="password" class="form-control input-lg" id="password" placeholder="Password" style="width: 663;" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>
				</div>
			 </div>
			 <div class="form-group">
				<div class="col-sm-10"> 
				      <input type="password" name="password2" class="form-control input-lg" id="password2" placeholder="Re-enter Password" data-match="#password" style="width: 663;" required>
				</div>
			 </div>
			 <div class="form-group">
				<div class="col-sm-10"> 
				      <input type="email" name="email" class="form-control input-lg" id="email" placeholder="E-mail" style="width: 663;""> 
	 		<br>
			<div class="form-group"> 
				<div class="col-sm-10">
					<label for="photo">School's Photo (REQUIRED):</label>
				   <input type="file" class='btn btn-lg file' name='photo' id="photo" style="width: 663;" required>
				</div>
	 		</div>

			<div class="form-group"> 
				<div class="col-sm-10">
				    <button type="submit" class="btn btn-primary btn-lg btn-block" id="inputlg" style="width: 663;" required>Register</button>
				</div>
	 		</div>
	</form>
	@else
		<h3 class="alert alert-danger text-center" style="width: 30%; margin:auto"><strong>ERROR! </strong>You are not an ADMIN</h3>
	@endif
	</div>
@stop