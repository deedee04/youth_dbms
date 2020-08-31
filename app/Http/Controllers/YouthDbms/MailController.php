<?php

namespace App\Http\Controllers\YouthDbms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\YouthInfo;
use App\Jobs\Mail;

class MailController extends Controller
{
    public function index(){
        try {
            $youthInfos = YouthInfo::all(); 
         return view('admin.mail',compact('youthInfos'));
        } catch (\Exception $ex) {
            return redirect()->back()->with("error","Ooops! Something went wrong, contact the administrator");
        }
    }

    public function send_mail(Request $request){
       try {
        dispatch( new Mail($request->all()));
        return redirect()->back()->with("success","Mail Sent Successfully");
       } catch (\Exception $ex) {
        return redirect()->back()->with("error","Something went wrong");
       }
    }
}
