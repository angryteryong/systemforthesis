<?php

namespace App\Http\Controllers;

use App\SchoolAdmin;
use App\Student;
use Illuminate\Http\Request;

class SchoolsController extends Controller
{
    public function add(Request $request){
        if(request()->file('photo')){
            $s = new SchoolAdmin;
            $s->name = $request->name;
            $s->username = $request->username;
            $s->password = $request->password;
            $s->email = $request->email;
            $photo = request()->file('photo')->store('schools/photos');
            $s->photo = $photo;
            $s->save();
            return redirect('/adminpanel/schools/view');
        }else{
            $s = new SchoolAdmin;
            $s->name = $request->name;
            $s->username = $request->username;
            $s->password = $request->password;
            $s->email = $request->email;
            $s->save();
            return redirect('/adminpanel/schools/view');
        }
    }

    public function delete(Request $request){
        $sc = new SchoolAdmin;
        $target = $sc->where('id', $request->id)->first();
        $target->delete();
        $s = new Student;
        return back();
    }
}
