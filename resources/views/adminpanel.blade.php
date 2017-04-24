@extends('layouts/layout')

@section('title')
	ADMIN PANEL
@stop

@section('adminPanel')
	@if(session('type') == 'superadmin')
		<h3>pasok!</h3>
	@else
		<h3>You're not an admin.</h3>
	@endif
@stop