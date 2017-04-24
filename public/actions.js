function logOut(session){
	window.location.assign('/logout?u='+session);
    throw new Error('./.');
}

function addDepartment(){
	window.location.assign('/departments/add');
}

function viewDepartments(){
	window.location.assign('/departments');
    // alert("asdas");
}

function editDepartment(name, username, password, id){
    document.getElementById("name").value = name;
    document.getElementById("username").value = username;
    document.getElementById("password").value = password;
    document.getElementById('updateForm').action = "/departments/update/"+id;
}

function deleteDepartment(id) {
    document.getElementById('deleteForm').action = "/departments/delete/"+id;
    document.getElementById('idToDelete').value = id;
}

function editStudent(lastname, firstname, middlename, course, studentid, password, id, photo){
    document.getElementById("stlastname").value = lastname;
    document.getElementById("stfirstname").value = firstname;
    document.getElementById("stmiddlename").value = middlename;
    document.getElementById("stcourse").value = course;
    document.getElementById("ststudentid").value = studentid;
    document.getElementById("stpassword").value = password;
    document.getElementById("stphoto").src = "/app/"+photo;
    // document.getElementById("stPhotoUpdate").value = "/app"+photo;
    // document.getElementById("studentIDToUpdate").value = id;
    document.getElementById('studentUpdateForm').action = "/students/update/"+id;
}

function deleteStudent(id) {
    document.getElementById('studentDeleteForm').action = "/students/delete/"+id;
}

function goSearch(){
    document.getElementById('searchForm').action = "/?search=dasdas"
}

function readURL(input) {
    if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#sPhoto')
                    // .attr('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
    }
    updatePhoto();
}

function updatePhoto(){
    document.getElementById("upPhoto").click();
}

function deleterec(id){
    window.location.assign('/deleterec/'+id);
}

function deleteschool(id){
    window.location.assign('/deleteschool?id='+id);
}

var originalSummary;
var orCompanyName;
var orCompanyPosition;
var orCompanyAddress;
var orCompanyWorkDate;
var orCompanyDescription;
var orSchoolName;
var orSchoolCourse;
var orSchoolYear;
var orSchoolDescription;
var orStatus;
var orAddress;
var orEmail;
var orNumber;
var orMyCompanySummary;
var orMyCompanyAddress;
var targetCompany = "";
var targetCompanyName = "";
var targetCompanyUsername = "";
var targetStudent = "";
var mark = 0;
var mark1 = 0;

function test(){
    var xmlhttp;
    if(window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    }
    else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4){
            document.getElementById("testing").innerHTML = xmlhttp.responseText;
        }else{
            document.getElementById("testing").innerHTML = "loading...";
        }
    }
    var query = document.getElementById("qtest").value;
    url = "/search?query="+query;
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}


function saveSummary(){
    document.getElementById("btnSummarySave").className = "btn btn-primary disabled";
    // insert the function here
    setTimeout(function(){ document.getElementById("summarySave").innerHTML = "Saved";
        document.getElementById("btnSummarySave").className = "btn btn-primary";
        document.getElementById("spSummarySaveCancel").style.display = "none";
    }, 1300);
}

function saveSummaryCancel(){
    document.getElementById("spSummary").innerHTML = originalSummary;
    document.getElementById("spSummarySaveCancel").style.display = "none";
    document.getElementById("spSummary").style.border = "none";
    document.getElementById("spSummary").removeAttribute("contenteditable");
    document.getElementById("spSummarySave").style.display = "none";
    document.getElementById("spSummarySaveCancel").style.display = "none";
}

function editSummary(){
    originalSummary = document.getElementById("spSummary").innerHTML;
    document.getElementById("spSummarySave").style.display = "inline";
    document.getElementById("spSummarySaveCancel").style.display = "inline";
    var att = document.createAttribute("contenteditable");
    var target = document.getElementById("spSummary");
    target.setAttributeNode(att);
    target.style.border = "1px solid black";
}

function saveSummary(studentid){
    var xmlhttp;
    if(window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    }
    else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4){
            document.getElementById("spSummary").style.border = "none";
            document.getElementById("spSummary").removeAttribute("contenteditable");
            document.getElementById("spSummarySave").style.display = "none";
            document.getElementById("spSummarySaveCancel").style.display = "none";
        }
    }
    var str = document.getElementById("spSummary").innerHTML;
    summary = str.replace(/<br\s*\/?>/gi,"\n");
    url = "/updatesummary/"+studentid+"?summary="+summary;
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}

