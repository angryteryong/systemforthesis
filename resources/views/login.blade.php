
@extends('layouts/layout')

@section('title')
	User Login - Job Placement System for Dagupan City
@stop

@section('loginForm')
	<br>
	<div class="row">
		<div class="col-sm-3">
		</div>

		<div class="col-sm-6">
			@if(session('message'))
				<div class="alert {{ session('messageType') }}" style="text-align: center;">
				 {{ session('message') }}
				</div>
			@else
				
			@endif
			<div class="panel panel-info loginPanel">
				<div class="panel-heading" style="text-align: center;">
					<h4><span class='glyphicon glyphicon-lock'></span> AUTHENTICATION </h4>
				</div>
				<div class="panel-body">
					 <form class="form-horizontal" method="post" action="/login">
					 {{ csrf_field() }}
					  <div class="form-group">
						<label class="control-label col-sm-2" for="sel1"></label>
						<label class="control-label col-sm-2" for="sel1">LOGIN AS:</label>
						<div class="col-sm-8">
						  <select class="form-control" id="sel1" name="type" style="width: 200px"> 
						    <option value="student">Alumnus</option>
						    <option value="departmentadmin">Department Admin</option>
						    <option value="schooladmin">School Admin</option>
						    <option value="company">Company</option>
						  </select>
						</div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="username">USERNAME:</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control input-lg" id="username" placeholder="Enter username" name="username">
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="pwd">PASSWORD:</label>
					    <div class="col-sm-10">
					      <input type="password" class="form-control input-lg" id="pwd" placeholder="Enter password" name="password">
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-primary form-control" id="btnLogin" onclick="login()" onsubmit="countMessages()"><span class="glyphicon glyphicon-log-in"></span> Login</button>
					    </div>
					  </div>
					  <h4 style="text-align: center"><a href="/forgotpassword">Forgot Password?</a></h4>
					</form>
				</div>
			</div>
		</div>

		<div class="col-sm-3">
		</div>
	</div>
@stop