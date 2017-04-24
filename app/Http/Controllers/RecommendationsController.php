<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recommendation;
use App\Student;

class RecommendationsController extends Controller
{
	public function add(Request $request, $studentid){
		$rc = new Recommendation;
		$rc->recommender_id = session('id');
		$rc->recommender_type = session('type');
		$rc->student_id = $studentid;
		$rc->body = $request->body;
		$rc->status = "Pending";
		$rc->save();
		session()->flash('recommendationAlertType', 'alert alert-info text-center');
		session()->flash('recommendationAlert', 'Your recommendation needs approval from the ADMIN before it gets posted. Thank you for recommending this student.');
		return back();
		session()->flash('recommendationAlertType', 'alert alert-info text-center');
		session()->flash('recommendationAlert', 'Your recommendation needs approval from the ADMIN before it gets posted. Thank you for recommending this student.');
	}

	public function delete(Recommendation $rec){
		$rec->delete();
		return back();
	}

	public function approverec(Request $request){
		$rec = new Recommendation;
		$target = $rec->where('id', $request->id)->first();
		$target->update(['status' => 'Approved']);
		session()->set('crecommendations', count($rec->where('status', '!=', 'Approved')->get()));
		return redirect('/adminpanel/recommendations');
	}

	public function undoapprove(Request $request){
		$rec = new Recommendation;
		$target = $rec->where('id', $request->id)->first();
		$target->update(['status' => 'Pending']);
		session()->set('crecommendations', count($rec->where('status', '!=', 'Approved')->get()));
		return redirect('/adminpanel/recommendations');
	}

	public function rejectrec(Request $request){
		$rec = new Recommendation;
		$target = $rec->where('id', $request->id)->first();
		$target->delete();
		session()->set('crecommendations', count($rec->where('status', '!=', 'Approved')->get()));
		return redirect('/adminpanel/recommendations');
	}
}
