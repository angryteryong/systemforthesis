@extends('layouts/layout')

@section('title')
	Reset Password - Graduates Job Placement System for Dagupan City
@stop

@section('resetpasswordpage')
	<div class="row" style="margin-top: 80px">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">	
			<div class="panel panel-default panel-info">
			  <div class="panel-heading text-center">Reset Password</div>
			  <div class="panel-body">
			  	<form class="form-horizontal" method="post" action="/resetpassword" data-toggle="validator">
			  	{{ csrf_field() }}
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="email">New Password:</label>
				    <div class="col-sm-9">
				      <input type="password" class="form-control" id="password" placeholder="New Password" name="password">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="email">Re-enter New Password:</label>
				    <div class="col-sm-9">
				      <input type="password" class="form-control" id="password2" placeholder="Re-enter password" data-match="#password">
				    </div>
				  </div>
				  <input type="hidden" name="type" value="{{ $type }}">
				  <input type="hidden" name="username" value="{{ $username }}">
				  <div class="form-group"> 
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-primary pull-right">Submit</button>
				    </div>
				  </div>
				</form>
			  </div>
			</div>
		</div>
		<div class="col-sm-3"></div>
	</div>
@stop