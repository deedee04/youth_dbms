<?php

namespace App\Http\Controllers\YouthDbms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\YouthInfo;
use App\Imports\YouthInfoImport;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;

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
            $youthInfos = YouthInfo::paginate(10 * request('page', 1));
            //  return $youthInfos;
            return view('admin.youth_info', compact('youthInfos'));
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Ooops! Something went wrong, contact the administrator");
        }
    }

    public function fetch(Request $request)
    {
        return DataTables::of(YouthInfo::query())
            ->filter(function ($instance) use ($request) {

                // dd($request->all());

                if ($request->get('searchName')) {
                    $instance->whereRaw('lower(name) like ? ', '%' . strtolower($request->get('searchName')) . '%');
                }
                if ($request->get('searchCountry')) {
                    $instance->whereRaw('lower(nationality) like ? ', '%' . strtolower($request->get('searchCountry')) . '%');
                }

                if ($request->get('searchGender')) {
                    // dd($request->get('searchGender'));
                    $instance->where('gender', $request->get('searchGender'));
                }

                // if (!empty($request->get('search'))) {
                //     $instance->where(function ($w) use ($request) {
                //         $search = $request->get('search');
                //         $w->orWhere('name', 'LIKE', "%$search%")
                //             ->orWhere('email', 'LIKE', "%$search%");
                //     });
                // }
            })
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
                                            href='" . route('youthInfo.show', $row->id) . "'>
                                            <i class='fa fa-pencil-square-o' aria-hidden='true'></i>Edit
                                        </a>
                                        <a class='dropdown-item'
                                            onclick='return confirm('Are you sure you want to delete this info?')'
                                            href='delete_youth_info/$row->id'>
                                            <i class='fa fa-trash'></i><span>Delete</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                    
                    ";

                return $btn;
            })
            ->rawColumns(['action'])->make(true);
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

    public function upload_youth_info_view()
    {
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
            return redirect()->back()->with("success", "Youth info created successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Something went wrong");
        }
    }

    public function upload_youth_info(Request $request)
    {
        $this->validate($request, [
            'excel_file' => 'required|mimes:xls,xlsx'
        ]);
        try {
            Excel::import(new YouthInfoImport, request()->file('excel_file'));
            return redirect()->back()->with("success", "Youth data uploaded successfully");
        } catch (\Exception $ex) {
            dd($ex);
            return redirect()->back()->with("error", "Something went wrong");
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
        $info = YouthInfo::find($id);
        return view('admin.youthInfo.edit', compact('info'));
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
            return redirect()->back()->with("success", "Youth info updated successfully");
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Something went wrong");
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
            return redirect()->back()->with("success", "Youth info deleted successfully");
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Something went wrong");
        }
    }
}
