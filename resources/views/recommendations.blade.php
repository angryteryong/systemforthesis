@extends('layouts/layout')

@section('title')
	Recommendations - Admin Panel
@stop

@section('recommendations')
	@if(session('type') == 'superadmin')
	<div class="container-fluid">
	  <h2>Recommendations</h2>   
	  <table class="table table-hover">
	    <thead>
	      <tr>
	        <th>From</th>
	        <th>To</th>
	        <th>Content</th>
	        <th>Action</th>
	      </tr>
	    </thead>
	    <tbody>
	    @foreach($recs as $rec)
	    	@if($rec->recommender_type == 'company')
	    		<tr>
			        <td>{{ $c->where('id', $rec->recommender_id)->first()->name }}</td>
			        <td>{{ $st->where('id', $rec->student_id)->first()->firstname }} {{ $st->where('id', $rec->student_id)->first()->middlename }} {{ $st->where('id', $rec->student_id)->first()->lastname }}</td>
			        <td style="max-width: 320px">{{ $rec->body }}</td>
			        <td>
			        	@if($rec->status == 'Approved')
			        		<div class="btn-group">
							  <button type="button" class="btn btn-info" onclick="undoapprove({{ $rec->id }})">Undo Approve</button>
							  <button type="button" class="btn btn-danger" onclick="rejectrec({{ $rec->id }})">Delete</button>
							</div>
			        	@else
			        		<div class="btn-group">
							  <button type="button" class="btn btn-primary" onclick="approverec({{ $rec->id }})">Approve</button>
							  <button type="button" class="btn btn-danger" onclick="rejectrec({{ $rec->id }})">Reject</button>
							</div>
			        	@endif
			        </td>
			    </tr>
	    	@elseif($rec->recommender_type == 'student')
	    		<tr>
			        <td>{{ $st->where('id', $rec->recommender_id)->first()->firstname }} {{ $st->where('id', $rec->recommender_id)->first()->middlename }} {{ $st->where('id', $rec->recommender_id)->first()->lastname }}</td>
			        <td>{{ $st->where('id', $rec->student_id)->first()->firstname }} {{ $st->where('id', $rec->student_id)->first()->middlename }} {{ $st->where('id', $rec->student_id)->first()->lastname }}</td>
			        <td style="max-width: 320px">{{ $rec->body }}</td>
			        <td>
			        	@if($rec->status == 'Approved')
			        		<div class="btn-group">
							  <button type="button" class="btn btn-info" onclick="undoapprove({{ $rec->id }})">Undo Approve</button>
							  <button type="button" class="btn btn-danger" onclick="rejectrec({{ $rec->id }})">Delete</button>
							</div>
			        	@else
			        		<div class="btn-group">
							  <button type="button" class="btn btn-primary" onclick="approverec({{ $rec->id }})">Approve</button>
							  <button type="button" class="btn btn-danger" onclick="rejectrec({{ $rec->id }})">Reject</button>
							</div>
			        	@endif
			        </td>
			    </tr>
	    	@elseif($rec->recommender_type == 'departmentadmin')
	    		<tr>
			        <td>{{ $dept->where('id', $rec->recommender_id)->first()->name }}</td>
			        <td>{{ $st->where('id', $rec->student_id)->first()->firstname }} {{ $st->where('id', $rec->student_id)->first()->middlename }} {{ $st->where('id', $rec->student_id)->first()->lastname }}</td>
			        <td style="max-width: 320px">{{ $rec->body }}</td>
			        <td>
			        	@if($rec->status == 'Approved')
			        		<div class="btn-group">
							  <button type="button" class="btn btn-info" onclick="undoapprove({{ $rec->id }})">Undo Approve</button>
							  <button type="button" class="btn btn-danger" onclick="rejectrec({{ $rec->id }})">Delete</button>
							</div>
			        	@else
			        		<div class="btn-group">
							  <button type="button" class="btn btn-primary" onclick="approverec({{ $rec->id }})">Approve</button>
							  <button type="button" class="btn btn-danger" onclick="rejectrec({{ $rec->id }})">Reject</button>
							</div>
			        	@endif
			        </td>
			    </tr>
	    	@elseif($rec->recommender_type == 'schooladmin')
	    		<tr>
			        <td>{{ $sc->where('id', $rec->recommender_id)->first()->name }}</td>
			        <td>{{ $st->where('id', $rec->student_id)->first()->firstname }} {{ $st->where('id', $rec->student_id)->first()->middlename }} {{ $st->where('id', $rec->student_id)->first()->lastname }}</td>
			        <td style="max-width: 320px">{{ $rec->body }}</td>
			        <td>
			        	@if($rec->status == 'Approved')
			        		<div class="btn-group">
							  <button type="button" class="btn btn-info" onclick="undoapprove({{ $rec->id }})">Undo Approve</button>
							  <button type="button" class="btn btn-danger" onclick="rejectrec({{ $rec->id }})">Delete</button>
							</div>
			        	@else
			        		<div class="btn-group">
							  <button type="button" class="btn btn-primary" onclick="approverec({{ $rec->id }})">Approve</button>
							  <button type="button" class="btn btn-danger" onclick="rejectrec({{ $rec->id }})">Reject</button>
							</div>
			        	@endif
			        </td>
			    </tr>
	    	@else
	    		<tr>
			        <td>{{ $sa->where('id', $rec->recommender_id)->first()->username }}</td>
			        <td>{{ $st->where('id', $rec->student_id)->first()->firstname }} {{ $st->where('id', $rec->student_id)->first()->middlename }} {{ $st->where('id', $rec->student_id)->first()->lastname }}</td>
			        <td style="max-width: 320px">{{ $rec->body }}</td>
			        <td>
			        	@if($rec->status == 'Approved')
			        		<div class="btn-group">
							  <button type="button" class="btn btn-info" onclick="undoapprove({{ $rec->id }})">Undo Approve</button>
							  <button type="button" class="btn btn-danger" onclick="rejectrec({{ $rec->id }})">Delete</button>
							</div>
			        	@else
			        		<div class="btn-group">
							  <button type="button" class="btn btn-primary" onclick="approverec({{ $rec->id }})">Approve</button>
							  <button type="button" class="btn btn-danger" onclick="rejectrec({{ $rec->id }})">Reject</button>
							</div>
			        	@endif
			        </td>
			    </tr>
	    	@endif
	    @endforeach
	    </tbody>
	  </table>
	</div>
	@else
		<h3 class="alert alert-danger text-center" style="width: 30%; margin:auto"><strong>ERROR! </strong>You are not an ADMIN</h3>
	@endif
@stop