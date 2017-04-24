@extends('layouts/layout')

@section('title')
	Forgot Password - Graduates Job Placement System
@stop

@section('forgotpassword')
	<div class="row" style="margin-top: 80px">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<div class="{{session('fpalert')}}">{{ session('fpmessage') }}</div>
			<div class="panel panel-default panel-info">
			  <div class="panel-heading text-center">Forgot Password</div>
			  <div class="panel-body">
			  	<form class="form-horizontal" method="post" action="/forgotpassword">
			  	{{ csrf_field() }}
				  <div class="form-group">
				    <label class="control-label col-sm-2" for="email">Email:</label>
				    <div class="col-sm-10">
				      <input type="email" class="form-control" id="email" placeholder="Enter your email associated with your account" name="email">
				    </div>
				  </div>
				  <div class="form-group"> 
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-primary pull-right">Submit</button>
				    </div>
				  </div>
				</form>
			  </div>
			</div>
			<p class="alert alert-info"><strong>NOTE: </strong>Only ALUMNI, COMPANY, AND SCHOOL ADMIN can reset password.</p>
		</div>
		<div class="col-sm-3"></div>
	</div>
@stop