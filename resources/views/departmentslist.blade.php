@extends('layouts/layout')

@section('title')
	Job Placement System for Dagupan City - Departments
@stop

@section('departmentslist')
<h2 class='text-center'>{{ $schoolName->name }}'s Departments</h2>

 <div class="list-group" style="text-align: center">
	@foreach($depts as $dept)
	  <a href="departments/{{ $dept->id }}/students" class="list-group-item">{{ $dept->name }}</a>
	@endforeach
</div>

@stop