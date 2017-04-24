<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Education;

class EducationsController extends Controller
{
    public function update(Request $request, Student $student){
    	$result = $student->educations;
    	if(count($result) < 1){
    		$ed = new Education;
    		$ed->student_id = $student->id;
    		$ed->school_name = $request->school_name;
    		$ed->course = $request->course;
    		$ed->date = $request->date;
    		$ed->description = $request->description;
    		$ed->save();
    	}else{
    		$student->educations()->update($request->all());
    	}
    }
}
