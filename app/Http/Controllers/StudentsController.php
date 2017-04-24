<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\DepartmentAdmin;
use App\SchoolAdmin;
use App\Student;
use App\Skill;
use App\Experience;
use App\Education;
use App\Superadmin;
use App\Interest;
use App\Recommendation;
use App\Company;
use App\Chat;
use View;

class StudentsController extends Controller
{
    public function add(Request $request){
        if(!request()->file('photo')){ //pag walang picture
            $student = new Student;
            $password = substr(hash::make($request->studentid), -11);
            $username = session('username').$request->studentid;
            $student->username = $username;
            $student->password = $password;
            $student->firstname = $request->firstname;
            $student->lastname = $request->lastname;
            $student->middlename = $request->middlename;
            $student->department_admin_id = session('id');
            $student->course = $request->course;
            $student->studentid = $request->studentid;
            $student->email = "myemail@email.com";
            $student->address = "My Address";
            $student->phone_number = "09991234567";
            $student->status = "Looking for Job";
            $student->summary = "My summary has not been updated yet.";
            $student->save();
            return redirect('/students/view');
        }
        else{
            $student = new Student;
            $password = substr(hash::make($request->studentid), -11);
            $username = session('username').$request->studentid;
            $student->username = $username;
            $student->password = $password;
            $student->firstname = $request->firstname;
            $student->lastname = $request->lastname;
            $student->middlename = $request->middlename;
            $student->department_admin_id = session('id');
            $student->course = $request->course;
            $student->studentid = $request->studentid;
            $student->email = "myemail@email.com";
            $student->address = "My Address";
            $student->phone_number = "09991234567";
            $student->status = "Looking for Job";
            $student->summary = "My summary has not been updated yet.";
            $photo = request()->file('photo')->store('photos/'.$username);
            $student->photo = $photo;
            $student->save();
            return redirect('/students/view');
        }
    }

    public function view(){
    	$s = new Student;
        if(session('type') == 'admin'){
            $students = $s->all();
            return view('viewstudents', compact('students'));
        }else{
            $students = $s->where('department_admin_id', session('id'))->get();
            return view('viewstudents', compact('students'));
        }
    }

    public function update(Request $request, Student $student){
        if(!request()->file('photo')){
            $username = session('username').$request->studentid;
            $student->update($request->all());
            return back();
        }else{
            $username = session('username').$request->studentid;
            $photo = request()->file('photo')->store('photos/'.$username);
            $student->update($request->all());
            $student->update(['photo' => $photo]);
            return back();
        }
    }

    public function delete(Request $request, Student $student){
        $student->delete('id', $request->id);
        return back();
    }

    public function studentList(SchoolAdmin $school, DepartmentAdmin $department){
        $s = new Student;
        $students = $s->where('department_admin_id', $department->id)->paginate(10);
        return view('studentList', compact('students', 'department'));
    }

    public function studentProfile(SchoolAdmin $school, DepartmentAdmin $department, $username){
        $st = new Student;
        $sk = new Skill;
        $xp = new Experience;
        $ed = new Education;
        $in = new Interest;
        $rc = new Recommendation;
        $d = new DepartmentAdmin;
        $sc = new SchoolAdmin;
        $sa = new Superadmin;
        $c = new Company;
        $ch = new Chat;
        $id = $st->where('username', $username)->first();
        $skills = $sk->where('student_id', $id->id)->get();
        $skill_updated_at = $sk->where('student_id', $id->id)->orderBy('updated_at', 'desc')->first();
        $education_updated_at = $ed->where('student_id', $id->id)->orderBy('updated_at', 'desc')->first();
        $experience_updated_at = $xp->where('student_id', $id->id)->orderBy('updated_at', 'desc')->first();
        $exp = $xp->where('student_id', $id->id)->get();
        $interests = $in->where('student_id', $id->id)->get();
        $education = $ed->where('student_id', $id->id)->get();
        $student = $st->where('username', $username)->first();
        $recs = $rc->where('student_id', $student->id)->where('status', 'Approved')->orderBy('updated_at', 'desc')->get();
        return view('studentprofile', compact('student', 'skills', 'skill_updated_at', 'exp', 'education', 'education_updated_at', 'experience_updated_at', 'interests', 'recs', 'd', 'sc', 'st', 'sa', 'c', 'ch'));
    }

    public function search(Request $request){
        $s = new Student;
        $d = new DepartmentAdmin;
        $sc = new SchoolAdmin;
        $q = $request->q;
        $students = $s->where('firstname', 'LIKE', '%'.$q.'%')->orWhere('lastname', 'LIKE', '%'.$q.'%')->orWhere('middlename', 'LIKE', '%'.$q.'%')->orWhere('address', 'LIKE', '%'.$q.'%')->orWhere('course', 'LIKE', '%'.$q.'%')->orWhere('username', 'LIKE', '%'.$q.'%')->paginate(10);
        $d = new DepartmentAdmin;
        $sc= new SchoolAdmin;
        return view('searchresults', compact('students', 'd', 'sc'));
    }

    public function updatesummary(Request $request, Student $student){
        $student->update($request->all());
        return $student->summary;
    }

    public function updateProfile(Request $request, Student $student){
        if(!$request->summary){
            $student->update(['summary' => 'Summary has not been updated yet']);
        }else{
            $student->update($request->all());
        }
    }

    public function updatePhoto(Request $request, Student $student){
        if(!request()->file('newphoto')){
            
        }
        else{
            $photo = request()->file('newphoto')->store('photos/'.$student->username);
            $student->update(['photo' => $photo]);
            session()->set('photo', $student->photo);
            return back();
        }
    }
}
