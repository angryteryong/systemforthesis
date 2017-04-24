@extends('layouts/layout')

@section('title')
	Job Placement System for Dagupan City - Departments
@stop

@section('departments')
@if(session('type') == 'schooladmin' || session('type') == 'superadmin')
<div class=""></div>
<h2>Departments</h2>
             
  <table class="table table-hover">
  
    <thead>
      <tr>
        <th>Department Name</th>
        <th>Admin's Username</th>
        <th>Password</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    @foreach($d as $depts)
      <tr>
        <td>{{ $depts->name }}</td>
        <td>{{ $depts->username }}</td>
        <td>{{ substr_replace($depts->password, "********", 0) }}</td>
        <td>
          <div class="btn-group">
            <button type="button" class="btn btn-primary btn-sm" id="editDept" data-toggle="modal" data-target="#editDepartment" onclick="editDepartment('{{ $depts->name }}','{{ $depts->username }}','{{ $depts->password }}','{{ $depts->id }}')"><span class="glyphicon glyphicon-pencil"></span> Edit</button> 
            <button type="button" class="btn btn-danger btn-sm" id="deleteDept" data-toggle="modal" data-target="#deleteDepartment" onclick="deleteDepartment('{{ $depts->id }}')"><span class="glyphicon glyphicon-trash"></span> Delete</button> 
          </div>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  <!-- MODAL EDIT DEPARTMENT -->
  <div class="modal fade" id="editDepartment" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Department</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="" id="updateForm" data-toggle="validator" role="form">
            {{ csrf_field() }}
            {{ method_field('patch') }}
            <div class="form-group">
              <label for="name">Department Name:</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
              <label for="username">Department Admin's Username:</label>
              <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
              <label for="password">Department Admin's Password:</label>
              <input type="password" class="form-control" id="password" name="password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>
            </div>
            <div class="form-group">
              <label for="password2">Re-enter Department Admin's Password:</label>
              <input type="password" class="form-control" id="password2" data-match="#password" required>
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
  <!-- MODAL EDIT DEPARTMENT END -->

    <!-- MODEL DELETE DEPARTMENT -->
  <div class="modal fade" id="deleteDepartment" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Confirmation</h4>
        </div>
        <div class="modal-body">
          <h3><p>Are you sure you want to delete this department?</p></h3>
          <form method="post" action="" id="deleteForm">
          {{ method_field('DELETE') }}
          {{ csrf_field() }}
          <input type="hidden" name="id" id="idToDelete">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger">Yes</button>
        </form>
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        </div>
      </div>
    </div>
  </div>
  <!-- MODAL DELETE DEPARTMENT END -->
@else
  ERROR
@endif
@stop