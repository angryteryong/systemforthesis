@extends('layouts/layout')

@section('title')
	Company Requests 
@stop

@section('companies')
@if(session('type') == 'superadmin')
	<div class="container-fluid">
	  <h2>Companies</h2>    
	  <table class="table table-hover">
	    <thead>
	      <tr>
	        <th>Company Name</th>
	        <th>Company Address</th>
	        <th>Email</th>
	        <th>Status</th>
	        <th>Action</th>
	      </tr>
	    </thead>
	    <tbody>
	    @foreach($companies as $c)
	      <tr>
	        <td>{{ $c->name }}</td>
	        <td>{{ $c->address }}</td>
	        <td>{{ $c->email }}</td>
	        <td>{{ $c->status }}</td>
	        @if($c->status == 'not approved')
	        	<td><button class="btn btn-primary btn-sm" onclick="approve({{$c->id}})">Approve</button></td>
	        @else
	        	<td><button class="btn btn-danger btn-sm" onclick="disapprove({{$c->id}})">Deactivate</button></td>
	        @endif
	      </tr>
	    @endforeach
	    </tbody>
	  </table>
	</div>
@else
	<h3 class="alert alert-danger text-center" style="width: 30%; margin:auto"><strong>ERROR! </strong>You are not an ADMIN</h3>
@endif
@stop