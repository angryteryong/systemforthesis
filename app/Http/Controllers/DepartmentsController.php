<?php

namespace App\Http\Controllers;
use App\DepartmentAdmin;
use App\SchoolAdmin;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    public function add(){
    	return view('department_add');
    }

    public function index(){
        $dept = new DepartmentAdmin;
        if(session('type') == 'admin'){
            $d = $dept->all();
            return view('departments', compact('d'));
        }else{
            $d = $dept->where('school_admin_id', session('id'))->get();
            return view('departments', compact('d'));
        }
    }

    public function store(Request $request, SchoolAdmin $schoolAdmin){
    	$dept = new DepartmentAdmin;
    	$schoolAdmin->id = session('id');
    	$dept->name = $request->name;
    	$dept->username = $request->username;
    	$dept->password = $request->password;
    	$schoolAdmin->department()->save($dept);
    	return redirect('/departments');
    }

     public function showDepartments(SchoolAdmin $school){
        $da = new DepartmentAdmin;
        $depts = $da->where('school_admin_id', $school->id)->get();
        $theSchool = new SchoolAdmin;
        $schoolName = $theSchool->where('id', $school->id)->first();
        return view('departmentslist', compact('depts', 'schoolName'));
        // return $id;
    }

    public function update(Request $request, DepartmentAdmin $department){
        $department->update($request->all());
        return back();
    }

    public function delete(Request $request, DepartmentAdmin $department){
        $department->delete('id', $request->id);
        return back();
    }
}
