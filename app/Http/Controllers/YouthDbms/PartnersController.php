<?php

namespace App\Http\Controllers\YouthDbms;

use App\Models\Partners;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PartnersImport;

class PartnersController extends Controller
{
    public function index(){
        $partners = Partners::all();
        return view('admin.partners',compact('partners'));
    }

    public function store(Request $request){
        try {
            $request['uuid'] = uniqid();
            Partners::create($request->all());
            return redirect()->back()->with("success","Partners added successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error","Something went wrong");

        }
    }


    public function destroy($id){
        try {
            Partners::find($id)->delete();
            return redirect()->back()->with("success","Partners information deleted successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error","Something went wrong");

        }
    }

    public function upload_partners(Request $request){
        // dd("here");
        $this->validate($request,[
            'excel_file'=>'required|mimes:xls,xlsx'
        ]);
        try {
            Excel::import(new PartnersImport,request()->file('excel_file'));
            return redirect()->back()->with("success","Youth data uploaded successfully");
        } catch (\Exception $ex) {
            dd($ex);
            return redirect()->back()->with("error","Something went wrong");
        }
    }

    public function upload_partners_view(){
        return view('Admin.upload_partners');
    }
}
