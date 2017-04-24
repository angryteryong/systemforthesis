<div class="container-fluid">
  <div class="{{ session('recommendationAlertType') }}" style="width: 50%; margin: auto">{{ session('recommendationAlert') }}</div>
  <div class="row content">
    <div class="col-sm-3 sidenav" style="background-color: #f5f5f5;">
    <h4 class="stStatus">Status: <strong>
    <select id="statusSelect" style="display: none;">
      <option style="color: red;">Looking for Job</option>
      <option style="color: green;">Hired</option>
    </select>
    <font id="sStatus">{{ $student->status }}</font></strong></h4>
    @if($student->username == session('username'))
    <button class="btn btn-default pull-right btn-sm" id="btnEditInfo" onclick="editInfo()"><span class="glyphicon glyphicon-pencil"></span> Edit</button>
    @else
    @endif
      <div class="panel panel-primary leftPanel infoPanelAll">
      <div class="panel-heading"><h4>{{ ucfirst($student->firstname) }} {{ ucfirst($student->middlename) }} {{ ucfirst($student->lastname) }}</h4>
      </div>
      <div class="panel-body">
      @if($student->username == session('username'))
        <div class="myImage">
          <img src="/app/{{ $student->photo }}" class="img-rounded img-responsive stPhoto myPP" alt="Alumnus' Picture" name="photo" id="sPhoto">
          <div class="overlay">
            <div class="imageText">
            <form method="post" action="/updatephoto/{{ session('id') }}" enctype="multipart/form-data">
              {{ csrf_field() }}
              {{ method_field('PATCH') }}
              <label class="btn btn-info btn-file">
                Change Profile Picture <input type="file" onchange="readURL(this);" style="display: none;" name="newphoto">
            </label>
              <button type="submit" id="upPhoto" hidden>Submit Photo</button>
            </form>
            </div>
          </div>
        </div>
        <br>
      @else
          <img src="/app/{{ $student->photo }}" class="img-rounded img-responsive stPhoto" alt="Alumnus' Picture">
        <br>
      @endif
      

       <!-- LEFT COLUMN -->
        <ul class="nav nav-pills nav-stacked">
          <li><h4><span class="glyphicon glyphicon-folder-close"></span> {{ ucfirst($student->course) }}</h4></li>
          <li><h4><span class="glyphicon glyphicon-home"></span> <font id="spAddress">{{ $student->address }}</font></h4></li>
          @if($student->email)
          <li><h4><span class="glyphicon glyphicon-envelope"></span> <font id="spEmail">{{ $student->email }}</font></h4></li>
          @endif
          <li><h4><span class="glyphicon glyphicon-phone"></span><font id="spNumber"> {{ $student->phone_number }}</font></h4></li>
        </ul>
        <button class="btn btn-primary btn-sm" id="spProfileSave" onclick="profileSave({{ session('id') }})">Save</button>
        <button class="btn btn-default btn-sm" id="spProfileSaveCancel" onclick="profileSaveCancel()">Cancel</button>
        @if(count($interests) < 1)
          <!-- WALA -->
          @else
            <hr class="separator">
            <h3><span class="glyphicon glyphicon-road"></span> <strong>Interests</strong></h3>
            <ul class="nav nav-pills nav-stacked">
          @foreach($interests as $interest)
            <li>{{ $interest->interest }}</li>
          @endforeach
          </ul>
        @endif
        <br>
      </div>
      </div>
    </div>
           <!-- LEFT COLUMN END-->
    <div class="col-sm-9">
    <h3 class="alProfile"><small>Alumnus' Profile</small></h3>
    @if(session('type') == 'company')
      <button class="btn btn-primary pull-right pull-top btn-sm" style="margin-top: -35px; margin-right: 0px" data-toggle="modal" data-target="#chatModal" onclick="loadstudentchat('{{ $student->id }}', '{{ $student->firstname }} {{ $student->middlename }} {{ $student->lastname }}')"><span class="glyphicon glyphicon-envelope"></span> Message this Person</button>
    @else

    @endif

    <!-- CHAT MODAL START -->
      <div id="chatModal" class="modal" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                <!-- <button type="button" class="btn btn-danger pull-left btn-sm">Delete Conversation</button> -->
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
                  <button type="button" class="btn btn-primary col-sm-1" id="btnSendChat" onclick="sendchat('{{session('id')}}', '{{$student->id}}')">Send</button>
                  <!-- should IF this one later on -->
              </div>
            </div>
        </div>
      </div>
    <!-- CHAT MODAL END -->

      @if(count($student->summary) < 1)
        <div class="panel panel-info infoPanelAll">
          <div class="panel-heading"><h2><span class="glyphicon glyphicon-list-alt"></span> Summary</h2></div>
          <h4 class="pull-right timeUpdated"><small></small></h4>
          <div class="panel-body infoPanels">
            <p>Not updated yet.</p>
          </div>
        </div>
      @else
      <div class="panel panel-info infoPanelAll">
        <div class="panel-heading"><h2><span class="glyphicon glyphicon-list-alt"></span> Summary</h2></div>
        @if($student->username == session('username'))
        <button class="btn btn-default btnEdits pull-right btn-sm" id="btnEditSummary" onclick="editSummary()"><span class="glyphicon glyphicon-pencil"></span>  Edit</button>
        @else
        @endif
        <h4 class="pull-right timeUpdated"><small>Last Updated at: {{ $student->updated_at }}</small></h4>
        <div class="panel-body infoPanels">
          <div class="form-group">
            <p id="spSummary">{{ $student->summary }}</p>
          </div>
          <button class="btn btn-primary btn-sm" id="spSummarySave" onclick="saveSummary({{ session('id') }})">Save</button>
          <button class="btn btn-default btn-sm" id="spSummarySaveCancel"onclick="saveSummaryCancel()">Cancel</button>
        </div>
      </div>
      @endif

      @if(count($exp) < 1)
        <div class="panel panel-info infoPanelAll">
        <div class="panel-heading"><h2><span class="glyphicon glyphicon-tasks"></span> Experiences</h2></div>
        @if($student->username == session('username'))
        <button class="btn btn-default btnEdits pull-right btn-sm" id="btnEditExperiences" onclick="editExperiences()"><span class="glyphicon glyphicon-pencil"></span>  Edit</button>
        @else
        @endif
        <h4 class="pull-right timeUpdated"><small>Last Updated at: NULL</small></h4>
        <div class="panel-body infoPanels">
          <h3 id="comName">Company Name</h3>
          <h4 id="comPosition">Company Position</h4>
          <h5 id="comDate">2000 to 2017</h5>
          <h5 id="comAddress">Company Address</h5>
          <h3><small>Job Descriptions and Skills Learned:</small></h3>
          <h5 id="comDescription">Describe here</h5>
          <button class="btn btn-primary btn-sm" id="spExperienceSave" onclick="saveExperience('{{ session('id') }}')">Save</button>
          <button class="btn btn-default btn-sm" id="spExperienceSaveCancel"onclick="saveExperienceCancel()">Cancel</button>
        </div>
      </div>   
      @else
      <div class="panel panel-info infoPanelAll">
        <div class="panel-heading"><h2><span class="glyphicon glyphicon-tasks"></span> Experiences</h2></div>
        @if($student->username == session('username'))
        <button class="btn btn-default btnEdits pull-right btn-sm" id="btnEditExperiences" onclick="editExperiences()"><span class="glyphicon glyphicon-pencil"></span>  Edit</button>
        @else
        @endif
        <h4 class="pull-right timeUpdated"><small>Last Updated at: {{ $experience_updated_at->updated_at }}</small></h4>
        @foreach($exp as $xp)
        <div class="panel-body infoPanels">
          <h3 id="comName">{{ $xp->company_name }}</h3>
          <h4 id="comPosition">{{ $xp->position }}</h4>
          <h5 id="comDate">{{ $xp->date }} </h5>
          <h5 id="comAddress">{{ $xp->address }}</h5>
          <h3><small>Job Descriptions and Skills Learned:</small></h3>
          <h5 id="comDescription">{{ $xp->description }}</h5>
          <button class="btn btn-primary btn-sm" id="spExperienceSave" onclick="saveExperience('{{ session('id') }}')">Save</button>
          <button class="btn btn-default btn-sm" id="spExperienceSaveCancel"onclick="saveExperienceCancel()">Cancel</button>
        </div>
        @endforeach
      </div>    
      @endif

      <div class="panel panel-info infoPanelAll">
        <div class="panel-heading"><h2><span class="glyphicon glyphicon-star"></span> Skills</h2></div>
        <h4 class="pull-right timeUpdated"><small>
        @if(count($skills) < 1)
          Not updated yet
        @else
          Last Updated at: {{ $skill_updated_at->updated_at }}
        @endif
        </small></h4>
        <div class="panel-body infoPanels">
        <div id="skillsajax">
        @if(count($skills) < 1)
          User has not added any skills yet
        @else
          @include('skillsajax')
        @endif
        </div>
          @if($student->username == session('username'))
            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#skill">Add Skill</button>
            <div id="skill" class="collapse">
    
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="position">Skill Name:</label>
                    <input type="text" class="form-control input-lg" id="skillname" name="skill" required>
                </div>
               <!--  <div class="form-group">
                    <label for="position">Percent:</label>
                    <input type="number" class="form-control input-sm" id="skillpercent" style="width: 100" name="percent">
                </div> -->
                <div class="form-group">
                    <button type="button" onclick="addskill({{session('id')}})" class="input-sm btn btn-primary btn-sm" id="btnaddskill">Save</button>
                </div>
              
              </div>
            </ul>
          @else
          
          @endif
        </div>
      </div>

      @if(count($education) < 1)
     
      <div class="panel panel-info infoPanelAll">
        <div class="panel-heading"><h2><span class="glyphicon glyphicon-education"></span> Education</h2></div>
        @if($student->username == session('username'))
        <button class="btn btn-default btnEdits pull-right btn-sm" id="btnEditEducation" onclick="editEducation()"><span class="glyphicon glyphicon-pencil"></span>  Edit</button>
        @else
        @endif
        <h4 class="pull-right timeUpdated"><small>Last Updated at: NULL</small></h4>
        <div class="panel-body infoPanels">
          <h3 id="edName">School Name</h3>
          <h4 id="edCourse">Course Taken</h4>
          <h5 id="edDate">2012 to 2016</h5>
          <h3><small>Activities and Societies: </small></h3>
          <h5 id="edDescription">Describe here.</h5>
          <button class="btn btn-primary btn-sm" id="spEducationSave" onclick="saveEducation({{ session('id') }})">Save</button>
          <button class="btn btn-default btn-sm" id="spEducationSaveCancel"onclick="saveEducationCancel()">Cancel</button>
        </div>
      </div> 

      @else
      <div class="panel panel-info infoPanelAll">
        <div class="panel-heading"><h2><span class="glyphicon glyphicon-education"></span> Education</h2></div>
        @if($student->username == session('username'))
        <button class="btn btn-default btnEdits pull-right btn-sm" id="btnEditEducation" onclick="editEducation()"><span class="glyphicon glyphicon-pencil"></span>  Edit</button>
        @else
        @endif
        <h4 class="pull-right timeUpdated"><small>Last Updated at: {{ $education_updated_at->updated_at }}</small></h4>
        @foreach($education as $ed)
        <div class="panel-body infoPanels">
          <h3 id="edName">{{ $ed->school_name }}</h3>
          <h4 id="edCourse">{{ $ed->course }}</h4>
          <h5 id="edDate">{{ $ed->date }}</h5>
          <h3><small>Activities and Societies: </small></h3>
          <h5 id="edDescription">{{ $ed->description }}</h5>
          <button class="btn btn-primary btn-sm" id="spEducationSave" onclick="saveEducation({{ session('id') }})">Save</button>
          <button class="btn btn-default btn-sm" id="spEducationSaveCancel"onclick="saveEducationCancel()">Cancel</button>
        </div>
        @endforeach
      </div>  
      @endif

      <hr class="dividers">
      @if(session('type') == 'student' && $student->id == session('id'))
        
      @else
        <h4>Recommend this person:</h4>
        <form role="form" method="post" action="/{{ $student->id }}">
          {{ csrf_field() }}
          <div class="form-group">
            <textarea class="form-control" rows="4" name="body" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <br>
      @endif
      <p><span class="badge">{{ count($recs) }}</span> Recommendations:</p><br>
      <div class="row">
        @foreach($recs as $rec)
        <div class="col-sm-2 text-center">
        @if($rec->recommender_type == 'student')
          <img src="/app/{{ $st->where('id', $rec->recommender_id)->first()->photo }}" class="img-circle" height="65" width="65" alt="Avatar">
        @elseif($rec->recommender_type == 'departmentadmin')
           <img src="/app/{{ $sc->where('id', $d->where('id', $rec->recommender_id)->first()->id)->first()->photo }}" class="img-circle" height="65" width="65" alt="Avatar">
        @elseif($rec->recommender_type == 'company')
            <img src="/app/{{ $c->where('id', $rec->recommender_id)->first()->photo }}" class="img-circle" height="65" width="65" alt="Avatar">
        @else

        @endif

        </div>
        <div class="col-sm-10">
          <h4>
          @if($rec->recommender_type == 'student')
            {{ $st->where('id', $rec->recommender_id)->first()->firstname }}, {{ $st->where('id', $rec->recommender_id)->first()->middlename }} {{ $st->where('id', $rec->recommender_id)->first()->lastname }}
          @elseif($rec->recommender_type == 'departmentadmin')
            {{ $d->where('id', $rec->recommender_id)->first()->name }}
          @elseif($rec->recommender_type == 'schooladmin')
            {{ $sc->where('id', $rec->recommender_id)->first()->name }}
          @elseif($rec->recommender_type == 'company')
            {{ $c->where('id', $rec->recommender_id)->first()->name }}
          @else
            {{ $sa->where('id', $rec->recommender_id)->first()->username }}
          @endif
          <small>{{ $rec->updated_at }}</small></h4>
          <p>{{ $rec->body }}</p>

          @if($rec->recommender_id == session('id') && $rec->recommender_type == session('type') || $rec->student_id == session('id') && session('type') == 'student')
            <h6><a href="#" onclick="deleterec({{ $rec->id }})">Delete</a></h6>
          @else

          @endif

          <br>
        </div>
        @endforeach
      </div>
      <br><br>
    </div>
  </div>
</div>
