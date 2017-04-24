@extends('layouts/layout')

@section('title')
	Graduates Job Placement System - Students
@stop

@section('studentList')
	<div class="container">
  <h2>Students</h2>          
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>Course</th>
        <th>Department</th>
      </tr>
    </thead>
    <tbody>
    	@foreach($students as $student)
	      <tr>
	        <td><a href="/{{ $student->username }}"> {{ $student->lastname }}, {{ $student->firstname }} {{ $student->middlename }}</a></td>
	        <td>{{ $student->course }}</td>
	        <td>{{ $department->name }}</td>
	      </tr>
      	@endforeach
    </tbody>
  </table>
  {{ $students->links() }}
</div>
@stop