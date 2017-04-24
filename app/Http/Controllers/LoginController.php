<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Company;
use App\DepartmentAdmin;
use App\SchoolAdmin;
use App\Superadmin;
use App\Recommendation;
use View;
use Mail;
use App\Mail\dcgjps;
use Illuminate\Support\Facades\Crypt;

class LoginController extends Controller
{
    public function authenticate(Request $request){
      if($request->username == 'admin'){
        $c = new Company;
        $rc = new Recommendation;
        $recs = $rc->where('status', 'Pending')->count();
        $crequests = $c->where('status', 'not approved')->count();
        $account = new Superadmin;
        $username = $account->where('username', $request->username)->first();
        if(!$username){
          session()->flash('message', 'WRONG USERNAME. PLEASE TRY AGAIN.');
          session()->flash('messageTyp  e', 'alert-danger');
          return redirect('/login');
          session()->flash('message', 'WRONG USERNAME. PLEASE TRY AGAIN.');
          session()->flash('messageType', 'alert-danger');
        }
        else{
          $password = $account->where('password', $request->password)->first();
          if(!$password){
            session()->flash('message', 'WRONG PASSWORD. PLEASE TRY AGAIN.');
            session()->flash('messageType', 'alert-danger');
            return redirect('/login');
            session()->flash('message', 'WRONG PASSWORD. PLEASE TRY AGAIN.');
            session()->flash('messageType', 'alert-danger');
          }
          else{
            session()->set('status', '1');
            session()->set('username', $username->username);
            session()->set('type', 'superadmin');
            session()->set('id', $username->id);
            session()->set('crequests', $crequests);
            session()->set('crecommendations', $recs);
            return redirect('/');
          }
        }
      }
      else{
        if($request->type=='student'){
        $account = new Student;
        $username = $account->where('username', $request->username)->first();
        // $pic = $username->photo;
        if(!$username){ // check if username does not exists
          session()->flash('message', 'WRONG USERNAME. PLEASE TRY AGAIN.');
          session()->flash('messageType', 'alert-danger');
          return redirect('/login');
          session()->flash('message', 'WRONG USERNAME. PLEASE TRY AGAIN.');
          session()->flash('messageType', 'alert-danger');
        }
        else { //if username exists, it will check next if the password is correct
          $password = $account->where('password', $request->password)->first();
          if (!$password){ //if password is wrong
            session()->flash('message', 'WRONG PASSWORD. PLEASE TRY AGAIN.');
            session()->flash('messageType', 'alert-danger');
            return redirect('/login');
            session()->flash('message', 'WRONG PASSWORD. PLEASE TRY AGAIN.');
            session()->flash('messageType', 'alert-danger');
          }
          else{ //if username and password is correct
            $pic = $username->photo;
            session()->set('status', '1');
            session()->set('username', $username->username);
            session()->set('type', $request->type);
            session()->set('id', $username->id);
            $s = new Student;
            $st = $s->where('id', session('id'))->first();
            session()->set('photo', $st->photo);
            return redirect('/'.session('username'));
          }
        }
      }

      elseif($request->type=='company'){
        $account = new Company;
        $username = $account->where('username', $request->username)->first();
        if(!$username){ // check if username does not exists
          session()->flash('message', 'WRONG USERNAME. PLEASE TRY AGAIN.');
          session()->flash('messageType', 'alert-danger');
          return redirect('/login');
          session()->flash('message', 'WRONG USERNAME. PLEASE TRY AGAIN.');
          session()->flash('messageType', 'alert-danger');
        }
        else { //if username exists, it will check next if the password is correct
          $password = $account->where('password', $request->password)->first();
          if (!$password){ //if password is wrong
            session()->flash('message', 'WRONG PASSWORD. PLEASE TRY AGAIN.');
            session()->flash('messageType', 'alert-danger');
            return redirect('/login');
            session()->flash('message', 'WRONG PASSWORD. PLEASE TRY AGAIN.');
            session()->flash('messageType', 'alert-danger');
          }
          else{ //if username and password is correct
            session()->set('status', '1');
            session()->set('username', $username->username);
            session()->set('type', $request->type);
            session()->set('id', $username->id);
            session()->set('photo', $username->photo);
            $companystatus = $account->where('id', $username->id)->first();
            if($companystatus->status == 'not approved'){
              session()->set('prompt', "YOUR ACCOUNT HAS NOT BEEN VERIFIED YET. YOU CANNOT VIEW STUDENT'S PROFILES. PLEASE WAIT AT LEAST 24 HOURS.");
              session()->set('alert', 'alert alert-danger');            
            }else{

            }
            return redirect('/'); 
          }
        }
      }

      elseif($request->type=='departmentadmin'){
        $account = new DepartmentAdmin;
        $username = $account->where('username', $request->username)->first();
        if(!$username){ // check if username does not exists
          session()->flash('message', 'WRONG USERNAME. PLEASE TRY AGAIN.');
          session()->flash('messageType', 'alert-danger');
          return redirect('/login');
          session()->flash('message', 'WRONG USERNAME. PLEASE TRY AGAIN.');
          session()->flash('messageType', 'alert-danger');
        }
        else { //if username exists, it will check next if the password is correct
          $password = $account->where('password', $request->password)->first();
          if (!$password){ //if password is wrong
            session()->flash('message', 'WRONG PASSWORD. PLEASE TRY AGAIN.');
            session()->flash('messageType', 'alert-danger');
            return redirect('/login');
            session()->flash('message', 'WRONG PASSWORD. PLEASE TRY AGAIN.');
            session()->flash('messageType', 'alert-danger');
          }
          else{ //if username and password is correct
            session()->set('status', '1');
            session()->set('username', $username->username);
            session()->set('type', $request->type);
            session()->set('id', $username->id);
             return redirect('/students/view');
          }
        }
      }

      elseif($request->type=='schooladmin'){
        $account = new SchoolAdmin;
        $username = $account->where('username', $request->username)->first();
        if(!$username){ // check if username does not exists
          session()->flash('message', 'WRONG USERNAME. PLEASE TRY AGAIN.');
          session()->flash('messageType', 'alert-danger');
          return redirect('/login');
          session()->flash('message', 'WRONG USERNAME. PLEASE TRY AGAIN.');
          session()->flash('messageType', 'alert-danger');
        }
        else { //if username exists, it will check next if the password is correct
          $password = $account->where('password', $request->password)->first();
          if (!$password){ //if password is wrong
            session()->flash('message', 'WRONG PASSWORD. PLEASE TRY AGAIN.');
            session()->flash('messageType', 'alert-danger');
            return redirect('/login');
            session()->flash('message', 'WRONG PASSWORD. PLEASE TRY AGAIN.');
            session()->flash('messageType', 'alert-danger');
          }
          else{ //if username and password is correct
            session()->set('status', '1');
            session()->set('username', $username->username);
            session()->set('type', $request->type);
            session()->set('id', $username->id);
            session()->set('photo', $username->photo);
            return redirect('/departments');
          }
        }
      }
    }
    }

