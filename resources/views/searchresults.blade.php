@extends('layouts/layout')

@section('title')
	Graduates Job Placement System - Students
@stop

@section('searchresults')
	<div class="container-fluid">
  @if(count($students) == 0)
      No results found.
  @else
     {{ count($students) }} student(s) found.
  @endif
 
  <h2>Students</h2>          
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Status</th>
        <th>Name</th>
        <th>Course</th>
        <th>Department</th>
        <th>School</th>
      </tr>
    </thead>
    <tbody>
    	@foreach($students as $student)
	      <tr>
          <td>
            @if($student->status == 'Hired')
              <font class="alert-success">{{ $student->status }}</font>
            @else
              <font class="alert-warning">{{ $student->status }}</font>
            @endif
          </td>
	        <td><a href="/{{ $student->username }}"> {{ $student->lastname }}, {{ $student->firstname }} {{ $student->middlename }}</a></td>
	        <td>{{ $student->course }}</td>
          <td>{{ $d->where('id', $student->department_admin_id)->first()->name }}</td>
          <td>{{ $sc->where('id', $d->where('id', $student->department_admin_id)->first()->school_admin_id)->first()->name }}</td>
	      </tr>
      	@endforeach
    </tbody>
  </table>

</div>
@stop