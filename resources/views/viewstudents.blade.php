@extends('layouts/layout')

@section('title')
	Job Placement System for Dagupan City - Students
@stop

@section('viewStudents')
@if(session('type') == 'departmentadmin' || session('type') == 'superadmin')
<h2>Students</h2>  
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Student ID</th>
        <th>Username</th>
        <th>Password</th>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Photo</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    @foreach($students as $student)
      <tr>
        <td>{{ $student->studentid }}</td>
        <td>{{ $student->username }}</td>
        <td style="width: 180px" onmouseover="showShowPassword('{{ $student->id }}', '{{ $student->password }}')" onmouseleave="hideShowPassword('{{ $student->id }}')"><font id="stpasswordvalue{{ $student->id }}"> ********</font> <button class="btn btn-sm" id="btnshowpassword{{ $student->id }}" onclick="showPassword('{{ $student->id }}', '{{ $student->password }}')" style="display: none;"><span class="glyphicon glyphicon-eye-open"></span></button>
        <button class="btn btn-sm" id="btnhidepassword{{ $student->id }}" onclick="hidePassword('{{ $student->id }}', '{{ $student->password }}')" style="display: none;"><span class="glyphicon glyphicon-eye-close"></span></button>
        </td>
        <td>{{ $student->lastname }}</td>
        <td>{{ $student->firstname }}</td>
        <td>{{ $student->middlename }}</td>
        <td>{{ $student->course }}</td>
        <td><image class="img-rounded" width="50" height="50" src="/app/{{ $student->photo }}"></td>
        <td>
          <div class="btn-group">
            <button type="button" class="btn btn-primary btn-sm" id="btneditStudent" data-toggle="modal" data-target="#editStudent" onclick="editStudent('{{ $student->lastname }}','{{ $student->firstname }}','{{ $student->middlename }}','{{ $student->course }}', '{{ $student->studentid }}', '{{ $student->password }}', '{{ $student->id }}', '{{ $student->photo }}')"><span class="glyphicon glyphicon-pencil"></span> Edit</button> 
            <button type="button" class="btn btn-danger btn-sm" id="btndeleteStudent" data-toggle="modal" data-target="#deleteStudent" onclick="deleteStudent('{{ $student->id }}')"><span class="glyphicon glyphicon-trash"></span> Delete</button> 
          </div>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  <!-- MODEL EDIT STUDENT -->
  <div class="modal fade" id="editStudent" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Student</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" method="post" action="" id="studentUpdateForm" enctype="multipart/form-data" data-toggle="validator" role="form">
           {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <input type="hidden" id="studentIDToUpdate" name="studentIDToUpdate">
            <div class="form-group">
              <label class="control-label col-sm-2" for="stlastname">Last Name:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="stlastname" name="lastname">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="stfirstname">First Name:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="stfirstname" name="firstname">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="stmiddlename">Middle Name:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="stmiddlename" name="middlename">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="stcourse">Course:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="stcourse" name="course">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="ststudentid">Student ID:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="ststudentid" name="studentid">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="stpassword">Password:</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="stpassword" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" name="password">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="stpassword2">Re-enter Password:</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="stpassword2" data-match="#stpassword">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="stphoto">Photo:</label>
              <div class="col-sm-10">
                <label for="stPhotoUpdate"><image id="stphoto" width="100" height="100"></label>
                <input type="file" id="stPhotoUpdate" name="photo">
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save</button>
          </form>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- MODAL EDIT STUDENT END -->

    <!-- MODEL DELETE STUDENT -->
  <div class="modal fade" id="deleteStudent" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Confirmation</h4>
        </div>
        <div class="modal-body">
          <h4><p>Are you sure you want to delete this student?</p></h4>
          <form method="post" action="" id="studentDeleteForm">
          {{ method_field('DELETE') }}
          {{ csrf_field() }}
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger">Yes</button></form>
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        </div>
      </div>
    </div>
  </div>
  <!-- MODAL DELETE STUDENT END -->
@else
  ERROR
@endif
@stop