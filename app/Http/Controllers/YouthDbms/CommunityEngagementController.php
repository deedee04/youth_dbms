<?php

namespace App\Http\Controllers\YouthDbms;

use App\Models\CommunityEngagement;
use Illuminate\Http\Request;
use App\Imports\CommunityEngagementImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class CommunityEngagementController extends Controller
{
    public function index(Request $request)
    {

        $community = CommunityEngagement::when(isset($request->name), function ($query) use ($request) {
            $name = strtolower($request->name);
            $query->whereRaw("lower(name) like '%$name%'");
        })->when(isset($request->thematic_area), function ($query) use ($request) {
            $area = strtolower($request->thematic_area);
            $query->whereRaw("lower(thematic_area) like '%$area%'");
        })->get();

        // return $community;
        return view('Admin.community_engagement', compact('community'));
    }

    public function store(Request $request)
    {
        try {
            $request['uuid'] = uniqid();
            CommunityEngagement::create($request->all());
            return redirect()->back()->with("success", "Community Engagement Actor Created Successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Something went wrong");
        }
    }

    public function update(Request $request)
    {
        try {
            CommunityEngagement::find($request->id)->update($request->all());
            return redirect()->back()->with("success", "Community Engagement Actor Updated Successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Something went wrong");
        }
    }

    public function delete($id)
    {
        try {
            CommunityEngagement::find($id)->delete();
            return redirect()->back()->with("success", "Community Engagement Actor Deleted Successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Something went wrong");
        }
    }

    public function upload_community_engagement_view()
    {
        return view('Admin.upload_community_engagement');
    }

    public function upload_community_engagement(Request $request)
    {
        $this->validate($request, [
            'excel_file' => 'required|mimes:xls,xlsx'
        ]);
        try {
            Excel::import(new CommunityEngagementImport, request()->file('excel_file'));
            return redirect()->back()->with("success", "Community Engagement data uploaded successfully");
        } catch (\Exception $ex) {
            // dd($ex);
            return redirect()->back()->with("error", "Something went wrong");
        }
    }
}
