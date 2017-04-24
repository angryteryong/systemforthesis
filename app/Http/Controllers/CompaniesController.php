<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompaniesController extends Controller
{
    public function register(Request $r){
        $com = new Company;
        $compare = $com->where('username', $r->username)->first(); 
        if(!$compare){
            if(!$r->file('photo')){
                $c = new Company;
                $c->name = $r->name;
                $c->address = $r->address;
                $c->email = $r->email;
                $c->username = $r->username;
                $c->password = $r->password;
                $c->status = "not approved";
                $c->save();
                session()->flash('message', 'YOU ARE NOW REGISTERED. PLEASE LOGIN.');
                session()->flash('messageType', 'alert-success');
                return redirect('login');
                session()->flash('message', 'YOU ARE NOW REGISTERED. PLEASE LOGIN.');
                session()->flash('messageType', 'alert-success');
            }else{
                $c = new Company;
                $photo = $r->file('photo')->store('/photos/company/'.$r->username);
                $c->name = $r->name;
                $c->address = $r->address;
                $c->email = $r->email;
                $c->username = $r->username;
                $c->password = $r->password;
                $c->photo = $photo;
                $c->status = "not approved";
                $c->save();
                session()->flash('message', 'YOU ARE NOW REGISTERED. PLEASE LOGIN.');
                session()->flash('messageType', 'alert-success');
                return redirect('login');
                session()->flash('message', 'YOU ARE NOW REGISTERED. PLEASE LOGIN.');
                session()->flash('messageType', 'alert-success');
            }   
        }else{
            session()->flash('message', 'Error! USERNAME is already taken.');
            session()->flash('messageType', 'alert-danger');
            return redirect('login');
            session()->flash('message', 'Error! USERNAME is already taken.');
            session()->flash('messageType', 'alert-danger');
        }
    }

    public function approve(Request $request){
    	$c = new Company;
    	$c->where('id', $request->id)->update(['status' => 'approved']);
        session()->set('crequests', count($c->where('status', 'not approved')->get()));
    	return back();
    }

    public function disapprove(Request $request){
    	$c = new Company;
    	$c->where('id', $request->id)->update(['status' => 'not approved']);
        session()->set('crequests', count($c->where('status', 'not approved')->get()));
    	return back();
    }

    public function updatePhoto(Request $request, Company $company){
        if(!request()->file('newphoto')){
            
        }
        else{
            $photo = request()->file('newphoto')->store('photos/'.$company->username);
            $company->update(['photo' => $photo]);
            session()->set('photo', $company->photo);
            return back();
        }
    }

    public function updatecompanyinfo(Request $r){
        $co = new Company;
        $target = $co->where('id', session('id'))->first();
        $target->update(['address' => $r->address, 'summary' => $r->summary]);
    }
}