    public function logout(Request $request){
      if(count($request->u) < 1){
        return back();
      }
      else{
        $compare = md5(md5(session('username')));
        if($compare == $request->u){
          session()->flush();
          session()->flash('message', 'Log out successfull');
          session()->flash('messageType', 'alert-success');
          session()->set('go', 0);
          return redirect('/login');
          session()->flash('message', 'Log out successfull');
          session()->flash('messageType', 'alert-success');
        }
        else{
          return back();
        }
      }
    }

    public function editaccount(Request $request){
      if(session('type') == 'schooladmin'){
        $sc = new SchoolAdmin;
        $check = $sc->where('id', session('id'))->where('password', $request->oldpassword)->first();
        if($check){
          if(!request()->file('photo')){
            $check->update(['password' => $request->newpassword]);
            return redirect('/');
          }else{
            $photo = request()->file('photo')->store('schools/photos');
            $check->update(['password' => $request->newpassword, 'photo' => $photo]);
            return redirect('/');
          }  
        }else{
            session()->flash('editalertlevel', 'alert alert-danger');
            session()->flash('editalert', 'The old password you entered is invalid');
            return back();
            session()->flash('editalertlevel', 'alert alert-danger');
            session()->flash('editalert', 'The old password you entered is invalid');
          }
        return request()->file('photo');
      }elseif(session('type') == 'departmentadmin'){
        $d = new DepartmentAdmin;
        $check = $d->where('id', session('id'))->where('password', $request->oldpassword)->first();
        if($check){
          $check->update(['password' => $request->newpassword]);
          return redirect('/');
        }else{
          session()->flash('editalertlevel', 'alert alert-danger');
          session()->flash('editalert', 'The old password you entered is invalid');
          return back();
          session()->flash('editalertlevel', 'alert alert-danger');
          session()->flash('editalert', 'The old password you entered is invalid');
        }
      }elseif(session('type') == 'company'){
        $c = new Company;
        $check = $c->where('id', session('id'))->where('password', $request->oldpassword)->first();
        if($check){
          $check->update(['password' => $request->newpassword]);
          return redirect('/');
        }else{
          session()->flash('editalertlevel', 'alert alert-danger');
          session()->flash('editalert', 'The old password you entered is invalid');
          return back();
          session()->flash('editalertlevel', 'alert alert-danger');
          session()->flash('editalert', 'The old password you entered is invalid');
        }
      }elseif(session('type') == 'student'){
        $st = new Student;
        $check = $st->where('id', session('id'))->where('password', $request->oldpassword)->first();
        if($check){
          $check->update(['password' => $request->newpassword]);
          return redirect('/');
        }else{
          session()->flash('editalertlevel', 'alert alert-danger');
          session()->flash('editalert', 'The old password you entered is invalid');
          return back();
          session()->flash('editalertlevel', 'alert alert-danger');
          session()->flash('editalert', 'The old password you entered is invalid');
        }
      }else{
        $sa = new Superadmin;
        $check = $sa->where('id', session('id'))->where('password', $request->oldpassword)->first();
        if($check){
          $check->update(['password' => $request->newpassword]);
          return redirect('/');
        }else{
          session()->flash('editalertlevel', 'alert alert-danger');
          session()->flash('editalert', 'The old password you entered is invalid');
          return back();
          session()->flash('editalertlevel', 'alert alert-danger');
          session()->flash('editalert', 'The old password you entered is invalid');
        }
      }
    }