function editExperiences(studentid){
    orCompanyName = document.getElementById("comName").innerHTML;
    orCompanyPosition = document.getElementById("comPosition").innerHTML;
    orCompanyWorkDate = document.getElementById("comDate").innerHTML;
    orCompanyAddress = document.getElementById("comAddress").innerHTML;
    orCompanyWorkDate = document.getElementById("comDate").innerHTML;
    orCompanyDescription = document.getElementById("comDescription").innerHTML;
    document.getElementById("spExperienceSave").style.display = "inline";
    document.getElementById("spExperienceSaveCancel").style.display = "inline";
    var att = document.createAttribute("contenteditable");
    document.getElementById("comName").setAttributeNode(att);
    document.getElementById("comName").style.border = "1px solid black";
    var att = document.createAttribute("contenteditable");
    document.getElementById("comPosition").setAttributeNode(att);
    document.getElementById("comPosition").style.border = "1px solid black";
    var att = document.createAttribute("contenteditable");
    document.getElementById("comDate").setAttributeNode(att);
    document.getElementById("comDate").style.border = "1px solid black";
    var att = document.createAttribute("contenteditable");
    document.getElementById("comAddress").setAttributeNode(att);
    document.getElementById("comAddress").style.border = "1px solid black";
    var att = document.createAttribute("contenteditable");
    document.getElementById("comDescription").setAttributeNode(att);
    document.getElementById("comDescription").style.border = "1px solid black";
}

function saveExperienceCancel(){
    document.getElementById("comName").innerHTML = orCompanyName;
    document.getElementById("comPosition").innerHTML = orCompanyPosition; 
    document.getElementById("comDate").innerHTML = orCompanyWorkDate;
    document.getElementById("comAddress").innerHTML = orCompanyAddress;
    document.getElementById("comDate").innerHTML = orCompanyWorkDate;
    document.getElementById("comDescription").innerHTML = orCompanyDescription;
    document.getElementById("comName").style.border = "none";
    document.getElementById("comName").removeAttribute("contenteditable");
    document.getElementById("comPosition").style.border = "none";
    document.getElementById("comPosition").removeAttribute("contenteditable");
    document.getElementById("comDate").style.border = "none";
    document.getElementById("comDate").removeAttribute("contenteditable");
    document.getElementById("comAddress").style.border = "none";
    document.getElementById("comAddress").removeAttribute("contenteditable");
    document.getElementById("comDescription").style.border = "none";
    document.getElementById("comDescription").removeAttribute("contenteditable");
    document.getElementById("spExperienceSave").style.display = "none";
    document.getElementById("spExperienceSaveCancel").style.display = "none";
}

function saveExperience(studentid){
    var xmlhttp;
    if(window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    }
    else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4){
            document.getElementById("comName").style.border = "none";
            document.getElementById("comName").removeAttribute("contenteditable");
            document.getElementById("comPosition").style.border = "none";
            document.getElementById("comPosition").removeAttribute("contenteditable");
            document.getElementById("comDate").style.border = "none";
            document.getElementById("comDate").removeAttribute("contenteditable");
            document.getElementById("comAddress").style.border = "none";
            document.getElementById("comAddress").removeAttribute("contenteditable");
            document.getElementById("comDescription").style.border = "none";
            document.getElementById("comDescription").removeAttribute("contenteditable");
            document.getElementById("spExperienceSave").style.display = "none";
            document.getElementById("spExperienceSaveCancel").style.display = "none";
        }
    }
    var str = document.getElementById("comName").innerHTML;
    company_name = str.replace(/<br\s*\/?>/gi,"\n");
    var str1 = document.getElementById("comPosition").innerHTML;
    position = str1.replace(/<br\s*\/?>/gi,"\n");
    var str2 = document.getElementById("comDate").innerHTML;
    date = str2.replace(/<br\s*\/?>/gi,"\n");
    var str3 = document.getElementById("comAddress").innerHTML;
    address = str3.replace(/<br\s*\/?>/gi,"\n");
    var str4 = document.getElementById("comDescription").innerHTML;
    description = str4.replace(/<br\s*\/?>/gi,"\n");
    url = "/updateexperience/"+studentid+"?company_name="+company_name+"&position="+position+"&date="+date+"&address="+address+"&description="+description;
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}

