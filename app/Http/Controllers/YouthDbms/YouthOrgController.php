<?php

namespace App\Http\Controllers\YouthDbms;
use App\Models\YouthOrg;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\YouthOrgImport;

class YouthOrgController extends Controller
{
    public function index(){
        $youthOrgs = YouthOrg::all();
        return view('admin.youth_org', compact('youthOrgs'));
    }

    public function store(Request $request){
        try {
            $request['uuid'] = uniqid();
            YouthOrg::create($request->all());
            return redirect()->back()->with("success","Youth organization added successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error","Something went wrong");
        }
    }

    public function update_youth_organizations($id){
        try {
            YouthOrg::find($id)->update($request->all());
            return redirect()->back()->with("success","Youth organization updated successfully");
        } catch (\Throwable $th) {
            return redirect()->back()->with("success","Something went wrong");
        }
    }

    public function destroy($id){
        try {
            YouthOrg::find($id)->delete();
            return redirect()->back()->with("success","Youth organization deleted successfully");
        } catch (\Throwable $th) {
            return redirect()->back()->with("success","Something went wrong");
        }
    }

    public function upload_youth_org(Request $request){
        // dd("here");
        $this->validate($request,[
            'excel_file'=>'required|mimes:xls,xlsx'
        ]);
        try {
            Excel::import(new YouthOrgImport,request()->file('excel_file'));
            return redirect()->back()->with("success","Youth data uploaded successfully");
        } catch (\Exception $ex) {
            dd($ex);
            return redirect()->back()->with("error","Something went wrong");
        }
    }

    public function upload_youth_org_view(){
        return view('admin.upload_youth_org');
    }
}