    public function forgotPassword(Request $r){
      $s = new Student;
      $c = new Company;
      $sc = new SchoolAdmin;
      $student = $s->where('email', $r->email)->first();
      $company = $c->where('email', $r->email)->first();
      $schooladmin = $sc->where('email', $r->email)->first();
      if($student){
        $this->sendPasswordReset($student->email,'student',$student->username);
      }elseif($company){
        $this->sendPasswordReset($company->email,'company',$company->username);
      }elseif($schooladmin){
        $this->sendPasswordReset($schooladmin->email,'schooladmin',$schooladmin->username);
      }else{
        session()->flash('fpalert', 'alert alert-danger text-center');
        session()->flash('fpmessage', 'Invalid Email');
        return back();
      }      
    }

    public function sendPasswordReset($email, $type, $username){
      $resetlink = "http://dcgjps.herokuapp.com/resetpassword?t=".Crypt::encrypt($type)."&u=".Crypt::encrypt($username);
      Mail::to($email)->send(new dcgjps($resetlink));
      echo '<div class="alert alert-info text-center">The password reset link has been sent to your email. Please check it.</div>';
    }

    public function resetpassword(Request $r){
      if($r->type == 'student'){
        $s = new Student;
        $target = $s->where('username', $r->username)->first();
        $target->update(['password' => $r->password]);
        session()->flash('message', 'Password has been changed. You can now log in.');
        session()->flash('messageType', 'alert-info');
        return redirect('/');
      }elseif($r->type == 'company'){
        $s = new Company;
        $target = $s->where('username', $r->username)->first();
        $target->update(['password' => $r->password]);
        session()->flash('message', 'Password has been changed. You can now log in.');
        session()->flash('messageType', 'alert-info');
        return redirect('/');
      }elseif($r->type == 'schooladmin'){
        $s = new SchoolAdmin;
        $target = $s->where('username', $r->username)->first();
        $target->update(['password' => $r->password]);
        session()->flash('message', 'Password has been changed. You can now log in.');
        session()->flash('messageType', 'alert-info');
        return redirect('/');
      }else{
        return "Something went wrong. Please contact dthrcrpz@gmail.com";
      }
    }
}