function editEducation(){
    orSchoolName = document.getElementById("edName").innerHTML;
    orSchoolCourse = document.getElementById("edCourse").innerHTML;
    orSchoolYear = document.getElementById("edDate").innerHTML;
    orSchoolDescription = document.getElementById("edDescription").innerHTML;
    document.getElementById("spEducationSave").style.display = "inline";
    document.getElementById("spEducationSaveCancel").style.display = "inline";
    var att = document.createAttribute("contenteditable");
    document.getElementById("edName").setAttributeNode(att);
    document.getElementById("edName").style.border = "1px solid black";
    var att = document.createAttribute("contenteditable");
    document.getElementById("edCourse").setAttributeNode(att);
    document.getElementById("edCourse").style.border = "1px solid black";
    var att = document.createAttribute("contenteditable");
    document.getElementById("edDate").setAttributeNode(att);
    document.getElementById("edDate").style.border = "1px solid black";
    var att = document.createAttribute("contenteditable");
    document.getElementById("edDescription").setAttributeNode(att);
    document.getElementById("edDescription").style.border = "1px solid black";
}

function saveEducationCancel(){
    document.getElementById("edName").innerHTML = orSchoolName;
    document.getElementById("edCourse").innerHTML = orSchoolCourse; 
    document.getElementById("edDate").innerHTML = orSchoolYear;
    document.getElementById("edDescription").innerHTML = orSchoolDescription;
    document.getElementById("edName").style.border = "none";
    document.getElementById("edName").removeAttribute("contenteditable");
    document.getElementById("edCourse").style.border = "none";
    document.getElementById("edCourse").removeAttribute("contenteditable");
    document.getElementById("edDate").style.border = "none";
    document.getElementById("edDate").removeAttribute("contenteditable");
    document.getElementById("edDescription").style.border = "none";
    document.getElementById("edDescription").removeAttribute("contenteditable");
    document.getElementById("spEducationSave").style.display = "none";
    document.getElementById("spEducationSaveCancel").style.display = "none";
}

function saveEducation(studentid){
    var xmlhttp;
    if(window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    }
    else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4){
            document.getElementById("edName").style.border = "none";
            document.getElementById("edName").removeAttribute("contenteditable");
            document.getElementById("edCourse").style.border = "none";
            document.getElementById("edCourse").removeAttribute("contenteditable");
            document.getElementById("edDate").style.border = "none";
            document.getElementById("edDate").removeAttribute("contenteditable");
            document.getElementById("edDescription").style.border = "none";
            document.getElementById("edDescription").removeAttribute("contenteditable");
            document.getElementById("spEducationSave").style.display = "none";
            document.getElementById("spEducationSaveCancel").style.display = "none";
        }
    }
    var str = document.getElementById("edName").innerHTML;
    school_name = str.replace(/<br\s*\/?>/gi,"\n");
    var str1 = document.getElementById("edCourse").innerHTML;
    course = str1.replace(/<br\s*\/?>/gi,"\n");
    var str2 = document.getElementById("edDate").innerHTML;
    date = str2.replace(/<br\s*\/?>/gi,"\n");
    var str3 = document.getElementById("edDescription").innerHTML;
    description = str3.replace(/<br\s*\/?>/gi,"\n");
    url = "/updateeducation/"+studentid+"?school_name="+school_name+"&course="+course+"&date="+date+"&description="+description;
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}

function editSkills(id){
    document.getElementById("btnSkillSave"+id).style.display = "inline";
    document.getElementById("btnSkillSaveCancel"+id).style.display = "inline";
    document.getElementById("skillpercents"+id).style.color = "black";
    var att = document.createAttribute("contenteditable");
    document.getElementById("skillpercents"+id).setAttributeNode(att);
}

function skillSaveCancel(id){
    document.getElementById("btnSkillSaveCancel"+id).style.display = "none";
    document.getElementById("skillpercents"+id).style.border = "none";
    document.getElementById("skillpercents"+id).style.color = "white";
    document.getElementById("skillpercents"+id).removeAttribute("contenteditable");
    document.getElementById("btnSkillSave"+id).style.display = "none";
    document.getElementById("btnSkillSaveCancel"+id).style.display = "none";
}

