<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat, App\Student, App\Company, App\Conversation;

class ChatsController extends Controller
{
    public function send(Request $r){
    	$ch = new Chat;
        $st = new Student;
        $co = new Company;
        $cv = new Conversation;
        if(session('type') == 'company'){
            $checkConversation = $cv->where('company_id', session('id'))->where('student_id', $r->studentid)->first();
            if(count($checkConversation) == 0){
                $cv->company_id = session('id');
                $cv->student_id = $r->studentid;
                $cv->deletedbycompany = 0;
                $cv->deletedbystudent = 0;
                $cv->save();
                $convo = $cv->where('company_id', session('id'))->where('student_id', $r->studentid)->first();
                $ch->student_id = $r->studentid;
                $ch->company_id = $r->companyid;
                $ch->status = 'sentbycompany';
                $ch->body = $r->body;
                $ch->sendertype = session('type');
                $ch->conversation_id = $convo->id;
                $ch->save();
                $time = $ch->where('company_id', session('id'))->where('student_id', $r->studentid)->orderBy('created_at', 'desc')->first()->created_at;
                $convo->update(['updated_at' => $time ]);
                $student = $st->where('id', $r->studentid)->first();
                return view('companychats', compact('ch', 'student'));
            }else{
                $convo = $cv->where('company_id', session('id'))->where('student_id', $r->studentid)->first();
                $ch->student_id = $r->studentid;
                $ch->company_id = $r->companyid;
                $ch->status = 'sentbycompany';
                $ch->body = $r->body;
                $ch->sendertype = session('type');
                $ch->conversation_id = $convo->id;
                $ch->save();
                $time = $ch->where('company_id', session('id'))->where('student_id', $r->studentid)->orderBy('created_at', 'desc')->first()->created_at;
                $convo->update(['updated_at' => $time ]);
                $student = $st->where('id', $r->studentid)->first();
                return view('companychats', compact('ch', 'student'));
            }
        }elseif(session('type') == 'student'){
            $checkConversation = $cv->where('student_id', session('id'))->where('company_id', $r->companyid)->first();
            if(count($checkConversation) == 0){
                $cv->company_id = $r->companyid;
                $cv->student_id = session('id');
                $cv->deletedbycompany = 0;
                $cv->deletedbystudent = 0;
                $cv->save();
                $convo = $cv->where('student_id', session('id'))->where('company_id', $r->companyid)->first();
                $ch->student_id = session('id');
                $ch->company_id = $r->companyid;
                $ch->status = 'sentbystudent';
                $ch->body = $r->body;
                $ch->sendertype = session('type');
                $ch->conversation_id = $convo->id;
                $ch->save();
                $time = $ch->where('student_id', session('id'))->where('company_id', $r->companyid)->orderBy('created_at', 'desc')->first()->created_at;
                $convo->update(['updated_at' => $time ]);
                $company = $co->where('id', $r->companyid)->first();
                return view('studentchats', compact('ch', 'company'));
            }else{
                $convo = $cv->where('student_id', session('id'))->where('company_id', $r->companyid)->first();
                $ch->student_id = session('id');
                $ch->company_id = $r->companyid;
                $ch->status = 'sentbystudent';
                $ch->body = $r->body;
                $ch->sendertype = session('type');
                $ch->conversation_id = $convo->id;
                $ch->save();
                $time = $ch->where('student_id', session('id'))->where('company_id', $r->companyid)->orderBy('created_at', 'desc')->first()->created_at;
                $convo->update(['updated_at' => $time ]);
                $company = $co->where('id', $r->companyid)->first();
                return view('studentchats', compact('ch', 'company'));
            }
        }
    }

    public function loadchats(Request $r){
        $ch = new Chat;
        $co = new Company;
        $st = new Student;
        $cv = new Conversation;
        if(session('type') == 'company'){
            $conversations = $cv->where('company_id', session('id'))->where('deletedbycompany', '<>', 1)->orderBy('updated_at', 'desc')->get();
            return view('chatlist', compact('conversations', 'ch'));
        }elseif(session('type') == 'student'){
            $conversations = $cv->where('student_id', session('id'))->where('deletedbystudent', '<>', 1)->orderBy('updated_at', 'desc')->get();
            return view('chatlist', compact('conversations', 'ch'));
        }
    }

    public function loadtargetchat(Request $r){
        $ch = new Chat;
        $co = new Company;
        $company = $co->where('id', $r->companyid)->first();
        return view('studentchats', compact('ch', 'company'));
    }

    public function loadstudentchat(Request $r){
        $ch = new Chat;
        $st = new Student;
        $student = $st->where('id', $r->studentid)->first();
        return view('companychats', compact('ch', 'student'));
    }

    public function refreshcompanychats(Request $r){
        $ch = new Chat;
        $co = new Company;
        $chats = $ch->where('company_id', $r->companyid)->where('student_id', session('id'))->where('status', 'sentbycompany')->get();
        return view('newcompanychats', compact('chats'));
    }

    public function refreshstudentchats(Request $r){
        $ch = new Chat;
        $st = new Student;
        $chats = $ch->where('student_id', $r->studentid)->where('company_id', session('id'))->where('status', 'sentbystudent')->get();
        return view('newstudentchats', compact('chats'));
    }

    public function markcompanychatsasread(Request $r){
        $ch = new Chat;
        $co = new Company;
        $chats = $ch->where('company_id', $r->companyid)->where('student_id', session('id'))->where('status', 'sentbycompany')->get();
        foreach($chats as $chat){
            $chat->update(['status' => 'readbystudent']);
        }
    }

    public function markstudentchatsasread(Request $r){
        $ch = new Chat;
        $st = new Student;
        $chats = $ch->where('student_id', $r->studentid)->where('company_id', session('id'))->where('status', 'sentbystudent')->get();
        foreach($chats as $chat){
            $chat->update(['status' => 'readbycompany']);
        }
    }

    public function countmessages(){
        if(session('go') == 0){
            
        }else{
            $ch = new Chat;
            if(session('type') == 'student'){
                $count = count($ch->where('student_id', session('id'))->where('status', 'sentbycompany')->get());
                return $count;
            }elseif(session('type') == 'company'){
                $count = count($ch->where('company_id', session('id'))->where('status', 'sentbystudent')->get());
                return $count;
            }
        }
    }

    public function deletestudentconvo(Request $r){
        $cv = new Conversation;
        $target = $cv->where('student_id', $r->c)->where('company_id', session('id'))->first();
        $target->update(['deletedbycompany' => 1]);
    }

    public function deletecompanyconvo(Request $r){
        $cv = new Conversation;
        $target = $cv->where('company_id', $r->c)->where('student_id', session('id'))->first();
        $target->update(['deletedbystudent' => 1]);
    }
}
