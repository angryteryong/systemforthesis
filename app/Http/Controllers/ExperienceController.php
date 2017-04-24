<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Experience;

class ExperienceController extends Controller
{
    public function update(Request $request, Student $student){
    	$count = $student->experiences;
    	if(count($count) < 1){
    		$exp = new Experience;
    		$exp->student_id = $student->id;
    		$exp->company_name = $request->company_name;
    		$exp->position = $request->position;
    		$exp->date = $request->date;
    		$exp->address = $request->address;
    		$exp->description = $request->description;
    		$exp->save();
    	}else{
    		$xp = new Experience;
            $target = $xp->where('student_id', session('id'))->first();
            $target->update([
                'company_name' => $request->company_name,
                'position' => $request->position,
                'date' => $request->date,
                'address' => $request->address,
                'description' => $request->description
            ]);
    	}
    }
}