function skillSave(id){
    var xmlhttp;
    if(window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    }
    else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4){
            document.getElementById("skillpercents"+id).style.border = "none";
            document.getElementById("skillpercents"+id).style.color = "white";
            document.getElementById("skillpercents"+id).removeAttribute("contenteditable");
            document.getElementById("skillbar"+id).ariaValuemax = percent;
            if(percent >= 100){
                document.getElementById("skillbar"+id).style.width = "100%";
                document.getElementById("skillpercents"+id).innerHTML = "100.00";
            }
            else{
                document.getElementById("skillbar"+id).style.width = percent+"%";
                document.getElementById("skillpercents"+id).innerHTML = percent;
            }
            document.getElementById("btnSkillSave"+id).style.display = "none";
            document.getElementById("btnSkillSaveCancel"+id).style.display = "none";
        }
    }
    var str = document.getElementById("skillpercents"+id).innerHTML;
    percent = str.replace(/<br\s*\/?>/gi,"\n");
    if(percent>=100){
        url = "/updateskill?percent=100&id="+id;
    }else{
        url = "/updateskill?percent="+percent+"&id="+id;
    }
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
    // setTimeout( function(){
        
    // }, 1200);
}


function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

function editInfo(){
    orStatus = document.getElementById("sStatus").innerHTML;
    orAddress = document.getElementById("spAddress").innerHTML;
    orEmail = document.getElementById("spEmail").innerHTML;
    orNumber = document.getElementById("spNumber").innerHTML;
    document.getElementById("spProfileSave").style.display = "inline";
    document.getElementById("spProfileSaveCancel").style.display = "inline";
    var att = document.createAttribute("contenteditable");
    document.getElementById("spAddress").setAttributeNode(att);
    document.getElementById("spAddress").style.border = "1px solid black";
    var att = document.createAttribute("contenteditable");
    document.getElementById("spEmail").setAttributeNode(att);
    document.getElementById("spEmail").style.border = "1px solid black";
    var att = document.createAttribute("contenteditable");
    document.getElementById("spNumber").setAttributeNode(att);
    document.getElementById("spNumber").style.border = "1px solid black";
    // var att = document.createAttribute("hidden");
    document.getElementById("sStatus").style.display = "none";
    document.getElementById("statusSelect").style.display = "inline-block";
}

function profileSaveCancel(){
    document.getElementById("sStatus").innerHTML = orStatus;
    document.getElementById("spAddress").innerHTML = orAddress; 
    document.getElementById("spEmail").innerHTML = orEmail;
    document.getElementById("spNumber").innerHTML = orNumber;
    document.getElementById("spProfileSave").style.display = "none";
    document.getElementById("spAddress").style.border = "none";
    document.getElementById("spAddress").removeAttribute("contenteditable");
    document.getElementById("spEmail").style.border = "none";
    document.getElementById("spEmail").removeAttribute("contenteditable");
    document.getElementById("spNumber").style.border = "none";
    document.getElementById("spNumber").removeAttribute("contenteditable");
    document.getElementById("sStatus").style.display = "inline-block";
    document.getElementById("statusSelect").style.display = "none";
    document.getElementById("spProfileSaveCancel").style.display = "none";
}

function profileSave(id){
    var xmlhttp;
    if(window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    }
    else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4){
            document.getElementById("sStatus").innerHTML = status;
            document.getElementById("spProfileSave").style.display = "none";
            document.getElementById("spAddress").style.border = "none";
            document.getElementById("spAddress").removeAttribute("contenteditable");
            document.getElementById("spEmail").style.border = "none";
            document.getElementById("spEmail").removeAttribute("contenteditable");
            document.getElementById("spNumber").style.border = "none";
            document.getElementById("spNumber").removeAttribute("contenteditable");
            document.getElementById("sStatus").style.display = "inline-block";
            document.getElementById("statusSelect").style.display = "none";
            document.getElementById("spProfileSaveCancel").style.display = "none";
        }
    }
    var str = document.getElementById("statusSelect").value;
    status = str.replace(/<br\s*\/?>/gi,"\n");
    var str1 = document.getElementById("spAddress").innerHTML;
    address = str1.replace(/<br\s*\/?>/gi,"\n");
    var str2 = document.getElementById("spEmail").innerHTML;
    email = str2.replace(/<br\s*\/?>/gi,"\n");
    var str3 = document.getElementById("spNumber").innerHTML;
    number = str3.replace(/<br\s*\/?>/gi,"\n");
    url = "/updateprofile/"+id+"?status="+status+"&address="+address+"&email="+email+"&phone_number="+number;
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}

