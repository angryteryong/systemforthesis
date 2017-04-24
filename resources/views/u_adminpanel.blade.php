@extends('layouts/layout')

@section('title')
	Job Placement System for Dagupan City
@stop

@section('homepage')
  	<div class="row content">
	    <div class="col-sm-3 sidenav">
	    <div class="input-group">	    
	      </div>
	      <h4>ADMIN PANEL (University)</h4>
	      <ul class="nav nav-pills nav-stacked">
	      	<li><a href="#section3">Check Verification Requests</a></li>
	        <li><a href="#section1">View Department Accounts</a></li>
	        <li><a href="#section2">Add Department Accounts</a></li>
	        <li><a href="#section3">View Students</a></li>
			<li><a href="#section3">Add Students</a></li>

	        <!-- collapsing  -->
			  <li class="panel-group">
			    <div class="panel panel-default">
			      <div class="panel-heading">
			        <h4 class="panel-title">
			          <a data-toggle="collapse" href="#collapse1" class='active'>Wasak</a>
			        </h4>
			      </div>
			      <div id="collapse1" class="panel-collapse collapse">
			        <div class="panel-body">Panel Body</div>
			        <div class="panel-footer">Panel Footer</div>
			      </div>
			    </div>
			  </li>
		  <!-- collapsing  -->

	      </ul><br>
	      
    </div>

    <div class="col-sm-9">
      <h4><small>STUDENT PROFILE</small></h4>
      <hr>
      <img src="cinqueterre.jpg" class="img-responsive img-thumbnail pull-right" alt="Picture niya!" width="274" height="206">
      <h2>STUDENT NAME</h2>

      <h5><span class="glyphicon glyphicon-list-alt"></span> Course, Department, University, Date.</h5>
      <h5><span class="label label-danger">Ewan</span> <span class="label label-primary">Ewan kung para saan pa to</span></h5><br>
      <p>Student's description. Dito yung mga info such as academic records, blah blah blah<br>dasdasdasdsaddasdasdasdasdasdsadsadasd<br>asdasdfkjxhvjkcxnvjfhasdhbzjkfbkjvbxcjkvhxcvhxkjc<br>sasaifhjkchxjkvhcxkjvcxjkvxchkjvhzlkdasjudasoich<br>asdsajlcxhjcjlkxzhcvzxkjcvhxzljcvhk<br>asdasdfkjxhvjkcxnvjfhasdhbzjkfbkjvbxcjkvhxcvhxkjc<br>sasaifhjkchxjkvhcxkjvcxjkvxchkjvhzlkdasjudasoich<br>asdsajlcxhjcjlkxzhcvzxkjcvhxzljcvhk</p>
      

      <hr>
      <h3>Photos</h3>
      	<p>askjfdhskfjhdjkvhxjkvhzjkxchsuivhcxkjvhziuvhcxkjvxhfvkjc</p>
      <hr>
      <h3>Others</h3>
      	<p>sflsdjfkdshvnkdjhvkjcvnbbhjcknbv cxkjvhxckjvbxckjvhjck</p>
      <hr>
      <h4>Leave a Comment (Ewan kung kelangan pa to):</h4>
      <form role="form">
        <div class="form-group">
          <textarea class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <br><br>
      
      <p><span class="badge">2</span> Comments:</p><br>
      
      <div class="row">
        <div class="col-sm-2 text-center">
	        <img src="bandmember.jpg" class="img-circle" height="65" width="65" alt="Avatar">
	        </div>
	        <div class="col-sm-10">
	          <h4>Anja <small>Sep 29, 2015, 9:12 PM</small></h4>
	          <p>Magaling magaling magaling!</p>
	          <br>
	        </div>
	        <div class="col-sm-2 text-center">
	          <img src="bird.jpg" class="img-circle" height="65" width="65" alt="Avatar">
	        </div>
	        <div class="col-sm-10">
	          <h4>John Row <small>Sep 25, 2015, 8:25 PM</small></h4>
	          <p>Pwede na rin siguro.</p>
	          <br>
	          <p><span class="badge">1</span> Reply:</p><br>
	          <div class="row">
	          <div class="col-sm-2 text-center">
	            <img src="bird.jpg" class="img-circle" height="65" width="65" alt="Avatar">
	          </div>
	            <div class="col-xs-10">
	              <h4>Nested Bro <small>Sep 25, 2015, 8:28 PM</small></h4>
	              <p>haha putangina</p>
	              <br>
	            </div>
	        </div>
        </div>
      </div>
    </div>
  </div>
@stop