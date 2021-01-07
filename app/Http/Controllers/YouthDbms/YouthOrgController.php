<?php

namespace App\Http\Controllers\YouthDbms;

use App\Models\YouthOrg;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\YouthOrgImport;
use DataTables;


class YouthOrgController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = YouthOrg::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    // $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                    //    <button class='btn btn-primary pull-right' type='button'>Action</button>
                    $btn = "
                     <div class='btn-group pull-right' role='group'>
                             
                                <div class='btn-group' role='group'>
                                    <button class='btn btn-primary dropdown-toggle' id='btnGroupDrop1' type='button'
                                        data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'></button>
                                    <div class='dropdown-menu dropdown-menu-right'>
                                        <a class='dropdown-item' 
                                            href='" . route('youthOrg.show', $row->id) . "'>
                                            <i class='fa fa-pencil-square-o' aria-hidden='true'></i>Edit
                                        </a>
                                        <a class='dropdown-item'
                                            onclick='return confirm('Are you sure you want to delete this info?')'
                                            href='delete_youth_organizations/$row->id'>
                                            <i class='fa fa-trash'></i><span>Delete</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                    
                    ";

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $youthOrgs = YouthOrg::all();
        return view('admin.youth_org', compact('youthOrgs'));
    }

    public function store(Request $request)
    {
        try {
            $request['uuid'] = uniqid();
            YouthOrg::create($request->all());
            return redirect()->back()->with("success", "Youth organization added successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Something went wrong");
        }
    }

    public function update(Request $request, $id)
    {
        try {
            YouthOrg::find($id)->update($request->all());
            return redirect()->back()->with("success", "Youth organization updated successfully");
        } catch (\Throwable $th) {
            return redirect()->back()->with("success", "Something went wrong");
        }
    }
    public function show($id)
    {
        $data =   YouthOrg::find($id);
        return view('admin.youth_org.edit', compact('data'));
    }

    public function destroy($id)
    {
        try {
            YouthOrg::find($id)->delete();
            return redirect()->back()->with("success", "Youth organization deleted successfully");
        } catch (\Throwable $th) {
            return redirect()->back()->with("success", "Something went wrong");
        }
    }

    public function upload_youth_org(Request $request)
    {
        // dd("here");
        $this->validate($request, [
            'excel_file' => 'required|mimes:xls,xlsx'
        ]);
        try {
            Excel::import(new YouthOrgImport, request()->file('excel_file'));
            return redirect()->back()->with("success", "Youth data uploaded successfully");
        } catch (\Exception $ex) {
            dd($ex);
            return redirect()->back()->with("error", "Something went wrong");
        }
    }

    public function upload_youth_org_view()
    {
        return view('admin.upload_youth_org');
    }
}