function login(){
    document.getElementById("btnLogin").click();
    document.getElementById("btnLogin").className = "btn btn-primary form-control disabled";
}

function approve(id){
    window.location.assign('/managecompanies/approve?id='+id);
}

function disapprove(id){
    window.location.assign('/managecompanies/disapprove?id='+id);
}

function approverec(id){
    window.location.assign('/recommendations/approve?id='+id);
}

function rejectrec(id){
    window.location.assign('/recommendations/rejectrec?id='+id);
}

function undoapprove(id){
    window.location.assign('/recommendations/undoapprove?id='+id);
}

function addskill(sessionid){
    var xmlhttp;
    if(window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    }
    else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    if(document.getElementById("skillname").value == ""){
        alert('Error. Type a skill first');
    }else{
        xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4){
            document.getElementById("skillsajax").innerHTML = xmlhttp.responseText;
            document.getElementById("btnaddskill").innerHTML = "Save";
            document.getElementById("btnaddskill").className = "input-sm btn btn-primary btn-sm";
            document.getElementById("skillname").value = "";
        }else{
            document.getElementById("btnaddskill").innerHTML = "Saving...";
            document.getElementById("btnaddskill").className = "input-sm btn btn-primary btn-sm disabled";
        }
        }
        var skill = document.getElementById("skillname").value;
        url = "/addskill/"+sessionid+"?skill="+skill;
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
    }
}

function deleteSkill(skillid){
    var xmlhttp;
    if(window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    }
    else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4){
            document.getElementById("skillsajax").innerHTML = xmlhttp.responseText;
        }else{
            
        }
    }
    url = "/deleteskill?id="+skillid;
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}

function sendchat(companyid, studentid){
    var xmlhttp;
    if(window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    }
    else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    if(document.getElementById("chatbody").value == "" || document.getElementById("chatbody").value == " "){

    }else{
        xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4){
            document.getElementById("chatcontents").innerHTML = xmlhttp.responseText;
            document.getElementById("chatbody").value = "";
            document.getElementById("btnSendChat").innerHTML = "Send";
            document.getElementById("btnSendChat").className = "btn btn-primary col-sm-1";
            document.getElementById("chatbody").removeAttribute('disabled');
            var box = document.getElementById('chatcontents');
            box.scrollTop = box.scrollHeight;

        }else{
            document.getElementById("btnSendChat").innerHTML = "Sending...";
            document.getElementById("btnSendChat").className = "btn btn-primary col-sm-1 disabled";
            var att = document.createAttribute("disabled");
            document.getElementById("chatbody").setAttributeNode(att);
        }
        }
        var body = document.getElementById("chatbody").value;
        if(!studentid){
            url = "/sendchat?companyid="+companyid+"&studentid="+targetStudent+"&body="+body;
        }else{
            url = "/sendchat?companyid="+companyid+"&studentid="+studentid+"&body="+body;
        }
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
    }
}

function loadmessages(){
    var xmlhttp;
    if(window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    }
    else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4){
            document.getElementById("mychats").innerHTML = xmlhttp.responseText;
        }else{
            document.getElementsByClassName("mychats").innerHTML = "Loading messages...";
        }
    }
    url = "/loadchats";
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
    setTimeout(function(){
        loadmessages();
    }, 1200);
}

function scrolltobottom(){
    var box = document.getElementById('chatcontents');
    box.scrollTop = box.scrollHeight;
}

function scrolltobottom2(){
    var box = document.getElementById('chatcontentsStudent');
    box.scrollTop = box.scrollHeight;
}

function loadtargetchat(companyid, companyname, companyusername){
    document.getElementById("chatCompanyName").innerHTML = "<a href='/c/"+companyusername+"'>"+companyname+"</a>";
    var xmlhttp;
    if(window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    }
    else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4){
            document.getElementById("chatcontentsStudent").innerHTML = xmlhttp.responseText;
            scrolltobottom2();
            targetCompany = companyid;
            markcompanychatsasread();
            refreshcompanychats(targetCompany);
        }else{
            document.getElementById("chatcontentsStudent").innerHTML = "Loading messages..."
        }
    }
    url = "/loadtargetchat?companyid="+companyid;
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
    mark = 1;
}

