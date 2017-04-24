<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;
use App\Student;

class SkillsController extends Controller
{
    public function update(Request $request, $id){
    	$sk = new Skill;
    	$sk->student_id = $id;
    	$sk->skill = $request->skill;
    	$sk->percent = $request->percent;
    	$sk->save();
    	// $sk->where('id', $request->id)->where('student_id', session('id'))->update($request->all());
    	return back();
    }

    public function add(Request $request, $id){
        $this->validate($request, [
            'skill' => 'required'
            ]);
    	$sk = new Skill;
        $st = new Student;
    	$sk->student_id = $id;
    	$sk->skill = $request->skill;
    	$sk->percent = "0";
    	$sk->save();
        $skills = $sk->where('student_id', $id)->get();
        $student = $st->where('username', session('username'))->first();
    	return view('skillsajax', compact('skills', 'student'));
    }

    public function delete(Request $request){
        $sk = new Skill;
        $st = new Student;
        $sk->where('id', $request->id)->delete();
        $skills = $sk->where('student_id', session('id'))->get();
        $student = $st->where('username', session('username'))->first();
        return view('skillsajax', compact('skills', 'student'));
    }
}
