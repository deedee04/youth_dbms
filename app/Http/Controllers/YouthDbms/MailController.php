<?php

namespace App\Http\Controllers\YouthDbms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\YouthInfo;
use App\Jobs\Mail;

class MailController extends Controller
{
    public function index()
    {
        try {
            // $youthInfos = YouthInfo::all();compact('youthInfos')

            $data['countries'] = YouthInfo::selectRaw('distinct nationality as country')->orderBy('nationality')->get();

            return view('admin.mail', $data);
        } catch (\Exception $ex) {
            dd($ex);
            // return redirect()->back()->with("error","Ooops! Something went wrong, contact the administrator");
        }
    }

    public function send_mail(Request $request)
    {

        // dd($request->all());

        $this->validate($request, [
            'subject' => 'required',
            'message' => 'required',
            'gender' => 'required',
            'country' => 'required',
        ]);

        dispatch(new Mail($request->all()));
        return redirect()->back()->with("success", "Mail Sent Successfully");
    }
}
