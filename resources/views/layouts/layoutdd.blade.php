<html lang='en'>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="/images/system_logo.png">
		<link rel='stylesheet' href='/css/w3.css'>
		<link rel='stylesheet' href='/css/bootstrap-3.3.7-dist/css/bootstrap.min.css'>
		<link rel='stylesheet' href='/css/bootstrap-3.3.7-dist/css/supernice.css'>
		<link rel='stylesheet' href='/css/ourbootstrap.css'>
		<link rel='stylesheet' href='/css/bootstrap-3.3.7-dist/css/custom.css'>
		<link rel='stylesheet' href='/css/sticky-footer.css'>
		<script src="/css/bootstrap-3.3.7-dist/jquery.min.js"></script>
		<script src="/css/bootstrap-3.3.7-dist/bootstrap.min.js"></script>
		<script type='text/javascript' src='/actions.js'></script>
		<script type="text/javascript" src='/js/validator.js'></script>
		<script type="text/javascript" src="/js/ajax.js"></script>
		<title>@yield('title')</title>
	</head>
	<body>
		<div class='container-fluid mainContainer'>
			<nav class="navbar navbar-default navbar-fixed-top" style="height: 51">
			    <div class="navbar-header col-sm-4">
		      <a class="navbar-brand" href="/"><span><image src='/images/system_logo.png' id="companyLogo"></span></a>
			    </div>
			@if(session('go') == 0)
			 	<ul class="nav navbar-nav navbar-right">
			      <li><a href="/register" style="margin-right: 30"><span class="glyphicon glyphicon-user"></span> Register Your Company</a></li>
			    </ul>
   			@else
   				<ul class="nav navbar-nav col-sm-4">
				    <form style="margin-top: 8px; " method="get" action="/search" id="searchForm">
				     {{ csrf_field() }}
					  <div class="input-group">
					    <input type="text" class="form-control" placeholder="Search student" name="q">
					    <div class="input-group-btn">
					      <button class="btn btn-default" type="submit" style="height: 34">
					    	<i class="glyphicon glyphicon-search"></i>
					      </button>
					    </div>
					  </div>
					</form>
				</ul>

			<div class="col-sm-4">
				@if(session('type') == 'student')
	   				<ul class="nav navbar-nav navbar-right" style="margin-right: 15">
	   				<li data-toggle="tooltip" title="Messages" data-placement="bottom"><a href="#" class="dropdown-toggle" data-toggle="dropdown" onclick="loadmessages()"><span class="badge" style="margin-top: -22px; background-color: #ff4c4c" id="studentmessagecount"></span> <span class="glyphicon glyphicon-comment" style="font-size: 20px"></span></a>
	   					<ul class="dropdown-menu" style="margin-top: -4px;max-height: 500px; overflow: auto; width: 500px;" id="mychats">
			
						</ul>
	   				</li>
					 	<li class="dropdown">
					        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span><image class='img-circle' src='/app/{{ session("photo") }}' width='34' height='34' style="margin-top: -9; margin-right: 5"></span> {{ session('username') }}
					        <span class="caret"></span></a>
					        <ul class="dropdown-menu">
					          <li><a href="/{{ session('username') }}"><span class="glyphicon glyphicon-user"></span> My Profile</a></li>
					           <li><a href="/editaccount"><span class="glyphicon glyphicon-wrench"></span> Edit Account</a></li>
					          <li><a href="#" onclick="logOut('{{ md5(md5(session('username'))) }}')"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
					        </ul>
					    </li>
		   			</ul>
	   			@elseif(session('type') == 'company')
	   				<ul class="nav navbar-nav navbar-right" style="margin-right: 15">
		   				<li data-toggle="tooltip" title="Messages"><a href="#" class="dropdown-toggle" data-toggle="dropdown" onclick="loadmessages()"><span class="badge" style="margin-top: -22px; background-color: #ff4c4c" id="studentmessagecount"></span> <span class="glyphicon glyphicon-comment" style="font-size: 20px"></span></a>
		   					<ul class="dropdown-menu" style="margin-top: -4px;max-height: 500px; overflow: auto; width: 500px;" id="mychats">
				
							</ul>
		   				</li>
					 	  <li class="dropdown">
					        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span><image class='img-circle' src='/app/{{ session("photo") }}' width='34' height='34' style="margin-top: -9; margin-right: 5"></span> {{ session('username') }}
					        <span class="caret"></span></a>
					        <ul class="dropdown-menu">
					        	<li><a href="/c/{{ session('username') }}"><span class="glyphicon glyphicon-th-large"></span> Company Profile</a></li>
					          <li><a href="/editaccount"><span class="glyphicon glyphicon-wrench"></span> Edit Account</a></li>
					          <li><a href="#" onclick="logOut('{{ md5(md5(session('username'))) }}')"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
					        </ul>
					      </li>
		   			</ul>
	   			@elseif(session('type') == 'schooladmin')
	   				<ul class="nav navbar-nav navbar-right" style="margin-right: 15">
					 	  <li class="dropdown">
					        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span><image class='img-circle' src='/app/{{ session("photo") }}' width='34' height='34' style="margin-top: -9; margin-right: 5"></span> {{ session('username') }}
					        <span class="caret"></span></a>
					        <ul class="dropdown-menu">
					          <li><a href="/editaccount"><span class="glyphicon glyphicon-wrench"></span> Edit Account</a></li>
					          <li><a href="#" onclick="logOut('{{ md5(md5(session('username'))) }}')"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
					        </ul>
					      </li>
		   			</ul>
		   		@else
		   			<ul class="nav navbar-nav navbar-right" style="margin-right: 15">
					 	  <li class="dropdown">
					        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> {{ session('username') }}
					        <span class="caret"></span></a>
					        <ul class="dropdown-menu">
					          <li><a href="/editaccount"><span class="glyphicon glyphicon-wrench"></span> Edit Account</a></li>
					          <li><a href="#" onclick="logOut('{{ md5(md5(session('username'))) }}')"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
					        </ul>
					      </li>
		   			</ul>
	   			@endif

   				@if(session('type') == 'schooladmin')
	   				<ul class="nav navbar-nav navbar-right" style="margin-right: 1;">
				      <li class="dropdown">
			        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Departments
			        <span class="caret"></span></a>
			        <ul class="dropdown-menu">
			          <li><a href="/departments/add"><span class="glyphicon glyphicon-plus-sign"></span></span> Add Departments</a></li>
			          <li><a href="/departments""><span class="glyphicon glyphicon-share-alt"></span> View Departments</a></li>
			        </ul>
			      </li>
				    </ul>

				@elseif(session('type') == 'departmentadmin')
					<ul class="nav navbar-nav navbar-right" style="margin-right: 1;">
				      <li class="dropdown">
			        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-cog"></span> Manage Students
			        <span class="caret"></span></a>
			        <ul class="dropdown-menu">
			          <li><a href="/students/add"><span class="glyphicon glyphicon-plus-sign"></span> Add Student</a></li>
			          <li><a href="/students/view"><span class="glyphicon glyphicon-share-alt"></span> View Students</a></li>
			        </ul>
			      </li>
				    </ul>
				@elseif(session('type') == 'superadmin')
					<ul class="nav navbar-nav navbar-right" style="margin-right: 1;">
				      <li class="dropdown">
			        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
			    @if(session('crequest') + session('crecommendations') != 0)
			        <span style="margin-top: -20px; background-color: #d9534f" class="badge">{{ session('crequests') + session('crecommendations') }}</span>
			    @else

			    @endif
			        <span class="glyphicon glyphicon-cog"></span> Admin Panel
			        <span class="caret"></span></a>
			        <ul class="dropdown-menu">
			          <li><a href="/adminpanel/schools/add">Add School</a></li>
			          <li><a href="/adminpanel/schools/view">View Schools</a></li>
			          <li><a href="/managecompanies">Manage Companies
			      	@if(session('crequest') != 0)
			           <span class="badge" style="background-color: #d9534f">{{ session('crequests') }}</span>
			        @else

			        @endif
			           </a></li>
			          <li><a href="/adminpanel/recommendations">Manage Recommendations
			        @if(session('crecommendations') != 0)
			          <span class="badge" style="background-color: #d9534f">{{ session('crecommendations') }}</span>
			        @else

			        @endif
			          </a></li>
			          <li><a href="/departments">View Departments</a></li>
			          <li><a href="/students/view">View Students</a></li>
			         </ul>
			      	</li>
				</ul>
				@else
					
   				@endif
	  
   				@endif
   				</div>
			</nav>
			<!-- CHAT MODAL NG STUDENT -->
				 <div id="chatModalStudent" class="modal" role="dialog">
			        <div class="modal-dialog modal-lg">
			          <div class="modal-content">
			              <div class="modal-header">
			              	<!-- <button type="button" class="btn btn-danger pull-left btn-sm">Delete Conversation</button> -->
			                <button type="button" class="close" data-dismiss="modal">&times;</button>
			                <h4 class="modal-title text-center" id="chatCompanyName"></h4>
			              </div>
			              <div class="modal-body" id="chatcontentsStudent" style="max-height: 350px; overflow: auto;">
			               	
			              </div><a href="#" id="scrollStudentChatstoBottom" class="btn btn-primary btn-sm" onclick="scrolltobottom2()"><span class="glyphicon glyphicon-menu-down"></span> Back to Bottom</a>
			              <div class="modal-footer">
			                  <div class="form-group col-sm-11">
			                    <textarea class="form-control" id="chatbodyStudent" style="width: 100%; resize: none;" onkeypress="return sendclick(event)"></textarea>
			                  </div>
			                  <button type="button" class="btn btn-primary col-sm-1" id="btnSendChatStudent" onclick="studentsendchat()">Send</button>
			                  <!-- should IF this one later on -->
			              </div>
			            </div>
			        </div>
			      </div>
			<!-- CHAT MODAL NG STUDENT END -->

			 <!-- CHAT MODAL START -->
      <div id="chatModal" class="modal" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
              	<!-- <button type="button" class="btn btn-danger pull-left btn-sm" data-toggle="modal" data-target="#deleteConvo">Delete Conversation</button> -->
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center" id="chatStudentName"></h4>
              </div>
              <div class="modal-body" id="chatcontents" style="max-height: 350px; overflow: auto;">

              </div>
              <a href="#" id="scrollCompanyChatstoBottom" class="btn btn-primary btn-sm" onclick="scrolltobottom()"><span class="glyphicon glyphicon-menu-down"></span> Back to Bottom</a>
              <div class="modal-footer">
                  <div class="form-group col-sm-11">
                    <textarea class="form-control" id="chatbody" style="width: 100%; resize: none;" onkeydown="return sendclick2(event, '{{ session('id') }}')"></textarea>
                  </div>
                  <button type="button" class="btn btn-primary col-sm-1" id="btnSendChat" onclick="sendchat('{{session('id')}}')">Send</button>
                  <!-- should IF this one later on -->
              </div>
            </div>
        </div>
      </div>
    <div id="deleteConvo" class="modal deletemodals fade" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Confirmation</h4>
	      </div>
	      <div class="modal-body">
	        <p>Are you sure you want to delete this conversation?</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="deletestudentconvo()">Yes</button>
	        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
	      </div>
	    </div>
	  </div>
	</div>
    <!-- CHAT MODAL END -->
			<br><br><br>
			@if(session('alert') && session('prompt'))
			<div class="{{ session('alert') }} text-center"><strong>WARNING! </strong>{{ session('prompt') }}</div>
			@else

			@endif

			@yield('adminPanel')
			@yield('homepage')
			@yield('studentProfile')
			@yield('addDepartment')
			@yield('studentList')
			@yield('departments')
			@yield('viewStudents')
			@yield('departmentslist')
			@yield('addStudent')
			@yield('loginForm')
			@yield('registerForm')
			@yield('editProfile')
			@yield('test')
			@yield('searchresults')
			@yield('companies')
			@yield('editaccountschool')
			@yield('editaccountdept')
			@yield('editaccountsuperadmin')
			@yield('editaccountcompany')
			@yield('editaccountstudent')
			@yield('viewschools')
			@yield('recommendations')
			@yield('viewcompany')
			</div>
		</div>
		<footer class="footer">
		  <p id='myFooter' style="color: white">Lyceum-Northwestern University <span class="glyphicon glyphicon-option-vertical"></span> Dagupan City, Pangasinan</p>
		</footer>
	</body>
</html>