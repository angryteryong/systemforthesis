@extends('layouts/layout')

@section('title')
	Edit Profile - Job Placement System for Dagupan City
@stop

@section('editProfile')
	<div class="container-fluid" style="margin: auto;
	  		width: 80%;">
		<h4>Edit Profile</h4>
		<form method="post" action="editprofile" class="form-group">
			<div class="panel-group" >
				<div class="panel panel-info infoPanelAll2">
		          <div class="panel-heading"><h4><span class="glyphicon glyphicon-list-alt"></span> Summary</h4></div>
		          <h4 class="pull-right timeUpdated"><small></small></h4>
		          <div class="panel-body infoPanels">
		          	<div class="form-group">
			          	<label>Tell them about yourself. Amaze them!!!</label>
			            <textarea name="txtSummary" placeholder="" class="form-control" rows="5"></textarea>
		            </div>
		            <button class="btn btn-primary" type="button" id="btnSummarySave" onclick="saveSummary()">Save</button>
		            <span class="alert-info" id="summarySave"></span>
		          </div>

		        </div>

		        <div class="panel panel-success infoPanelAll2">
		          <div class="panel-heading"><h4><span class="glyphicon glyphicon-tasks"></span> Experiences</h4></div>
		          <h4 class="pull-right timeUpdated"><small></small></h4>
		          <div class="panel-body infoPanels">
		         	<div class="form-group">
		            	<label for="companyname">Company Name:</label>
		            	<input type="text" class="form-control input-lg" id="companyname"></input>
		            </div>
		            <div class="form-group">
		            	<label for="position">Position:</label>
		            	<input type="text" class="form-control inputdefault" id="position"></input>
		            </div>
		            <div class="form-group">
		            	<label for="expAll">Year:</label>
		            	<select class="form-control input-sm" id="sel1" style="width:100">
							<option>2016</option>
							<option>2015</option>
							<option>2014</option>
						</select>
					<span class="pull-left" style="margin-top: -25; margin-left: 110;">to</span>
						<select class="form-control input-sm" id="sel1" style="width:100; margin-left: 131; margin-top: -30">
							<option>Present</option>
							<option>2016</option>
							<option>2015</option>
							<option>2014</option>
						</select>
		            </div>
		            <div class="form-group">
		            	<label for="position">Address:</label>
		            	<input type="text" class="form-control inputdefault" id="position"></input>
		            </div>
		            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#newExperience">Add Another Experience</button>
					  <div id="newExperience" class="collapse">
					  		<br>
							<div class="form-group">
				            	<label for="companyname">Company Name:</label>
				            	<input type="text" class="form-control input-lg" id="companyname"></input>
				            </div>
				            <div class="form-group">
				            	<label for="position">Position:</label>
				            	<input type="text" class="form-control inputdefault" id="position"></input>
				            </div>
				            <div class="form-group">
				            	<label for="expAll">Year:</label>
				            	<select class="form-control input-sm" id="sel1" style="width:100">
									<option>2016</option>
									<option>2015</option>
									<option>2014</option>
								</select>
							<span class="pull-left" style="margin-top: -25; margin-left: 110;">to</span>
								<select class="form-control input-sm" id="sel1" style="width:100; margin-left: 131; margin-top: -30">
									<option>Present</option>
									<option>2016</option>
									<option>2015</option>
									<option>2014</option>
								</select>
				            </div>
				            <div class="form-group">
				            	<label for="position">Address:</label>
				            	<input type="text" class="form-control inputdefault" id="position"></input>
				            </div>
					  </div>
		          </div>
		        </div>

		        <div class="panel panel-danger infoPanelAll2">
		          <div class="panel-heading"><h4><span class="glyphicon glyphicon-star"></span> Skills</h4></div>
		          <h4 class="pull-right timeUpdated"><small></small></h4>
		          <div class="panel-body infoPanels">
		       		<div class="form-group">
				        <label for="position">Skill Name:</label>
				        <input type="text" class="form-control input-lg" id="position"></input>
				    </div>
				    <div class="form-group">
				        <label for="position">Percent:</label>
				        <input type="text" class="form-control input-sm" id="position" style="width: 100"></input>
				    </div>
				    <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#skill">Add Another Skill</button>
					  <div id="skill" class="collapse">
						<div class="form-group">
					        <label for="position">Skill Name:</label>
					        <input type="text" class="form-control input-lg" id="position"></input>
				      	</div>
					    <div class="form-group">
					        <label for="position">Percent:</label>
					        <input type="text" class="form-control input-sm" id="position" style="width: 100"></input>
					    </div>
					  </div>
		          </div>
		        </div>

		        <div class="panel panel-warning infoPanelAll2">
		          <div class="panel-heading"><h4><span class="glyphicon glyphicon-education"></span> Education</h4></div>
		          <h4 class="pull-right timeUpdated"><small></small></h4>
		          <div class="panel-body infoPanels">
		            <p>Not updated yet.</p>
		          </div>
		        </div>
	        </div>
	        <button class="btn btn-primary">Save Changes</button>
        </form>
	</div>
	<br><br>
@stop