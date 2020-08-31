<?php

namespace App\Http\Controllers\YouthDbms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\YouthInfo;
use App\Imports\YouthInfoImport;
use Maatwebsite\Excel\Facades\Excel;
class YouthInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       try {
           $youthInfos = YouthInfo::all(); 
        return view('admin.youth_info',compact('youthInfos'));
       } catch (\Exception $ex) {
           return redirect()->back()->with("error","Ooops! Something went wrong, contact the administrator");
       }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function upload_youth_info_view(){
        return view('Admin.upload_youth_info');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request['uuid'] = uniqid();
            YouthInfo::create($request->all());
            return redirect()->back()->with("success","Youth info created successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error","Something went wrong");
        }
    }

    public function upload_youth_info(Request $request){
        $this->validate($request,[
            'excel_file'=>'required|mimes:xls,xlsx'
        ]);
        try {
            Excel::import(new YouthInfoImport,request()->file('excel_file'));
            return redirect()->back()->with("success","Youth data uploaded successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error","Something went wrong");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            YouthInfo::find($id)->update($request->all());
            return redirect()->back()->with("success","Youth info updated successfully");
        } catch (\Throwable $th) {
            return redirect()->back()->with("error","Something went wrong");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            YouthInfo::find($id)->delete();
            return redirect()->back()->with("success","Youth info deleted successfully");
        } catch (\Throwable $th) {
            return redirect()->back()->with("error","Something went wrong");
        }
    }
}