function loadstudentchat(studentid, fullname, username){
    var xmlhttp;
    if(window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    }
    else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function(){
        document.getElementById("chatStudentName").innerHTML = 
        "<a href='/"+username+"'>"+fullname+"</a>";
        if(xmlhttp.readyState == 4){
            document.getElementById("chatcontents").innerHTML = xmlhttp.responseText;
            var box = document.getElementById('chatcontents');
            box.scrollTop = box.scrollHeight;
            targetStudent = studentid;
            markstudentchatsasread();
            refreshstudentchats(targetStudent);
        }else{
            document.getElementById("chatcontents").innerHTML = "Loading messages..."
        }
    }
    url = "/loadstudentchat?studentid="+studentid;
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
    mark1 = 1;
}

function studentsendchat(){
    var xmlhttp;
    if(window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    }
    else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    if(document.getElementById("chatbodyStudent").value == ""){

    }else{
        xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4){
            document.getElementById("chatcontentsStudent").innerHTML = xmlhttp.responseText;
            document.getElementById("chatbodyStudent").value = "";
            document.getElementById("btnSendChatStudent").innerHTML = "Send";
            document.getElementById("btnSendChatStudent").className = "btn btn-primary col-sm-1";
            document.getElementById("chatbodyStudent").className = "form-control";
            var box = document.getElementById('chatcontentsStudent');
            box.scrollTop = box.scrollHeight;

        }else{
            document.getElementById("btnSendChatStudent").innerHTML = "Sending...";
            document.getElementById("btnSendChatStudent").className = "btn btn-primary col-sm-1 disabled";
            document.getElementById("chatbodyStudent").className = "form-control disabled";
        }
        }
        var body = document.getElementById("chatbodyStudent").value;
        url = "/sendchat?companyid="+targetCompany+"&body="+body;
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
    }
}

function sendclick(e){
    e = e || window.event;
    if (e.keyCode == 13){
        studentsendchat();
    }
    return true;
}

function sendclick2(e, companyid){
    e = e || window.event;
    if (e.keyCode == 13){
        sendchat(companyid, targetStudent);
    }
    return true;
}

function refreshcompanychats(companyid){
    var xmlhttp;
    if(window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    }
    else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4){
            $('#chatcontentsStudent').append(xmlhttp.responseText);
            markcompanychatsasread();
            if($('#chatcontentsStudent').scrollTop() + $('#chatcontentsStudent').innerHeight() >= $('#chatcontentsStudent')[0].scrollHeight) {
                document.getElementById("scrollStudentChatstoBottom").style.visibility = "hidden";
            }else{
                document.getElementById("scrollStudentChatstoBottom").style.visibility = "visible";
            }
        }else{
            
        }
    }
    url = "/refreshcompanychats?companyid="+targetCompany;
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
    
    setTimeout(function(){
        refreshcompanychats(targetCompany);
    }, 1200);
}

function markcompanychatsasread(){
    if(mark == 0){

    }else{
        var xmlhttp;
        if(window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest();
        }
        else{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        url = "/markcompanychatsasread?companyid="+targetCompany;
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
    }
}

function refreshstudentchats(studentid){
    var xmlhttp;
    if(window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    }
    else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4){
            $('#chatcontents').append(xmlhttp.responseText);
            markstudentchatsasread();
            if($('#chatcontents').scrollTop() + $('#chatcontents').innerHeight() >= $('#chatcontents')[0].scrollHeight) {
                document.getElementById("scrollCompanyChatstoBottom").style.visibility = "hidden";
            }else{
                document.getElementById("scrollCompanyChatstoBottom").style.visibility = "visible";
            }
        }else{
            
        }
    }
    url = "/refreshstudentchats?studentid="+targetStudent;
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
    
    setTimeout(function(){
        refreshstudentchats(targetStudent);
    }, 1200);
}

function markstudentchatsasread(){
    if(mark1 == 0){

    }else{
        var xmlhttp;
        if(window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest();
        }
        else{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        url = "/markstudentchatsasread?studentid="+targetStudent;
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
    }
}

function countMessages(){
    var xmlhttp;
    if(window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    }
    else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4){
            if(xmlhttp.responseText == 0){
                document.getElementById("studentmessagecount").innerHTML = "";
            }else{
                document.getElementById("studentmessagecount").innerHTML = xmlhttp.responseText; 
            }
        }else{
        
        }
    }
    url = "/countmessages";
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
    // setTimeout(function(){
    //     countMessages();
    // }, 1200);
}

