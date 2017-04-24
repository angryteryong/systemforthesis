<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DepartmentAdmin;
use App\SchoolAdmin;
use App\Student;
use App\Company;
use App\Superadmin;
use App\Recommendation;
use View;
use Illuminate\Support\Facades\Crypt;

class PagesController extends Controller
{
    public function index(){
        $schoolAdmin = new SchoolAdmin;
        $schools = $schoolAdmin->all();
        return view('index', compact('schools', 'company'));
    }

    public function login(){
    	return view('login');
    }

    public function register(){
    	return view('register');
    }

    public function registerSchool(){
    	return view('register_school');
    }

    public function u_adminPanel(){
        return view('u_adminpanel');
    }

    public function addStudent(){
        return view('addstudent');
    }

    public function adminpanel(){
        return view('adminpanel');
    }

    public function addSchool(){
        return view('addschool');
    }

    public function editProfile(){
        return view('student_editprofile');
    }

    public function forgotPassword(){
        return view('forgotpassword');
    }

    public function test(){
        return view('test');
    }

    public function managecompanies(){
        $c = new Company;
        $companies = $c->all();
        return view('companies', compact('companies'));
    }

    public function editaccount(){
        if(session('type') == 'schooladmin'){
            $s = new SchoolAdmin;
            $sc = $s->where('id', session('id'))->first();
            return view('editaccountschool', compact('sc'));
        }elseif(session('type') == 'departmentadmin'){
            $d = new DepartmentAdmin;
            $dept = $d->where('id', session('id'))->first();
            return view('editaccountdept', compact('dept'));
        }elseif(session('type') == 'company'){
            $c = new Company;
            $com = $c->where('id', session('id'))->first();
            return view('editaccountcompany', compact('com'));
        }elseif(session('type') == 'student'){
            $st = new Student;
            $stu = $st->where('id', session('id'))->first();
            return view('editaccountstudent', compact('stu'));
        }else{
            $sa = new Superadmin;
            $superadmin = $sa->where('id', session('id'))->first();
            return view('editaccountsuperadmin', compact('superadmin'));
        }
    }

    public function viewschools(){
        $s = new SchoolAdmin;
        $schools = $s->all();
        return view('viewschools', compact('schools'));
    }

    public function recommendations(){
        $rc = new Recommendation;
        $st = new Student;
        $c = new Company;
        $dept = new DepartmentAdmin;
        $sc = new SchoolAdmin;
        $sa = new Superadmin;

        $recs = $rc->orderBy('created_at', 'desc')->get();
        return view('recommendations', compact('recs', 'st', 'c', 'dept', 'sc', 'sa'));
    }

    public function viewcompany($username){
        $co = new Company;
        $company = $co->where('username', $username)->first();
        return view('viewcompany', compact('company'));
    }

    public function resetpassword(Request $r){
        $type = Crypt::decrypt($r->t);
        $username = Crypt::decrypt($r->u);
        return view('resetpasswordpage', compact('type', 'username'));
    }
}
