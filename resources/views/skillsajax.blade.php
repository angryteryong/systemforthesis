<ul style="margin-top: 20">
          @foreach($skills as $skill)
            <li><h4>{{ $skill->skill }}
                @if($student->username == session('username'))
                <!-- <button class="btn btn-default btn-sm btnEditSkills" id="btnEditSummary" onclick="editSkills({{ $skill->id }})"><span class="glyphicon glyphicon-pencil"></span> Edit</button> -->
                <button class="btn btn-danger btn-sm btnDeleteSkills" id="btnDeleteSkill" onclick="deleteSkill({{ $skill->id }})"><span class="glyphicon glyphicon-trash"></span> Delete</button>
                @else

                @endif
              </h4>
            
                <!-- <div class="progress" style="background-color: #D8D8D8;">
                  <div id="skillbar{{ $skill->id }}" class="progress-bar" role="progressbar" aria-valuenow="70"
                    aria-valuemin="0" aria-valuemax="100" style="width:{{ $skill->percent }}%">
                      <span onkeydown="return ( event.ctrlKey || event.altKey 
                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9) 
                    || (event.keyCode>34 && event.keyCode<40) 
                    || (event.keyCode==46) )" id="skillpercents{{ $skill->id }}" type="number" class="spSkills">{{ $skill->percent }}</span><span class="spSkills"> %</span>
                  </div>
                </div><button id="btnSkillSave{{ $skill->id }}" class="btn btn-primary btn-sm skillsSave" onclick="skillSave({{ $skill->id }})">Save</button>
                <button class="btn btn-default btn-sm skillsSaveCancel" id="btnSkillSaveCancel{{ $skill->id }}" onclick="skillSaveCancel({{ $skill->id }})"> Cancel</button> -->
            </li>
          @endforeach