jQuery(function($) {
    $('#chatcontentsStudent').on('scroll', function() {
        if($('#chatcontentsStudent').scrollTop() + $('#chatcontentsStudent').innerHeight() >= $('#chatcontentsStudent')[0].scrollHeight) {
            document.getElementById("scrollStudentChatstoBottom").style.visibility = "hidden";
        }else{
            document.getElementById("scrollStudentChatstoBottom").style.visibility = "visible";
        }
    })
});

jQuery(function($) {
    $('#chatcontents').on('scroll', function() {
        if($('#chatcontents').scrollTop() + $('#chatcontents').innerHeight() >= $('#chatcontents')[0].scrollHeight) {
            document.getElementById("scrollCompanyChatstoBottom").style.visibility = "hidden";
        }else{
            document.getElementById("scrollCompanyChatstoBottom").style.visibility = "visible";
        }
    })
});

jQuery(function($) {
    $("#chatModalStudent").on("hide.bs.modal", function () {
        mark = 0;
    })
});

jQuery(function($) {
    $("#chatModal").on("hide.bs.modal", function () {
        mark1 = 0;
    })
});

setInterval(function(){
    countMessages();
}, 1200);

function editcompanyinfo(){
    orMyCompanySummary = document.getElementById("companysummary").innerHTML;
    orMyCompanyAddress = document.getElementById("companyaddress").innerHTML;
    document.getElementById("btncompanyeditcancel").style.visibility = "visible";
    document.getElementById("btncompanyeditsave").style.visibility = "visible";
    var att = document.createAttribute("contenteditable");
    target = document.getElementById("companyaddress");
    target.style.border = "1px solid black";
    target.setAttributeNode(att);
    var att2 = document.createAttribute("contenteditable");
    target2 = document.getElementById("companysummary");
    target2.style.border = "1px solid black";
    target2.setAttributeNode(att2);
}

function cancelcompanyinfo(){
    document.getElementById("btncompanyeditcancel").style.visibility = "hidden";
    document.getElementById("btncompanyeditsave").style.visibility = "hidden";
    target = document.getElementById("companyaddress");
    target.style.border = "none";
    target.removeAttribute("contenteditable");
    target2 = document.getElementById("companysummary");
    target2.style.border = "none";
    target2.removeAttribute("contenteditable");
    document.getElementById("companysummary").innerHTML = orMyCompanySummary;
    document.getElementById("companyaddress").innerHTML = orMyCompanyAddress;
}

function companyeditsave(){
    var xmlhttp;
    if(window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    }
    else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4){
            document.getElementById("btncompanyeditcancel").style.visibility = "hidden";
            document.getElementById("btncompanyeditsave").style.visibility = "hidden";
            target = document.getElementById("companyaddress");
            target.style.border = "none";
            target.removeAttribute("contenteditable");
            target2 = document.getElementById("companysummary");
            target2.style.border = "none";
            target2.removeAttribute("contenteditable");
        }else{
        
        }
    }
    str1 = document.getElementById("companyaddress").innerHTML;
    address = str1.replace(/<br\s*\/?>/gi,"\n");
    str2 = document.getElementById("companysummary").innerHTML;
    summary = str2.replace(/<br\s*\/?>/gi,"\n");
    url = "/updatecompanyinfo?address="+address+"&summary="+summary;
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}

function deletestudentconvo(){
    var xmlhttp;
    if(window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    }
    else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4){
            alert('done');
        }else{
        
        }
    }
    url = "/deletestudentconvo?c="+targetStudent;
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}

function showShowPassword(id, pw){
    if(document.getElementById("stpasswordvalue"+id).innerHTML != pw){
        document.getElementById("btnshowpassword"+id).style.display = "inline-block";
    }else{
        document.getElementById("btnhidepassword"+id).style.display = "inline-block";
    }
}

function hideShowPassword(id){
    document.getElementById("btnshowpassword"+id).style.display = "none";
    document.getElementById("btnhidepassword"+id).style.display = "none";
}

function showPassword(id, pw){
    document.getElementById('stpasswordvalue'+id).innerHTML = pw;
    document.getElementById("btnhidepassword"+id).style.display = "inline-block";
    document.getElementById("btnshowpassword"+id).style.display = "none";
}

function hidePassword(id, pw){
    document.getElementById('stpasswordvalue'+id).innerHTML = "********";
    document.getElementById("btnhidepassword"+id).style.display = "none";
    document.getElementById("btnshowpassword"+id).style.display = "inline-block";
}