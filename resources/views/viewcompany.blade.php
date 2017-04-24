@extends('layouts.layout')

@section('title')
	View Company
@stop

@section('viewcompany')
	<div class="row">
		<div class="col-sm-4">
			<div class="panel panel-primary">
				<div class="panel-heading"><h3>{{ $company->name }}</h3></div>
			 	<div class="panel-body">
			 	@if(session('type') == 'company' && $company->id == session('id'))
			 		<div class="myImage">
			          <img src="/app/{{ $company->photo }}" class="img-rounded img-responsive stPhoto myPP" alt="Company's Picture" name="photo" id="sPhoto">
			          <div class="overlay">
			            <div class="imageText">
			            <form method="post" action="/updatecompanyphoto/{{ session('id') }}" enctype="multipart/form-data">
			              {{ csrf_field() }}
			              {{ method_field('patch') }}
			              <label class="btn btn-info btn-file">
			                Change Profile Picture <input type="file" onchange="readURL(this);" style="display: none;" name="newphoto">
			            </label>
			              <button type="submit" id="upPhoto" hidden>Submit Photo</button>
			            </form>
			            </div>
			          </div>
			        </div>
			    @else
			    	<div class="myImage">
			          <img src="/app/{{ $company->photo }}" class="img-rounded img-responsive stPhoto myPP" alt="Company's Picture" name="photo" id="sPhoto">
			          <div class="overlay">
			            <div class="imageText">
			            </div>
			          </div>
			        </div>
			    @endif
			 	</div>
			</div>
		</div>
		<div class="col-sm-8">
			@if(session('type') == 'company' && $company->id == session('id'))
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4><strong>Company Information</strong></h4>
						<button class="btn btn-default pull-right" style="margin-top: -40px" onclick="editcompanyinfo()">Edit</button>
						<button class="btn btn-default pull-right" style="margin-top: -40px; margin-right: 60px; visibility: hidden;" onclick="cancelcompanyinfo()" id="btncompanyeditcancel">Cancel</button>
					</div>
				  <div class="panel-body">
				  	<h4><small>Address:</small> <div id="companyaddress">{{ $company->address}}</div></h4>
				  	<h4><small>Company Summary:</small><br>
				  		<div id="companysummary">
					  		@if(!$company->summary)
					  			This company has not updated its summary yet.
					  		@else
					  			{{ $company->summary }}
					  		@endif
					  	</div>
				  	</h4>
				  	<button type="button" class="btn btn-primary" style="visibility: hidden" id="btncompanyeditsave" onclick="companyeditsave()">Save</button>
				  </div>
				</div>
			@else
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4>Company Information</h4>
					</div>
				  <div class="panel-body">
				  	<h4><small>Address:</small> {{ $company->address}}</h4>
				  	<h4><small>Company Summary:</small><br>
				  		@if(!$company->summary)
				  			This company has not updated its summary yet.
				  		@else
				  			meron
				  		@endif
				  	</h4>
				  </div>
				</div>
			@endif
				
		</div>
	</div>
@stop