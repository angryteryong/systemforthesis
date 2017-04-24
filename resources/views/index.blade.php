@extends('layouts/layout')

@section('title')
	Job Placement System for Dagupan City
@stop

@section('homepage')
  	<div class="row content">

	    <div class="container-fluid bg-3 text-center">    
			<h3><b>Schools and Universities</h3></b>
				<div class="row">
				@foreach($schools as $school)
					<div class="col-sm-3" style="margin-top: 0px;">
						<a href="school/{{ $school->id }}/departments">
						    <img src="app/{{ $school->photo }}" class="img-responsive img-thumbnail schoolImage" height="200" style="padding: 6px; object-fit: contain; height: 200px" alt="image">
						     <h4>{{ $school->name }}</h4>
						</a>
					</div>
				@endforeach
				</div>
		</div>
  	</div>
@stop