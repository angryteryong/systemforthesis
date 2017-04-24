@extends('layouts/layout')

@section('title')
	Admin Panel - View Schools
@stop

@section('viewschools')
	@if(session('type') == 'superadmin')
		<div class="container-fluid">
		  <h2>Schools</h2>       
		  <table class="table table-hover">
		    <thead>
		      <tr>
		        <th>Name</th>
		        <th>Username</th>
		        <th>Actions</th>
		      </tr>
		    </thead>
		    <tbody>
		    @foreach($schools as $school)
		      <tr>
		        <td>{{ $school->name }}</td>
		        <td>{{ $school->username }}</td>
		        <td><button class="btn btn-danger btn-sm" onclick="deleteschool({{ $school->id }})">Delete</button></td>
		      </tr>
		    @endforeach
		    </tbody>
		  </table>
		</div>
	@else
		<h3 class="alert alert-danger text-center" style="width: 30%; margin:auto"><strong>ERROR! </strong>You are not an ADMIN</h3>
	@endif
@stop