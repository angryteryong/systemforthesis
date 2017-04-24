@extends('layouts/layout')

@section('title')
	Account Settings - Graduates Job Placement System for Dagupan City
@stop

@section('editaccountcompany')
	<div class="row">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-6">
			<div class="{{ session('editalertlevel') }} text-center">
				{{ session('editalert') }}
			</div>
			<div class="panel panel-info">
				<div class="panel-heading" style="text-align: center;">
					<h4> EDIT ACCOUNT </h4>
				</div>
				<div class="panel-body">
					<form class="form-horizontal" method="post" action="/editaccount" data-toggle="validator">
						{{ csrf_field() }}
						{{ method_field('patch') }}
					  <div class="form-group">
					    <label class="control-label col-sm-4" for="username">Username:</label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="username" placeholder="Username" value="{{ $com->username }}" disabled>
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-4" for="pwd">Old Password:</label>
					    <div class="col-sm-8">
					      <input type="password" class="form-control" placeholder="Enter password" name="oldpassword" required>
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-4" for="pwd">New Password:</label>
					    <div class="col-sm-8">
					      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="newpassword" required>
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-4" for="pwd">Re-enter New Password:</label>
					    <div class="col-sm-8">
					      <input type="password" class="form-control" data-match="#pwd" placeholder="Enter password" required>
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-4 col-sm-8">
					      <button type="submit" class="btn btn-primary">Save</button>
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